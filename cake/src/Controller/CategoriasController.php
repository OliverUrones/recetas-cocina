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
	  public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
         
        
        $this->Auth->allow('arbol');
         
        
         $this->Auth->redirectUrl();
    }
	 
    public function index()
    {
        $this->paginate = [
            'contain' => ['ParentCategorias']
        ];
		$categorias=$this->paginate($this->Categorias);
		$arbol=array();
		$padres=array();
		if(count($categorias)>0){
			foreach($categorias as $categoria){
				if($categoria->parent_id==0){
					array_push($padres, $this->Categorias->get($categoria->id, ['contain' => ['ParentCategorias', 'ChildCategorias']]));
				}
			}
		}
		$arbol=$this->crea_arbol($padres,$arbol,"");
		
        $this->set(compact('categorias', 'arbol'));
        $this->set('_serialize', ['categorias']);
    }
public function arbol()
    {
        
		$categorias=$this->paginate($this->Categorias);
		$arbol=array();
		$padres=array();
		if(count($categorias)>0){
			foreach($categorias as $categoria){
				if($categoria->parent_id==0){
					array_push($padres, $this->Categorias->get($categoria->id));
				}
			}
		}
		$arbol=$this->crea_arbol($padres,$arbol,"");
		
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
                $this->Flash->success(__('Categoria guardada.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('La categoria no ha podido ser guardada.'));
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
			$parentCategorias[$v->id]=$v->nombre;
		}
        if ($this->request->is(['patch', 'post', 'put'])) {
            $categoria = $this->Categorias->patchEntity($categoria, $this->request->data);
			if($this->request->data['parent_id']==0){
				$this->request->data['parent_id']=0;
			}
			$categoria = $this->Categorias->patchEntity($categoria, $this->request->data);
            if ($this->Categorias->save($categoria)) {
                $this->Flash->success(__('Categoria editada.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('la categoria no pudo ser editada.'));
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
            $this->Flash->success(__('categoria borrada.'));
        } else {
            $this->Flash->error(__('la categoria no pudo ser borrada.'));
        }
        return $this->redirect(['action' => 'index']);
    }
	
	private function crea_arbol($padres,$arbol,$espacios){
		foreach($padres as $v){
			$v=$this->Categorias->get($v->id, [
            'contain' => ['ParentCategorias', 'ChildCategorias']
        ]);
			array_push($arbol,$espacios."-".$v->nombre);
			if(count($v->child_categorias)>0){
				$arbol=$this->crea_arbol($v->child_categorias,$arbol,"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$espacios);
			}
		}
		return $arbol;
                
       
    }
}
