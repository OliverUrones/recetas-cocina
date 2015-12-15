<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Usuarios Controller
 *
 * @property \App\Model\Table\UsuariosTable $Usuarios
 */
class UsuariosController extends AppController
{

    /*---*XX/
    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
        //$this->Auth->allow(['registro','index','add']);//DTR: pruebas y poder añadir un usuario...
        //$this->Auth->allow(['registro','index','add','edit']);//DTR: pruebas y poder añadir un usuario...
        $this->Auth->allow('registro');
        $this->Auth->deny();//En caso de no validar ninguna accion, denegar siempre.
        
        //DTR: establecer la URL a la que redirigir si hay que pasar por LOGIN.
        $this->Auth->redirectUrl();
    }//---*/
    
    /**
     * DTR: Implementacion detallada del metodo de control de autorizaciones.
     */
/*---*XX/
    public function isAuthorized($user = null)
    {
      //DTR: Por defecto no se autoriza el acceso al usuario/rol/controlador/accion.
      $res= false;
      //DTR: Si se quiere controlar en herencia, reusar el metodo padre...
      //...pero solo en herencia de "AppController"
      $res= parent::isAuthorized( $user);
      
      //Cualquiera de las acciones de este controlador se permiten SOLO para 
      //los  usuarios de rol administrador, y eso se controla ya en 
      //"AppController".
      
      return $res;
    }//isAuthorized
//---*/
    
    public function login()
    {
        $usuario = $this->Usuarios->newEntity();//DTR: que exista la variable para iniciarla en vacio
        if($this->request->is('post'))
        {
            $usuario = $this->Auth->identify();
//\Cake\Log\Log::write( 'debug', __METHOD__.'['.__LINE__.']'.' usuario= '.var_export( $usuario, true));
//\Cake\Log\Log::write( 'debug', __METHOD__.'['.__LINE__.']'.' _SESSION= '.var_export( $_SESSION, true));
            if($usuario)
            {
                $this->Auth->setUser($usuario);
                return $this->redirect( $this->Auth->redirectUrl());
            }else
            {
                $this->Flash->error(__('Usuario o contraseña incorrectos'),'default',[],'auth');
            }
        }
        $this->set(compact('usuario'));
        $this->set('_serialize', ['usuario']);
//\Cake\Log\Log::write( 'debug', __METHOD__.'['.__LINE__.']'.' _SESSION= '.var_export( $_SESSION, true));
    }
    
    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
    
    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('usuarios', $this->paginate($this->Usuarios));
        $this->set('_serialize', ['usuarios']);
    }

    /**
     * View method
     *
     * @param string|null $id Usuario id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => []
        ]);
        $this->set('usuario', $usuario);
        $this->set('_serialize', ['usuario']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $usuario= $this->Usuarios->newEntity();
//\Cake\Log\Log::write( 'debug', __METHOD__.'['.__LINE__.']'.' POST= '.var_export($_POST, true));
//\Cake\Log\Log::write( 'debug', __METHOD__.'['.__LINE__.']'.' data= '.var_export( $this->request->data, true));
        if ($this->request->is('post')) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->data);
//\Cake\Log\Log::write( 'debug', __METHOD__.'['.__LINE__.']'.' usuario= '.var_export( get_class( $usuario), true));
\Cake\Log\Log::write( 'debug', __METHOD__.'['.__LINE__.']'.' usuario= '.var_export( $usuario->__debugInfo(), true));
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('El usuario ha sido creado correctamente.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('No se ha podido crear el usuario. Inténtelo de nuevo.'));
            }
        }
        $this->set(compact('usuario'));
        $this->set('_serialize', ['usuario']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Usuario id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $usuario = $this->Usuarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->data);
            if ($this->Usuarios->save($usuario)) {
                $this->Flash->success(__('The usuario has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The usuario could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('usuario'));
        $this->set('_serialize', ['usuario']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Usuario id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $usuario = $this->Usuarios->get($id);
        if ($this->Usuarios->delete($usuario)) {
            $this->Flash->success(__('The usuario has been deleted.'));
        } else {
            $this->Flash->error(__('The usuario could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
