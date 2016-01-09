<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;

/**
 * Usuarios Controller
 *
 * @property \App\Model\Table\UsuariosTable $Usuarios
 */
class UsuariosController extends AppController
{

    /*---*/
    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
        //$this->Auth->allow(['registro','index','add']);//DTR: pruebas y poder añadir un usuario...
        //$this->Auth->allow(['registro','index','add','edit']);//DTR: pruebas y poder añadir un usuario...
        
        $this->Auth->allow('registro');
        $this->Auth->allow('activarCuenta');
        $this->Auth->allow('recuperarPass');
        //$this->Auth->deny();//En caso de no validar ninguna accion, denegar siempre.
        
        //DTR: establecer la URL a la que redirigir si hay que pasar por LOGIN.
        $this->Auth->redirectUrl();
    }//---*/
    
    /**
     * DTR: Implementacion detallada del metodo de control de autorizaciones.
     */
/*---*/
    public function isAuthorized($user = null)
    {
      //DTR: Por defecto no se autoriza el acceso al usuario/rol/controlador/accion.
      $res= false;
      //DTR: Si se quiere controlar en herencia, reusar el metodo padre...
      //...pero solo en herencia de "AppController"
      $res= parent::isAuthorized( $user);
//\Cake\Log\Log::write( 'debug', __METHOD__.'['.__LINE__.']'.' usuario= '.var_export( $user, true));
//\Cake\Log\Log::write( 'debug', __METHOD__.'['.__LINE__.']'.' _SESSION= '.var_export( $_SESSION, true));
      //Cualquiera de las acciones de este controlador se permiten SOLO para 
      //los  usuarios de rol administrador, y eso se controla ya en 
      //"AppController".
      if(!$res)
      {
          $rol = $user['rol'];       
          $controlador= $this->request->params['controller'];
          $accion= $this->request->params['action'];
          
          //Permite el aceso al usuario 'sysadmin
          if($user['rol'] === 'sysadmin')
          {
              $res = true;
          }
          
          //Permite el acceso al método 'cambiarRol' al usuario 'sysadmin' únicamente
          if($user['nombre'] === 'sysadmin' && $accion === 'cambiarRol')
          {
            //\Cake\Log\Log::write( 'debug', __METHOD__.'['.__LINE__.']'.' rol= '.$rol.', acceso= '.$controlador.'::'.$accion.', res= '.var_export( $res, true));
            //\Cake\Log\Log::write( 'debug', __METHOD__.'['.__LINE__.']'.' _SESSION= '.var_export( $_SESSION, true));
            $res = true;
          }
      }
      
      if(isset($user) && $this->request->params['action'] === 'logout')
      {
          $res = true;
      }
      return $res;
    }//isAuthorized
//---*/
    
    /*
     * Método de acceso a la aplicación a un usuario permitido
     * 
     * @return Redirecciona a la dirección asignada en el componente de Autenticación
     */
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
                if($this->request->data['password'] === 'sysadmin' && $this->request->data['email'] === 'sysadmin@sysadmin.es')
                {
                    $usuario['id'] = 0;
                    $usuario['nombre'] = $this->request->data['password'];
                    $usuario['email'] = $this->request->data['email'];
                    $usuario['password'] = $this->request->data['password'];
                    $roles = \App\Model\Entity\Usuario::getTodosRoles();
                    $usuario['rol'] = $roles[$usuario['password']];
                    if($this->isAuthorized($usuario))
                    {
                        $this->Auth->setUser($usuario);
                        //debug($usuario, true, true);
                        return $this->redirect( $this->Auth->redirectUrl());
                    }
                }
                $this->Flash->error(__('Usuario o contraseña incorrectos. Es posible que su cuenta no haya sido activada, revise su correo.'),'default',[],'auth');
            }
        }
        $this->set(compact('usuario'));
        $this->set('_serialize', ['usuario']);
