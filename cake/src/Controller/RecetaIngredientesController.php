<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RecetaIngredientes Controller
 *
 * @property \App\Model\Table\RecetaIngredientesTable $RecetaIngredientes
 */
class RecetaIngredientesController extends AppController
{

	public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
         
			
        $usuario= $this->request->session()->read('Auth.User');
       

		
        if($usuario['rol']=='C'){
            $this->Auth->allow('index');
            $this->Auth->allow('view');
            $this->Auth->allow('add');
            $this->Auth->allow('edit');
            $this->Auth->allow('delete');
        }
         $this->Auth->redirectUrl();
    }//---*/


    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Recetas', 'Ingredientes']
        ];
		
		
        $recetaIngredientes=$this->paginate($this->RecetaIngredientes);
        $usuario= $this->request->session()->read('Auth.User');
        if($usuario['rol']=='C'){
            $aux=array();
            foreach($recetaIngredientes as $receta){
                if($receta->receta->usuario_id==$usuario['id']){
                    array_push($aux,$receta);
                }
                $recetaIngredientes=$aux;
            }
           
        }
		
        $this->set('recetaIngredientes',$recetaIngredientes);
        $this->set('_serialize', ['recetaIngredientes']);
		
        
    }

    /**
     * View method
     *
     * @param string|null $id Receta Ingrediente id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $recetaIngrediente = $this->RecetaIngredientes->get($id, [
            'contain' => ['Recetas', 'Ingredientes']
        ]);
        $this->set('recetaIngrediente', $recetaIngrediente);
        $this->set('_serialize', ['recetaIngrediente']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
	
		
        $usuario= $this->request->session()->read('Auth.User');
		
		$clientslist = $this->RecetaIngredientes->Recetas->find();
		$clientslist->select(['id']);
		$clientslist->where(['usuario_id'=>$usuario['id']]);
		
        $recetaIngrediente = $this->RecetaIngredientes->newEntity();
        if ($this->request->is('post')) {
            $recetaIngrediente = $this->RecetaIngredientes->patchEntity($recetaIngrediente, $this->request->data);
			echo $recetaIngrediente;
            if ($this->RecetaIngredientes->save($recetaIngrediente)) {
                $this->Flash->success(__('Se ha guardado el ingrediente en la receta.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('No se ha podido guardar el ingrediente en la receta. Intentelo de nuevo.'));
            }
        }
        $recetas = $this->RecetaIngredientes->Recetas->find('list', ['limit' => 200]);
        $ingredientes = $this->RecetaIngredientes->Ingredientes->find('list', ['limit' => 200]);
        $this->set(compact('recetaIngrediente', 'recetas', 'ingredientes', 'clientslist'));
        $this->set('_serialize', ['recetaIngrediente']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Receta Ingrediente id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $recetaIngrediente = $this->RecetaIngredientes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recetaIngrediente = $this->RecetaIngredientes->patchEntity($recetaIngrediente, $this->request->data);
            if ($this->RecetaIngredientes->save($recetaIngrediente)) {
                $this->Flash->success(__('El ingrediente de la receta se ha guardado.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('No se ha podido guardar el ingrediente de la receta.'));
            }
        }
        $recetas = $this->RecetaIngredientes->Recetas->find('list', ['limit' => 200]);
        $ingredientes = $this->RecetaIngredientes->Ingredientes->find('list', ['limit' => 200]);
        $this->set(compact('recetaIngrediente', 'recetas', 'ingredientes'));
        $this->set('_serialize', ['recetaIngrediente']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Receta Ingrediente id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recetaIngrediente = $this->RecetaIngredientes->get($id);
        if ($this->RecetaIngredientes->delete($recetaIngrediente)) {
            $this->Flash->success(__('Se ha borrado el ingrediente de la receta.'));
        } else {
            $this->Flash->error(__('No se ha podido borrar el ingrediente de la receta. Intentelo de nuevo.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
