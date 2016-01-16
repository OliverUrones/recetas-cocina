
<div class="categorias left index large-7">
 <h3 align="center"><?= __('ARBOL DE CATEGORIAS') ?></h3>
 <table>	
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
$categorias = mysql_query("Select nombre from categorias where id = '".$categorias->id."'");
	foreach($arbol as $v){
		echo "<tr><td><h5>".$v."</td></h3>";	
		$param=substr($v,strpos($v,"-")+1);
		echo "<td>".$this->Html->link(__(' Ver recetas de esta categoria'), ['controller'=>'receta_categorias', 'action' => 'filtrado', 'categoria'=>$param])."</td></tr>";
	}
	
	
	?>
	
 </table>
   
</div>
