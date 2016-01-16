<div class="related">
<?php
$enlace =  mysql_connect('localhost', 'root', '');
if (!$enlace) {
    die('No pudo conectarse: ' . mysql_error());
}
 $usuario= $this->request->session()->read('Auth.User');
//echo 'Conectado satisfactoriamente';
$bd_seleccionada = mysql_select_db('daw_recetas', $enlace);
if (!$bd_seleccionada) {
    die ('No se puede usar daw_recetas : ' . mysql_error());
}
?>
        <h4><?= __('Related Receta Comentarios') ?></h4>
        <?php if (!empty($receta->receta_comentarios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Usuario') ?></th>
                <th><?= __('Fecha y hora') ?></th>
                <th><?= __('Texto') ?></th>
                <th class="actions"><?= __('Acciones') ?></th>
            </tr>
            <?php foreach ($receta->receta_comentarios as $recetaComentarios): ?>
            <tr>
				<?php 
				$nombreuser = mysql_query("Select nombre from usuarios where id = '".$recetaComentarios->usuario_id."'");
				$nombreuser= mysql_fetch_assoc($nombreuser);
				$nombreuser= $nombreuser['nombre'];
				?>
                <td><?= h($nombreuser) ?></td>
	
                <td><?= h($recetaComentarios->fechahora) ?></td>
                <td><?= h($recetaComentarios->texto) ?></td>
                <td class="actions">
				<?php 
				if($usuario['rol']=='A' || $usuario['id']==$recetaComentarios->usuario_id){
                   echo $this->Html->link(__('Editar'), ['controller' => 'RecetaComentarios', 'action' => 'edit', $recetaComentarios->id]) ;
				echo " ";
                   echo $this->Form->postLink(__('Eliminar'), ['controller' => 'RecetaComentarios', 'action' => 'delete', $recetaComentarios->id], ['confirm' => __('Esta seguro que la desea eliminar # {0}?', $recetaComentarios->id)]);
				}
				?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

		
    <?php endif;	?>

	<?php mysql_close($enlace);?>
		<?php 
		if(isset($usuario)){
		echo $this->Html->link(__('Nuevo Comentario'), ['controller' => 'Receta_comentarios', 'action' => 'add',$receta->id]);
		}
		?>
	
    </div>