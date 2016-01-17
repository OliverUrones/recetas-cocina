<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PlanificacioneMenus Controller
 *
 * @property \App\Model\Table\PlanificacioneMenusTable $PlanificacioneMenus
 */
class PlanificacioneMenusController extends AppController
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
            'contain' => ['Planificaciones', 'Menus']
        ];
        $this->set('planificacioneMenus', $this->paginate($this->PlanificacioneMenus));
        $this->set('_serialize', ['planificacioneMenus']);
    }

	public function publico()
	{
		$this->paginate = [
			'contain' => ['Planificaciones', 'Menus']
		];
		$this->set('planificacioneMenus', $this->paginate($this->PlanificacioneMenus));
		$this->set('_serialize', ['planificacioneMenus']);
	}
    /**
     * View method
     *
     * @param string|null $id Planificacione Menu id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $planificacioneMenu = $this->PlanificacioneMenus->get($id, [
            'contain' => ['Planificaciones', 'Menus']
        ]);
        $this->set('planificacioneMenu', $planificacioneMenu);
        $this->set('_serialize', ['planificacioneMenu']);
    }
	
	public function vista($id = null)
    {
        $planificacioneMenu = $this->PlanificacioneMenus->get($id, [
            'contain' => ['Planificaciones', 'Menus']
        ]);
        $this->set('planificacioneMenu', $planificacioneMenu);
        $this->set('_serialize', ['planificacioneMenu']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $planificacioneMenu = $this->PlanificacioneMenus->newEntity();
        if ($this->request->is('post')) {
            $planificacioneMenu = $this->PlanificacioneMenus->patchEntity($planificacioneMenu, $this->request->data);
			
            if ($this->PlanificacioneMenus->save($planificacioneMenu)) {
                $this->Flash->success(__('La planificación se ha guardado correctamente'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ha ocurrido un error al guardar la planificación. Inténtelo de nuevo'));
            }
        }
        $planificaciones = $this->PlanificacioneMenus->Planificaciones->find('list', ['limit' => 200]);
        $menus = $this->PlanificacioneMenus->Menus->find('list', ['limit' => 200]);
        $this->set(compact('planificacioneMenu', 'planificaciones', 'menus'));
        $this->set('_serialize', ['planificacioneMenu']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Planificacione Menu id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $planificacioneMenu = $this->PlanificacioneMenus->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $planificacioneMenu = $this->PlanificacioneMenus->patchEntity($planificacioneMenu, $this->request->data);
            if ($this->PlanificacioneMenus->save($planificacioneMenu)) {
                $this->Flash->success(__('La planificación se ha guardado correctamente'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Ha ocurrido un error al guardar la planificación. Inténtelo de nuevo'));
            }
        }
        $planificaciones = $this->PlanificacioneMenus->Planificaciones->find('list', ['limit' => 200]);
        $menus = $this->PlanificacioneMenus->Menus->find('list', ['limit' => 200]);
        $this->set(compact('planificacioneMenu', 'planificaciones', 'menus'));
        $this->set('_serialize', ['planificacioneMenu']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Planificacione Menu id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $planificacioneMenu = $this->PlanificacioneMenus->get($id);
        if ($this->PlanificacioneMenus->delete($planificacioneMenu)) {
            $this->Flash->success(__('The planificacione menu has been deleted.'));
        } else {
            $this->Flash->error(__('The planificacione menu could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
