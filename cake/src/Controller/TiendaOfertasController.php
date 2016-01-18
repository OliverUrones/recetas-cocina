<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * TiendaOfertas Controller
 *
 * @property \App\Model\Table\TiendaOfertasTable $TiendaOfertas */
class TiendaOfertasController extends AppController
{
    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
        
        $this->Auth->allow('index2');
         $this->Auth->allow('view2');
          $this->Auth->allow('portada');
        $usuario= $this->request->session()->read('Auth.User');
        if($usuario['rol']=='T'){
            $this->Auth->allow('index');
            $this->Auth->allow('view');
            $this->Auth->allow('add');
            $this->Auth->allow('edit');
            $this->Auth->allow('delete');
        }
        $this->Auth->redirectUrl();
    }
    /**
     * Index method
     *
     * @return void
     */
	// public $misofertas=array();
	
    public function index()
    {
        $this->paginate = [
            'contain' => ['Tiendas', 'Ingredientes']
        ];
		$tiendaOfertas=$this->paginate($this->TiendaOfertas);
		$usuario= $this->request->session()->read('Auth.User');
		if( $usuario['rol']!=='A'){
			$aux=array();
			foreach($tiendaOfertas as $oferta){
				if($oferta->tienda->usuario_id==$usuario['id']){
					array_push($aux,$oferta);
				}
			}
			$tiendaOfertas=$aux;
		}
        $this->set('tiendaOfertas',$tiendaOfertas);
        $this->set('_serialize', ['tiendaOfertas']);
    }
	
	public function index2()
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
		$usuario= $this->request->session()->read('Auth.User');
		if( $usuario['rol']!=='A'){
			if($tiendaOferta->tienda->usuario_id!==$usuario['id'])
                        {
                            return $this->redirect(['action' => 'index']);
			}
		}
        
        $this->set('tiendaOferta', $tiendaOferta);
        $this->set('_serialize', ['tiendaOferta']);
    }
	
	public function view2($id = null)
    {
        $tiendaOferta = $this->TiendaOfertas->get($id, [
            'contain' => ['Tiendas', 'Ingredientes']
        ]);
         if($tiendaOferta->tienda->visible!==true || $tiendaOferta->tienda->activa!== true )
                        {
                            return $this->redirect(['action' => 'index2']);
			}
        $this->set('tiendaOferta',$tiendaOferta);
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
		$usuario= $this->request->session()->read('Auth.User');
		$tiendas=$this->paginate('Tiendas');
                $ingredientes=$this->paginate('Ingredientes');
		$idtiendas=array();
		$nombres=array();
                $idingredientes=array();
		$nombresing=array();
                foreach($ingredientes as $ingrediente){
                                array_push($idingredientes,$ingrediente->id);
				array_push($nombresing,$ingrediente->nombre);
                }
		if( $usuario['rol']!=='A'){
		
			foreach($tiendas as $tienda){
				if($tienda->usuario_id==$usuario['id']){
					array_push($idtiendas,$tienda->id);
					array_push($nombres,$tienda->nombre);
				}
			}
		}else{
			foreach($tiendas as $tienda){				
					array_push($idtiendas,$tienda->id);
					array_push($nombres,$tienda->nombre);
				
			}
		}
        if ($this->request->is('post')) {
            $tiendaOferta = $this->TiendaOfertas->patchEntity($tiendaOferta, $this->request->data);
            $tiendaOferta->ingrediente_id= $idingredientes[$tiendaOferta->ingrediente_id];
            $tiendaOferta->tienda_id=$idtiendas[$tiendaOferta->tienda_id];
            if ($this->TiendaOfertas->save($tiendaOferta)) {
                $this->Flash->success(__('La oferta ha sido guardada.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('La oferta ha sido guardada. Por favor, intentelo de nuevo.'.$this->request->data->tienda_id));
            }
        }
        
		
		//$nombres= $this->TiendaOfertas->Tiendas->find('list', ['limit' => 200]);
        //$ingredientes = $this->TiendaOfertas->Ingredientes->find('list', ['limit' => 200]);
        $this->set(compact('tiendaOferta', 'nombres', 'nombresing'));
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
        
	$usuario= $this->request->session()->read('Auth.User');
        $tiendas=$this->paginate('Tiendas');
        $ingredientes=$this->paginate('Ingredientes');  
        $idtiendas=array();
        $nombres=array();
        $idingredientes=array();
	$nombresing=array();
        $tiendaOferta = $this->TiendaOfertas->get($id, [
            'contain' => ['Tiendas', 'Ingredientes']
        ]);
		if( $usuario['rol']!=='A'){
			 if($tiendaOferta->tienda->usuario_id!==$usuario['id'])
                        {
                            return $this->redirect(['action' => 'index']);
			}
                        foreach($tiendas as $tienda){
				if($tienda->usuario_id==$usuario['id']){
                                    array_push($idtiendas,$tienda->id);
                                    array_push($nombres,$tienda->nombre);
				}
			}
		}
                else{
                    foreach($tiendas as $tienda){
			array_push($idtiendas,$tienda->id);
			array_push($nombres,$tienda->nombre);
				
			}
                }
        foreach($ingredientes as $ingrediente){
                array_push($idingredientes,$ingrediente->id);
		array_push($nombresing,$ingrediente->nombre);
        }
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $tiendaOferta = $this->TiendaOfertas->patchEntity($tiendaOferta, $this->request->data);
            $tiendaOferta->tienda_id=$idtiendas[$tiendaOferta->tienda_id];
            $tiendaOferta->ingrediente_id=$idingredientes[$tiendaOferta->ingrediente_id];
            if ($this->TiendaOfertas->save($tiendaOferta)) {
                $this->Flash->success(__('La oferta ha sido guardada.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('La oferta no ha podido ser guardada. Por favor, intentelo de nuevo.'));
            }
        }
        //$tiendas = $this->TiendaOfertas->Tiendas->find('list', ['limit' => 200]);
        //$ingredientes = $this->TiendaOfertas->Ingredientes->find('list', ['limit' => 200]);
        //$this->set(compact('tiendaOferta', 'tiendas', 'ingredientes'));
        $tiendaOferta->tienda_id=array_search($tiendaOferta->tienda_id,$idtiendas);
        $tiendaOferta->ingrediente_id=array_search($tiendaOferta->ingrediente_id,$idingredientes);
        //$tiendaOferta->ingredientes=$tiendaOferta->ingredientes - 1;
        $this->set(compact('tiendaOferta', 'nombres', 'nombresing'));
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
        $tiendaOferta = $this->TiendaOfertas->get($id, [
            'contain' => ['Tiendas', 'Ingredientes']
        ]);
		$usuario= $this->request->session()->read('Auth.User');
		if( $usuario['rol']!=='A'){
			 if($tiendaOferta->tienda->usuario_id!==$usuario['id'])
                        {
                            return $this->redirect(['action' => 'index']);
			}
		}
        $this->request->allowMethod(['post', 'delete']);
        if ($this->TiendaOfertas->delete($tiendaOferta)) {
            $this->Flash->success(__('La oferta ha sido borrada.'));
        } else {
            $this->Flash->error(__('La oferta no ha podido ser borrada. Por favor, intentelo de nuevo.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
