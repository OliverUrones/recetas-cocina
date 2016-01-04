<?php
$parametros = $this->request->params['pass'];
$id = $parametros[0];
$a = $parametros[1];
if($a == 1) { ?>
<h1>Su cuenta ha sido activada correctamente. Ya puede <?php echo $this->Html->link('inciar sesión', ['controller' => 'Usuarios', 'action' => 'login']) ?></h1>
<?php }else {?>
<h1>Ha habido un problema al activar su cuenta.</h1>
<?php } ?>
