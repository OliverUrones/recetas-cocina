<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;

$this->layout = false;

if (!Configure::read('debug')):
    throw new NotFoundException();
endif;

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
</head>
<body class="home">
<!--    <header>-->
        <nav class="top-bar expanded" data-topbar role="navigation">
        <section class="top-bar-section">
            <ul class="right">
                <?php //DTR: Incluir si hay usuario conectado o no...
                $usuario= $this->request->session()->read('Auth.User');
//\Cake\Log\Log::write( 'debug', __METHOD__.'['.__LINE__.']'.' usuario= '.var_export( $usuario, true));
//\Cake\Log\Log::write( 'debug', __METHOD__.'['.__LINE__.']'.' _SESSION= '.var_export( $this->request->session(), true));
                echo '<li>';
                if ($usuario !== null) {
                  echo $this->Html->link( 'Cerrar Sesion ['.$usuario['nombre'].'-'.$usuario['rol'].']', ['controller'=>'usuarios', 'action'=>'logout']);
                  if($usuario['nombre'] === 'sysadmin')
                  {
                      $opciones = \App\Model\Entity\Usuario::getTodosRoles();
                      //echo '<li>';
                      //echo $this->Form->select('Cambiar Rol', $opciones);
                      foreach ($opciones as $key => $value)
                      {
                          echo '<li>';
                          echo $this->Html->link($value, ['controller' => 'usuarios', 'action' => 'cambiarRol', $key]);
                          //echo $this->Form->postLink($value, ['controller' => 'usuarios', 'action' => 'cambiarRol', $key]);
                          echo '</li>';
                      }
                      //echo '</li>';
                      //echo $this->Form->postButton(__('Cambiar Rol'), ['controller' => 'usuarios', 'action' => 'cambiarRol']);
                  }
                } else {
                    echo '<li>';
                    echo $this->Html->link('Invitado', ['controller' => 'Pages', 'action' => 'display']);
                    echo '</li>';
                    echo '<li>';
                    echo $this->Html->link('Acceder', ['controller' => 'Usuarios', 'action' => 'login']);
                    echo '</li>';
                    echo '<li>';
                    echo $this->Html->link('Registrarse', ['controller' => 'Usuarios', 'action' => 'registro']);
                    echo '</li>';
                }
                echo '</li>';
                ?>
            </ul>
        </section>
    </nav>
<!--    </header>-->
   
      
<iframe src="http://localhost/recetas/cake/tienda_ofertas/portada" width="500" height="1000" align="right" >
    <footer>
    </footer>
</body>
</html>
