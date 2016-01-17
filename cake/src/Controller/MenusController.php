<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Menus Controller
 *
 * @property \App\Model\Table\MenusTable $Menus
 */
class MenusController extends AppController
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
            'contain' => ['Usuarios']
        ];
        $this->set('menus', $this->paginate($this->Menus));
        $this->set('_serialize', ['menus']);
    }
	public function publico()
    {
        $this->paginate = [
            'contain' => ['Usuarios']
        ];
        $this->set('menus', $this->paginate($this->Menus));
        $this->set('_serialize', ['menus']);
    }

    /**
     * View method
     *
     * @param string|null $id Menu id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $menu = $this->Menus->get($id, [
            'contain' => ['Usuarios', 'MenuRecetas']
        ]);
        $this->set('menu', $menu);
        $this->set('_serialize', ['menu']);
    }
	
	public function vista($id = null)
    {
        $menu = $this->Menus->get($id, [
            'contain' => ['Usuarios', 'MenuRecetas']
        ]);
        $this->set('menu', $menu);
        $this->set('_serialize', ['menu']);
    }
	

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $menu = $this->Menus->newEntity();
        if ($this->request->is('post')) {
            $menu = $this->Menus->patchEntity($menu, $this->request->data);
			$usuario= $this->request->session()->read('Auth.User');
			$menu->usuario_id=$usuario['id'];
            if ($this->Menus->save($menu)) {
                $this->Flash->success(__('El menú se ha guardado correctamente'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ha ocurrido un error al guardar el menú. Inténtelo de nuevo'));
            }
        }
        $usuarios = $this->Menus->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('menu', 'usuarios'));
        $this->set('_serialize', ['menu']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Menu id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $menu = $this->Menus->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $menu = $this->Menus->patchEntity($menu, $this->request->data);
			
            if ($this->Menus->save($menu)) {
                $this->Flash->success(__('El menú se ha guardado correctamente'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ha ocurrido un error al guardar el menú. Inténtelo de nuevo'));
            }
        }
        $usuarios = $this->Menus->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('menu', 'usuarios'));
        $this->set('_serialize', ['menu']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Menu id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $menu = $this->Menus->get($id);
        if ($this->Menus->delete($menu)) {
            $this->Flash->success(__('El menú se ha borrado correctamente.'));
        } else {
            $this->Flash->error(__('Ha ocurrido un error al borrar el menú. Inténtelo de nuevo.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
