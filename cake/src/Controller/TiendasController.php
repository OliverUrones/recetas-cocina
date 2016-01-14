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
	public $mistiendas=array();
	
    public function index()
    {
        $this->paginate = [
            'contain' => ['Usuarios']
        ];
		$tiendas= $this->paginate($this->Tiendas);
		$usuario= $this->request->session()->read('Auth.User');
		if( $usuario['rol']!=='A'){
			$aux=array();
			foreach($tiendas as $tienda){
				if($tienda->usuario_id==$usuario->id){
					array_push($aux,$tienda);
				}
			}
			$tiendas=$aux;
			$mistiendas=$aux;
		}
        $this->set('tiendas',$tiendas);
        $this->set('_serialize', ['tiendas']);
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
			$mia=false;
			foreach($mistiendas as $tienda){
				if($tienda->id==$id){
					$mia=true;
					break;
				}
			}
			if(!$mia){
				 return $this->redirect(['action' => 'index']);
			}
		}
        $this->set('tienda', $tienda);
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
        if ($this->request->is('post')) {
            $tienda = $this->Tiendas->patchEntity($tienda, $this->request->data);
			$usuario= $this->request->session()->read('Auth.User');
			$tienda->usuario_id=$usuario['id'];
            if ($this->Tiendas->save($tienda)) {
                $this->Flash->success(__('The tienda has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tienda could not be saved. Please, try again.'));
            }
        }
        $usuarios = $this->Tiendas->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('tienda', 'usuarios'));
        $this->set('_serialize', ['tienda']);
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
		if( $usuario['rol']!=='A'){
			$mia=false;
			foreach($mistiendas as $tienda){
				if($tienda->id==$id){
					$mia=true;
					break;
				}
			}
			if(!$mia){
				 return $this->redirect(['action' => 'index']);
			}
		}
		$tienda = $this->Tiendas->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $tienda = $this->Tiendas->patchEntity($tienda, $this->request->data);
			$usuario= $this->request->session()->read('Auth.User');
			$tienda->usuario_id=$usuario['id'];
            if ($this->Tiendas->save($tienda)) {
                $this->Flash->success(__('The tienda has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The tienda could not be saved. Please, try again.'));
            }
        }
        $usuarios = $this->Tiendas->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('tienda', 'usuarios'));
        $this->set('_serialize', ['tienda']);
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
		$usuario= $this->request->session()->read('Auth.User');
		if( $usuario['rol']!=='A'){
			$mia=false;
			foreach($mistiendas as $tienda){
				if($tienda->id==$id){
					$mia=true;
					break;
				}
			}
			if(!$mia){
				 return $this->redirect(['action' => 'index']);
			}
		}
        $this->request->allowMethod(['post', 'delete']);
        $tienda = $this->Tiendas->get($id);
        if ($this->Tiendas->delete($tienda)) {
            $this->Flash->success(__('The tienda has been deleted.'));
        } else {
            $this->Flash->error(__('The tienda could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
