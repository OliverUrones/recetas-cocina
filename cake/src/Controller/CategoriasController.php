<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Categorias Controller
 *
 * @property \App\Model\Table\CategoriasTable $Categorias
 */
class CategoriasController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('categorias', $this->paginate($this->Categorias));
        $this->set('_serialize', ['categorias']);
    }

    /**
     * View method
     *
     * @param string|null $id Categoria id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $categoria = $this->Categorias->get($id);
		$categoria->categorias = $this->paginate($this->Categorias);
		$nombre_padre="";
		if($categoria->categoria_id!=0){
		 $padre = $this->Categorias->get($categoria->categoria_id);
		 $nombre_padre=$padre->nombre;
		}
        $this->set(compact('categoria','nombre_padre'));
        $this->set('_serialize', ['categoria']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $categoria = $this->Categorias->newEntity();
		$categoria_padres =$this->paginate($this->Categorias);
		
		$n=array();
		foreach($categoria_padres as $v){
			
				array_push($n,$v->nombre);
		}
		
        if ($this->request->is('post')) {
			$nombrepadre=$n[$this->request->data['categoria_id']];
			$this->request->data['categoria_id']=$nombrepadre;
			$categoria = $this->Categorias->patchEntity($categoria, $this->request->data);
			
			foreach($categoria_padres as $v){
				if(strcmp($v->nombre,$nombrepadre)==0){
					$categoria->categoria_id=$v->id;
				}
			}
            if ($this->Categorias->save($categoria)) {
                $this->Flash->success(__('La categoria se ha guardado.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('La categoria no se ha guardado. Pruebe otra vez.'));
            }
        }
		$categoria_padres=$this->Categorias->find('list');
        $this->set(compact('categoria','categoria_padres','n'));
        $this->set('_serialize', ['categoria']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Categoria id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $categoria = $this->Categorias->get($id, [
            'contain' => []
        ]);
		$categoria_padres =$this->paginate($this->Categorias);
		
		$n=array("");
		$i=1;
		foreach($categoria_padres as $v){
				
				array_push($n,$v->nombre);
				if($v->id==$categoria->categoria_id){
					$categoria->categoria_id=$i;
				}
				$i=$i+1;
		}
		$nombrepadre="";
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nombrepadre=$n[$this->request->data['categoria_id']];
			$this->request->data['categoria_id']=$nombrepadre;
			$categoria = $this->Categorias->patchEntity($categoria, $this->request->data);
			
			foreach($categoria_padres as $v){
				if(strcmp($v->nombre,$nombrepadre)==0){
					$categoria->categoria_id=$v->id;
				}
			}
            if ($this->Categorias->save($categoria)) {
                $this->Flash->success(__('La categoria se ha guardado.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('La categoria no se ha guardado. Pruebe otra vez.'));
            }
        }
        $this->set(compact('categoria','n'));
        $this->set('_serialize', ['categoria']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Categoria id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $categoria = $this->Categorias->get($id);
        if ($this->Categorias->delete($categoria)) {
			$categoria_hijos =$this->paginate($this->Categorias);
			foreach($categoria_hijos as $c){
				
				if($id == $c->categoria_id){
					$c->categoria_id=0;
					 if ($this->Categorias->save($c)){
						  return $this->redirect(['action' => 'add']);
					 }
				}
			}
            $this->Flash->success(__('The categoria has been deleted.'));
        } else {
            $this->Flash->error(__('The categoria could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
