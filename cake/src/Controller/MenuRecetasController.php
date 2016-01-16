<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MenuRecetas Controller
 *
 * @property \App\Model\Table\MenuRecetasTable $MenuRecetas
 */
class MenuRecetasController extends AppController
{


	public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
        //$this->Auth->allow(['registro','index','add']);//DTR: pruebas y poder añadir un usuario...
        //$this->Auth->allow(['registro','index','add','edit']);//DTR: pruebas y poder añadir un usuario...
        
        $this->Auth->allow('publico');
		$this->Auth->allow('vista');
         
        //DTR: establecer la URL a la que redirigir si hay que pasar por LOGIN.
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
            'contain' => ['Menus', 'Recetas']
        ];
        $this->set('menuRecetas', $this->paginate($this->MenuRecetas));
        $this->set('_serialize', ['menuRecetas']);
    }
	
	public function publico()
    {
        $this->paginate = [
            'contain' => ['Menus', 'Recetas']
        ];
        $this->set('menuRecetas', $this->paginate($this->MenuRecetas));
        $this->set('_serialize', ['menuRecetas']);
    }

    /**
     * View method
     *
     * @param string|null $id Menu Receta id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $menuReceta = $this->MenuRecetas->get($id, [
            'contain' => ['Menus', 'Recetas']
        ]);
        $this->set('menuReceta', $menuReceta);
        $this->set('_serialize', ['menuReceta']);
    }
	public function vista($id = null)
    {
        $menuReceta = $this->MenuRecetas->get($id, [
            'contain' => ['Menus', 'Recetas']
        ]);
        $this->set('menuReceta', $menuReceta);
        $this->set('_serialize', ['menuReceta']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $menuReceta = $this->MenuRecetas->newEntity();
        if ($this->request->is('post')) {
            $menuReceta = $this->MenuRecetas->patchEntity($menuReceta, $this->request->data);
            if ($this->MenuRecetas->save($menuReceta)) {
                $this->Flash->success(__('El plato se ha guardado correctamente.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ha ocurrido un error al guardar el plato. Inténtelo de nuevo.'));
            }
        }
        $menus = $this->MenuRecetas->Menus->find('list', ['limit' => 200]);
        $recetas = $this->MenuRecetas->Recetas->find('list', ['limit' => 200]);
        $this->set(compact('menuReceta', 'menus', 'recetas'));
        $this->set('_serialize', ['menuReceta']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Menu Receta id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $menuReceta = $this->MenuRecetas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $menuReceta = $this->MenuRecetas->patchEntity($menuReceta, $this->request->data);
            if ($this->MenuRecetas->save($menuReceta)) {
                $this->Flash->success(__('El plato se ha guardado correctamente.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ha ocurrido un error al guardar el plato. Inténtelo de nuevo'));
            }
        }
        $menus = $this->MenuRecetas->Menus->find('list', ['limit' => 200]);
        $recetas = $this->MenuRecetas->Recetas->find('list', ['limit' => 200]);
        $this->set(compact('menuReceta', 'menus', 'recetas'));
        $this->set('_serialize', ['menuReceta']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Menu Receta id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $menuReceta = $this->MenuRecetas->get($id);
        if ($this->MenuRecetas->delete($menuReceta)) {
            $this->Flash->success(__('El plato se ha borrado correctamente'));
        } else {
            $this->Flash->error(__('Ha ocurrido un error al borrar el plato. Inténtelo de nuevo'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
