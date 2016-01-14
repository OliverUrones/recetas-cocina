<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Categorias Controller
 *
 * @property \App\Model\Table\CategoriasTable $Categorias */
class CategoriasController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ParentCategorias']
        ];
		$categorias=$this->paginate($this->Categorias);
		$arbol=array();
		$padres=array();
		foreach($categorias as $categoria){
			//if($categoria->parent_id==0){
				array_push($padres, $categoria);
		//	}
		}
		$arbol=$this->crea_arbol($categorias,$arbol,"");
		
        $this->set(compact('categorias', 'arbol'));
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
        $categoria = $this->Categorias->get($id, [
            'contain' => ['ParentCategorias', 'ChildCategorias']
        ]);
        $this->set('categoria', $categoria);
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
		$parentCategorias=array();
		foreach($categoria_padres as $v){
			array_push($parentCategorias, $v->nombre);
		}
		
        if ($this->request->is('post')) {
            $categoria = $this->Categorias->patchEntity($categoria, $this->request->data);
			$index=$this->request->data['parent_id'];
			if($index!=null){
				$nombrepadre=$parentCategorias[$index];
				foreach($categoria_padres as $v){
					if(strcmp($v->nombre,$nombrepadre)==0){
						$categoria->parent_id=$v->id;
					}
				}
			}
			
            if ($this->Categorias->save($categoria)) {
                $this->Flash->success(__('The categoria has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The categoria could not be saved. Please, try again.'));
            }
        }
        
        $this->set(compact('categoria', 'parentCategorias'));
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
		$parentCategorias=array();
		foreach($categoria_padres as $v){
			array_push($parentCategorias, $v->nombre);
		}
        if ($this->request->is(['patch', 'post', 'put'])) {
            $categoria = $this->Categorias->patchEntity($categoria, $this->request->data);
			$index=$this->request->data['parent_id'];
			
			if($index!=null){
				$nombrepadre=$parentCategorias[$index];
				foreach($categoria_padres as $v){
					if(strcmp($v->nombre,$nombrepadre)==0){
						$categoria->parent_id=$v->id;
					}
				}
			}
            if ($this->Categorias->save($categoria)) {
                $this->Flash->success(__('The categoria has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The categoria could not be saved. Please, try again.'));
            }
        }
		
        $this->set(compact('categoria', 'parentCategorias'));
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
            $this->Flash->success(__('The categoria has been deleted.'));
        } else {
            $this->Flash->error(__('The categoria could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
	
	private function crea_arbol($padres,$arbol,$espacios){
		foreach($padres as $v){
			array_push($arbol,$espacios.$v->nombre);
			$arbol=$this->crea_arbol($v->child_categorias,$arbol,"&nbsp&nbsp&nbsp&nbsp".$espacios);
		}
		return $arbol;
                
       
    }
}
