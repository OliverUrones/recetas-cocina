<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Tiendas Controller
 *
 * @property \App\Model\Table\TiendasTable $Tiendas */
class TiendasController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
	//private $mistiendas=array();
	
    public function index()
    {
        $this->paginate = [
            'contain' => ['Usuarios']
        ];
        $aux=array();
		$tiendas= $this->paginate($this->Tiendas);
		$usuario= $this->request->session()->read('Auth.User');
		if( $usuario['rol']!=='A'){
			$aux=array();
			foreach($tiendas as $tienda){
				if($tienda->usuario_id==$usuario['id']){
					array_push($aux,$tienda);
				}
			}
			$tiendas=$aux;
			
		}

            $this->set('tiendas',$tiendas);
             $this->set('_serialize', ['tiendas']);

        
       
    }
    
    
    public function indexpublico()
    {
	$tiendas= $this->paginate($this->Tiendas);
        $this->set('tiendas');
        $this->set('_serialize', ['tiendas']);

    }
    
    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
        
        //$this->Auth->allow('index2');
        //$this->Auth->allow('view2');
        // $this->Auth->allow('portada');
        $usuario= $this->request->session()->read('Auth.User');
      
        $this->Auth->allow('indexpublico');
         $this->Auth->allow('viewpublico');
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
     * View method
     *
     * @param string|null $id Tienda id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usuario= $this->request->session()->read('Auth.User');
        $tienda = $this->Tiendas->get($id, [
            'contain' => ['Usuarios', 'TiendaOfertas']
        ]);
		if( $usuario['rol']!=='A'){
			/*$mia=false;
			foreach($mistiendas as $tienda){
				if($tienda->id==$id){
					$mia=true;
					break;
				}
			}*/
                        if($tienda->usuario_id!==$usuario['id'])
                        {
                            return $this->redirect(['action' => 'index']);
			}
		}
                
        $listaOfertas=array();
        foreach ($tienda->tienda_ofertas as $tiendaOfertas){
            $tiendaOfertas = $this->Tiendas->TiendaOfertas->get($tiendaOfertas->id, [
            'contain' => [ 'Ingredientes']
            ]);
            array_push($listaOfertas,$tiendaOfertas);
        }
        $this->set(compact('tienda', 'listaOfertas'));
        $this->set('_serialize', ['tienda']);
    }
    public function viewpublico($id = null)
    {
        
        $tienda = $this->Tiendas->get($id, [
            'contain' => ['Usuarios', 'TiendaOfertas']
        ]);
     
        $listaOfertas=array();
        foreach ($tienda->tienda_ofertas as $tiendaOfertas){
            $tiendaOfertas = $this->Tiendas->TiendaOfertas->get($tiendaOfertas->id, [
            'contain' => [ 'Ingredientes']
            ]);
            array_push($listaOfertas,$tiendaOfertas);
        }
        if($tienda->visible!==true || $tienda->activa!== true )
                        {
                            return $this->redirect(['action' => 'indexpublico']);
			}
        
        $this->set(compact('tienda', 'listaOfertas'));
        $this->set('_serialize', ['tienda']);
    }
    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $tienda = $this->Tiendas->newEntity();
        $usuario= $this->request->session()->read('Auth.User');
        $nusu=array();
        $idusu=array();
        if( $usuario['rol']!=='A'){
            if ($this->request->is('post')) {
                $tienda = $this->Tiendas->patchEntity($tienda, $this->request->data);
                $tienda->usuario_id=$usuario['id'];
                $tienda->activa=0;
                if ($this->Tiendas->save($tienda)) {
                    $this->Flash->success(__('La tienda ha sido guardada.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('La tienda no se ha podido guardar. Por favor, intentelo de nuevo.'));
                }
            }
            $this->set(compact('tienda'));
            $this->set('_serialize', ['tienda']);
        }else{
            $usuarios = $this->paginate('Usuarios');
            foreach($usuarios as $usu){
                if($usu->rol !== 'C'){
		array_push($nusu,$usu->nombre);
                array_push($idusu, $usu->id);}
            }
            if ($this->request->is('post')) {
                $tienda = $this->Tiendas->patchEntity($tienda, $this->request->data);
                $tienda->usuario_id=$idusu[$tienda->usuario_id];
                if ($this->Tiendas->save($tienda)) {
                    $this->Flash->success(__('La tienda ha sido guardada.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('La tienda no se ha podido guardar. Por favor, intentelo de nuevo.'));
                }
            }
            
            $this->set(compact('tienda', 'nusu'));
            $this->set('_serialize', ['tienda']);
        } 
        
    }

    /**
     * Edit method
     *
     * @param string|null $id Tienda id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usuario= $this->request->session()->read('Auth.User');
        $tienda = $this->Tiendas->get($id, [
            'contain' => []
        ]);
        $nusu=array();
        $idusu=array();
	if( $usuario['rol']!=='A'){
            if($tienda->usuario_id!==$usuario['id'])
            {
                return $this->redirect(['action' => 'index']);
            }
            if ($this->request->is(['patch', 'post', 'put'])) {
                $tienda = $this->Tiendas->patchEntity($tienda, $this->request->data);
		$tienda->usuario_id=$usuario['id'];
                if ($this->Tiendas->save($tienda)) {
                    $this->Flash->success(__('La tienda ha sido guardada.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('La tienda no se ha podido guardar. Por favor, intentelo de nuevo.'));
                }
            }
            $this->set('tienda');
            $this->set('_serialize', ['tienda']);
	}else{
            $usuarios = $this->paginate('Usuarios');
            foreach($usuarios as $usu){
		array_push($nusu,$usu->nombre);
                array_push($idusu, $usu->id);
            }
            if ($this->request->is(['patch', 'post', 'put'])) {
                $tienda = $this->Tiendas->patchEntity($tienda, $this->request->data);
                $tienda->usuario_id=$idusu[$tienda->usuario_id];
                if ($this->Tiendas->save($tienda)) {
                    $this->Flash->success(__('The tienda has been saved.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('The tienda could not be saved. Please, try again.'));
                }
            }
            $tienda->usuario_id=array_search($tienda->usuario_id,$idusu);
            $this->set(compact('tienda', 'nusu'));
            $this->set('_serialize', ['tienda']);
        } 
		

        
    }

    /**
     * Delete method
     *
     * @param string|null $id Tienda id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $tienda = $this->Tiendas->get($id);
		$usuario= $this->request->session()->read('Auth.User');
		if( $usuario['rol']!=='A'){
			 if($tienda->usuario_id!==$usuario['id'])
                        {
                            return $this->redirect(['action' => 'index']);
			}
		}
        $this->request->allowMethod(['post', 'delete']);
        
        if ($this->Tiendas->delete($tienda)) {
            $this->Flash->success(__('La tienda ha sido borrada.'));
        } else {
            $this->Flash->error(__('La tienda no ha podido ser borrada. Por favor, intentelo de nuevo.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
