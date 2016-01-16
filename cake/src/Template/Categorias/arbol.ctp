
<div class="categorias left index large-7">
 <h3 align="center"><?= __('ARBOL DE CATEGORIAS') ?></h3>
 <table>	
<?php

	foreach($arbol as $v){
		echo "<tr><td><h5>".$v."</td></h3>";	
		$param=substr($v,strpos($v,"-")+1);
		echo "<td>".$this->Html->link(__(' Ver recetas de esta categoria'), ['controller'=>'receta_categorias', 'action' => 'filtrado', 'categoria'=>$param])."</td></tr>";
	}
	
	
	?>
	
 
   
</div>
