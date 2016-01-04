<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'userModel' => 'Usuarios',
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ],
                    //DTR: Especificar con el atributo "finder" la funcion de 
                    //.... busqueda "findAuth()" en la clase "UsuariosTable".
                    'finder' => 'auth',
                ]
            ],
            'authError' => '¿Seguro que tiene permisos suficientes?',
            'loginAction' => [
                'controller' => 'Usuarios',
                'action' => 'login'
            ],
            //DTR: Configurar donde debe ir cuando se hace "logout"...
            'logoutRedirect' => [
                'controller' => 'Pages',
                'action' => 'display',
                'home'
            ],
            'scope' => [],
            'contain' => null,
            //DTR: Comentar para no usar el tipo "PASSWORD_DEFAULT" por defecto, 
            //.... que en el futuro puede ocupar mas de 60 caracteres en la BD.
            //'passwordHasher' => 'Default'
            //DTR: Y especificar el algoritmo concreto para la funcion de hash
            //.... que genera claves de 60 caracteres de largo para el campo en la BD.
            'passwordHasher' => ['class'=>'Default','hashType'=>PASSWORD_BCRYPT],
            'authorize' => 'Controller',//DTR: Autorizacion mediante metodo "isAuthorized()" de los controladores. C mayúscula para que funcione en linux
            'storage' => 'Session'
        ]);
        //DTR: Si el metodo "display" existe en todos los controladores esta 
        //.... bien configurarlo aqui, sino mejor no poner ninguno y dejarlo
        //.... para configurarlo en cada controlador.
        $this->Auth->allow('display');
    }
    
    /**
     * DTR: Implementar el metodo de control de autorizaciones en los controladores
     * que lo necesiten.
     *
     * Metodo de control de autorizaciones, que se debe reescribir en herencia
     * si se desea particularizar alguna accion para un controlador concreto,
     * y se puede aprovechar la herencia del padre ya programada.
     */
    public function isAuthorized($usuario = null)
    {
      //DTR: Por defecto no se autoriza el acceso al usuario/rol/controlador/accion.
      $res= false;
      //DTR: Si se quiere controlar en herencia, reusar el metodo padre...
      //...pero solo en herencia de "AppController"
      //$res= parent::isAuthorized( $usuario);
      
//\Cake\Log\Log::write( 'debug', __METHOD__.'['.__LINE__.']'.' usuario= '.var_export( $usuario, true));
//\Cake\Log\Log::write( 'debug', __METHOD__.'['.__LINE__.']'.' request.params= '.var_export( $this->request->params, true));
      //DTR: Iniciar algunas variables locales para trabajar mejor...
      $rol= ($usuario !== null) ? $usuario['rol'] : '';//Rol vacio (como "Invitado") si no hay usuario.
      $controlador= $this->request->params['controller'];
      $accion= $this->request->params['action'];
      
      //Si se recibe un usuario (tiene ROL) se puede comprobar como registrado, sino no.
      if (($usuario !== null) && !empty($rol)) {
        
        //DTR: Por defecto los usuarios registrados de "rol" administrador 
        //pueden acceder a cualquier accion.
        if (!$res && (strcasecmp( $rol, 'A') == 0) && $accion != 'cambiarRol') {
          $res= true;
        }
        //DTR: Por ejemplo, si se quiere comprobar una accion en concreto en
        //comun para muchos o todos los controladores, se puede poner aqui...
        //...sino lo mejor es ya ponerlo en cada controlador concreto.
        /*---*XX/
        if (!$res && (strcasecmp( $accion, 'index') == 0) {
          $res= true;
        }//---*/
        
      }//if "hay usuario"
\Cake\Log\Log::write( 'debug', __METHOD__.'['.__LINE__.']'.' rol= '.$rol.', acceso= '.$controlador.'::'.$accion.', res= '.var_export( $res, true));
      return $res;
    }//isAuthorized

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
}
