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

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <?= $this->Html->css('admin.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-2 medium-4 columns">
            <li>
                Aqu√≠ va el logotipo
            </li>
        </ul>
        <section class="top-bar-section">
            <ul class="right">
                <?php //DTR: Incluir si hay usuario conectado o no...
                $usuario= $this->request->session()->read('Auth.User');
//\Cake\Log\Log::write( 'debug', __METHOD__.'['.__LINE__.']'.' usuario= '.var_export( $usuario, true));
//\Cake\Log\Log::write( 'debug', __METHOD__.'['.__LINE__.']'.' _SESSION= '.var_export( $this->request->session(), true));
                echo '<li>';
                if ($usuario !== null) {
				  if($usuario['rol']!=='C')
                  {
					  echo '<li>';
					  echo $this->Html->link('Administrar Tiendas', ['controller' => 'tiendas', 'action' => 'index']);
					  echo '</li>';
					  echo '<li>';
					  echo $this->Html->link('Administrar Ofertas', ['controller' => 'tiendaOfertas', 'action' => 'index']);
					  echo '</li>';
				  }else{
						  echo '<li>';
					  echo $this->Html->link('Tiendas', ['controller' => 'tiendas', 'action' => 'indexpublico']);
					  echo '</li>';
					  echo '<li>';
					  echo $this->Html->link('Ofertas', ['controller' => 'tiendaOfertas', 'action' => 'index2']);
					  echo '</li>';
				  }
                    echo '<li>';
                  echo $this->Html->link('Administrar recetas', ['controller' => 'recetas', 'action' => 'index']);
                  echo '</li>';
                  
                  echo '<li>';
                  echo $this->Html->link('Administrar men˙s', ['controller' => 'menus', 'action' => 'index']);
                  echo '</li>';
				  
                  echo '<li>';
                  echo $this->Html->link('Administrar planificaciones', ['controller' => 'planificacioneMenus', 'action' => 'index']);
                  echo '</li>';
                  
                  echo $this->Html->link( 'Cerrar Sesion ['.$usuario['nombre'].'-'.$usuario['rol'].']', ['controller'=>'usuarios', 'action'=>'logout']);
                  if($usuario['nombre'] === 'sysadmin')
                  {
                      $opciones = \App\Model\Entity\Usuario::getTodosRoles();
                      echo '<ul class="xxx">';
                      echo $this->Form->select('Cambiar Rol', $opciones, [
                        'val'=>$usuario['rol'], 
                        'hiddenField'=>false, 
                        'onchange'=>'var u=\''.$this->Url->build(['controller'=>'usuarios','action'=>'cambiarRol','XX']).'\';document.location=u.replace(\'XX\',this.value);',
                    ]);
                      /*foreach ($opciones as $key => $value)
                      {
                          echo '<li class="cambio-rol">';
                          echo $this->Html->link($value, ['controller' => 'usuarios', 'action' => 'cambiarRol', $key]);
                          //echo $this->Form->postLink($value, ['controller' => 'usuarios', 'action' => 'cambiarRol', $key]);
                          echo '</li>';
                      }*/
                      echo '</ul>';
                      //echo $this->Form->postButton(__('Cambiar Rol'), ['controller' => 'usuarios', 'action' => 'cambiarRol']);
                  }
                } else {
                    
                  echo '<li>';
                  echo $this->Html->link('Tiendas', ['controller' => 'tiendas', 'action' => 'indexpublico']);
                  echo '</li>';
				  echo '<li>';
                  echo $this->Html->link('Ofertas', ['controller' => 'tiendaOfertas', 'action' => 'index2']);
                  echo '</li>';
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
    <?= $this->Flash->render() ?>
    <?= $this->Flash->render('auth') ?>
    <section class="container clearfix">
        <?= $this->fetch('content') ?>
    </section>
    <footer>
    </footer>
</body>
</html>
