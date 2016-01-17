<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Planificaciones Controller
 *
 * @property \App\Model\Table\PlanificacionesTable $Planificaciones
 */
class PlanificacionesController extends AppController

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
        $this->set('planificaciones', $this->paginate($this->Planificaciones));
        $this->set('_serialize', ['planificaciones']);
    }
    public function publico()
    {
        $this->paginate = [
            'contain' => ['Usuarios']
        ];
        $this->set('planificaciones', $this->paginate($this->Planificaciones));
        $this->set('_serialize', ['planificaciones']);
    }

    /**
     * View method
     *
     * @param string|null $id Planificacione id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $planificacione = $this->Planificaciones->get($id, [
            'contain' => ['Usuarios']
        ]);
        $this->set('planificacione', $planificacione);
        $this->set('_serialize', ['planificacione']);
    }
	public function vista($id = null)
    {
        $planificacione = $this->Planificaciones->get($id, [
            'contain' => ['Usuarios']
        ]);
        $this->set('planificacione', $planificacione);
        $this->set('_serialize', ['planificacione']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $planificacione = $this->Planificaciones->newEntity();
        if ($this->request->is('post')) {
            $planificacione = $this->Planificaciones->patchEntity($planificacione, $this->request->data);
			$usuario= $this->request->session()->read('Auth.User');
			$planificacione->usuario_id=$usuario['id'];
        
            if ($this->Planificaciones->save($planificacione)) {
                $this->Flash->success(__('La planificación se ha guardado correctamente'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ha ocurrido un error al guardar la planificación. Inténtelo de nuevo'));
            }
        }
        $usuarios = $this->Planificaciones->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('planificacione', 'usuarios'));
        $this->set('_serialize', ['planificacione']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Planificacione id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $planificacione = $this->Planificaciones->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $planificacione = $this->Planificaciones->patchEntity($planificacione, $this->request->data);
            if ($this->Planificaciones->save($planificacione)) {
                $this->Flash->success(__('La planificación se ha guardado correctamente'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ha ocurrido un error al guardar la planificación. Inténtelo de nuevo'));
            }
        }
        $usuarios = $this->Planificaciones->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('planificacione', 'usuarios'));
        $this->set('_serialize', ['planificacione']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Planificacione id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $planificacione = $this->Planificaciones->get($id);
        if ($this->Planificaciones->delete($planificacione)) {
            $this->Flash->success(__('The planificacione has been deleted.'));
        } else {
            $this->Flash->error(__('The planificacione could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
