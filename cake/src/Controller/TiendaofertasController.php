<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TiendaOfertas Controller
 *
 * @property \App\Model\Table\TiendaOfertasTable $TiendaOfertas
 */
class TiendaOfertasController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
        
        $this->Auth->allow('index');
         $this->Auth->allow('view');
          $this->Auth->allow('portada');
        $this->Auth->redirectUrl();
    }
    
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tiendas', 'Ingredientes']
        ];
        $this->set('tiendaOfertas', $this->paginate($this->TiendaOfertas));
        $this->set('_serialize', ['tiendaOfertas']);
    }
    
    
    public function portada()
    {
        $this->paginate = [
            'contain' => ['Tiendas', 'Ingredientes']
        ];
        $this->set('tiendaOfertas', $this->paginate($this->TiendaOfertas));
        $this->set('_serialize', ['tiendaOfertas']);
    }

    /**
     * View method
     *
     * @param string|null $id Tienda Oferta id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $tiendaOferta = $this->TiendaOfertas->get($id, [
            'contain' => ['Tiendas', 'Ingredientes']
        ]);
        $this->set('tiendaOferta', $tiendaOferta);
        $this->set('_serialize', ['tiendaOferta']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tiendaoferta = $this->Tiendaofertas->newEntity();
        if ($this->request->is('post')) {
            $tiendaoferta = $this->Tiendaofertas->patchEntity($tiendaoferta, $this->request->data);
            if ($this->Tiendaofertas->save($tiendaoferta)) {
                $this->Flash->success(__('The tiendaoferta has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tiendaoferta could not be saved. Please, try again.'));
            }
        }
        $tiendas = $this->Tiendaofertas->Tiendas->find('list', ['limit' => 200]);
        $ingredientes = $this->Tiendaofertas->Ingredientes->find('list', ['limit' => 200]);
        $this->set(compact('tiendaoferta', 'tiendas', 'ingredientes'));
        $this->set('_serialize', ['tiendaoferta']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tiendaoferta id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tiendaoferta = $this->Tiendaofertas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tiendaoferta = $this->Tiendaofertas->patchEntity($tiendaoferta, $this->request->data);
            if ($this->Tiendaofertas->save($tiendaoferta)) {
                $this->Flash->success(__('The tiendaoferta has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tiendaoferta could not be saved. Please, try again.'));
            }
        }
        $tiendas = $this->Tiendaofertas->Tiendas->find('list', ['limit' => 200]);
        $ingredientes = $this->Tiendaofertas->Ingredientes->find('list', ['limit' => 200]);
        $this->set(compact('tiendaoferta', 'tiendas', 'ingredientes'));
        $this->set('_serialize', ['tiendaoferta']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tiendaoferta id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tiendaoferta = $this->Tiendaofertas->get($id);
        if ($this->Tiendaofertas->delete($tiendaoferta)) {
            $this->Flash->success(__('The tiendaoferta has been deleted.'));
        } else {
            $this->Flash->error(__('The tiendaoferta could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
