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
    public function index()
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
        $tiendaOferta = $this->TiendaOfertas->newEntity();
        if ($this->request->is('post')) {
            $tiendaOferta = $this->TiendaOfertas->patchEntity($tiendaOferta, $this->request->data);
            if ($this->TiendaOfertas->save($tiendaOferta)) {
                $this->Flash->success(__('The tienda oferta has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tienda oferta could not be saved. Please, try again.'));
            }
        }
        $tiendas = $this->TiendaOfertas->Tiendas->find('list', ['limit' => 200]);
        $ingredientes = $this->TiendaOfertas->Ingredientes->find('list', ['limit' => 200]);
        $this->set(compact('tiendaOferta', 'tiendas', 'ingredientes'));
        $this->set('_serialize', ['tiendaOferta']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Tienda Oferta id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $tiendaOferta = $this->TiendaOfertas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tiendaOferta = $this->TiendaOfertas->patchEntity($tiendaOferta, $this->request->data);
            if ($this->TiendaOfertas->save($tiendaOferta)) {
                $this->Flash->success(__('The tienda oferta has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tienda oferta could not be saved. Please, try again.'));
            }
        }
        $tiendas = $this->TiendaOfertas->Tiendas->find('list', ['limit' => 200]);
        $ingredientes = $this->TiendaOfertas->Ingredientes->find('list', ['limit' => 200]);
        $this->set(compact('tiendaOferta', 'tiendas', 'ingredientes'));
        $this->set('_serialize', ['tiendaOferta']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Tienda Oferta id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $tiendaOferta = $this->TiendaOfertas->get($id);
        if ($this->TiendaOfertas->delete($tiendaOferta)) {
            $this->Flash->success(__('The tienda oferta has been deleted.'));
        } else {
            $this->Flash->error(__('The tienda oferta could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
