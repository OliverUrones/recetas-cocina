
<div class="categorias index large-4 medium-8 columns content">
 <h3><?= __('Categorias') ?></h3>
 <table>	
<?php

	foreach($arbol as $v){
		echo "<tr><td><h5>".$v."</td></h3>";	
		$param=substr($v,strpos($v,"-")+1);
		echo "<td>".$this->Html->link(__(' Ver recetas de esta categoria'), ['controller'=>'receta_categorias', 'action' => 'filtrado', 'categoria'=>$param])."</td></tr>";
	}
	
	
	?>
	
 
   
</div>
