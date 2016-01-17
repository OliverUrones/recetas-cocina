
<div class="categorias left index large-7">
 <h3 align="center"><?= __('ARBOL DE CATEGORIAS') ?></h3>
 <table>	
<?php
$miarbol=array();
if(!isset($arbol)){
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
$categorias = mysql_query("Select id from categorias where parent_id = 0");
$padres=array();
while($fila = mysql_fetch_assoc($categorias)){
	array_push($padres,$fila['id']);
}
$miarbol=array();
$miarbol=crea_arbol($padres,$miarbol,"");
}else{
	$miarbol=$arbol;
}
	foreach($miarbol as $v){
		echo "<tr><td><h5>".$v."</td></h3>";	
		$param=substr($v,strpos($v,"-")+1);
		echo "<td>".$this->Html->link(__(' Ver recetas de esta categoria'), ['controller'=>'receta_categorias', 'action' => 'filtrado', 'categoria'=>$param])."</td></tr>";
	}
	
	
	?>
	
 </table>
   
</div>
<?php
function crea_arbol($padres,$arbol,$espacios){
		foreach($padres as $v){
			$rs = mysql_query("Select nombre from categorias where id = ".$v);
			$fila=mysql_fetch_assoc($rs);
			array_push($arbol,$espacios."-".$fila['nombre']);
			$hijos=array();
			$rs = mysql_query("Select id from categorias where parent_id = ".$v);
			while($fila=mysql_fetch_assoc($rs)){
				array_push($hijos,$fila['id']);
			}
			if(count($hijos)>0){
				$arbol=crea_arbol($hijos,$arbol,"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$espacios);
			}
		}
		return $arbol;
                
       
    }
	?>