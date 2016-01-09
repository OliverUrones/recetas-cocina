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
    

   

    /**
     * Delete method
     *
     * @param string|null $id Tienda Oferta id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
   
}