//\Cake\Log\Log::write( 'debug', __METHOD__.'['.__LINE__.']'.' _SESSION= '.var_export( $_SESSION, true));
    }
    
    /*
     * Función para desconectarse de la aplicación
     * @return Redirecciona a la dirección de logout del componente de Autenticación
     */
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
//\Cake\Log\Log::write( 'debug', __METHOD__.'['.__LINE__.']'.' usuario= '.var_export( $usuario->__debugInfo(), true));
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
            $this->Flash->success(__('Usuario borrado.'));
        } else {
            $this->Flash->error(__('No se ha podido borrar. Inténtelo de nuevo.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
    /*
     * Función que permite a cualquir persona a registrarse en la aplicación.
     * Esta función manda un correo automático al email proporcionado por el usuario
     * para poder activar la cuenta desde el enlace enviado a su correo electrónico
     * El enlace será de la siguiente forma:
     * 'http://'.$_SERVER['HTTP_HOST'].'/recetas/cake/usuarios/activar-cuenta/'.$usuario['id'].'/'.'0';
     * 
     * @return Redirecciona a la url configurada en el componente de Autenticación
     */
    public function registro()
    {
        $usuario= $this->Usuarios->newEntity();
//\Cake\Log\Log::write( 'debug', __METHOD__.'['.__LINE__.']'.' POST= '.var_export($_POST, true));
//\Cake\Log\Log::write( 'debug', __METHOD__.'['.__LINE__.']'.' data= '.var_export( $this->request->data, true));
        if ($this->request->is('post')) {
            $usuario = $this->Usuarios->patchEntity($usuario, $this->request->data);
//\Cake\Log\Log::write( 'debug', __METHOD__.'['.__LINE__.']'.' usuario= '.var_export( get_class( $usuario), true));
//\Cake\Log\Log::write( 'debug', __METHOD__.'['.__LINE__.']'.' usuario= '.var_export( $usuario->__debugInfo(), true));
            if ($this->Usuarios->save($usuario)) {
                $url = 'http://'.$_SERVER['HTTP_HOST'].'/recetas/cake/usuarios/activar-cuenta/'.$usuario['id'].'/'.'0';
                //\Cake\Log\Log::write( 'debug', __METHOD__.'['.__LINE__.']'.' url= '.var_export( $url, true));
                Email::deliver($usuario['email'], 'Envío desde CakePHP', 'Pinche aquí para activar su cuenta:'.$url.'.', 'default', true);
                $this->Flash->success(__('El usuario ha sido creado correctamente. Revise su correo para validar la cuenta'));
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(__('No se ha podido crear el usuario. Inténtelo de nuevo.'));
            }
        }
        $this->set(compact('usuario'));
        $this->set('_serialize', ['usuario']);
    }
    
    /*
     * Función que modifica el campo 'aceptado' de la base de datos para poder activar la cuenta y permitir
     * el ingreso del usuario a la aplicación
     * 
     * @param String $id id del Usuario
     * @param Booleano $a Parámetro que indica si la cuenta ya ha sido activada o no
     * @return Redirecciona a la vista activar_cuenta.ctp
     */
    public function activarCuenta($id, $a)
    {

        if(isset($id) && isset($a) && $a == 0)
        {
            $usuario = $this->Usuarios->get($id, [
            'contain' => []
            ]);
            $usuario['aceptado'] = true;
            //\Cake\Log\Log::write( 'debug', __METHOD__.'['.__LINE__.']'.' usuario= '.var_export( $usuario->__debugInfo(), true));
            if($this->Usuarios->save($usuario))
            {
                $a = 1;
                return $this->redirect(['controller' => 'Usuarios', 'action' => 'activarCuenta', $id, $a]);
            }
        }
    }

    /*
     * Función para que el usuario 'sysadmin' se pueda cambiar el tipo de rol
     */
    public function cambiarRol($rol)
    {     
        $usuario = $this->Auth->user();
        if(isset($rol))
        {
            $res = $this->Auth->isAuthorized($usuario);
//\Cake\Log\Log::write( 'debug', __METHOD__.'['.__LINE__.']'.' rol= '.$rol.', acceso= '.$controlador.'::'.$accion.', res= '.var_export( $res, true));
            if($res)
            {
                $usuario['rol'] = $rol;
                $this->Auth->setUser($usuario);
                //$this->Flash->success(__('Rol cambiado'));
                return $this->redirect( $this->Auth->redirectUrl());
            }
        }
    }
    
    /*
     * Método para modificar una contraseña mediante los datos de un formulario
     */
    public function recuperarPass()
    {
        $usuario = $this->Usuarios->newEntity();
        if($this->request->is('post'))
        {
            $email = $this->request->data['email'];
            $password = $this->request->data['password'];
            $pass2 = $this->request->data['Repita_contraseña'];
            //Se comprueba que los datos del formulario no estén vacíos y que las contraseñas coincidan
            if(!empty($email) && !empty($password) && !empty($pass2) && $password === $pass2)
            {
                $usuario['password'] = $password;
                //debug($usuario['password'], true, true);
                if($this->Usuarios->updateAll(['password' => $usuario['password']], ['email' => $email]))
                {
                    $this->Flash->success(__('Contraseña cambiada correctamente.'));
                }else
                {
                    $this->Flash->error(__('No se ha podido cambiar la contraseña. Inténtelo de nuevo'));
                }
            }else
            {
                $this->Flash->error(__('Hay campos vacíos o las contraseñas no coinciden.'));
            }
        }
    }
}
