<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?//= __('Acciones') ?></li>
        <!-- <li><?//= $this->Html->link(__('Nueva Receta'), ['action' => 'add']) ?></li> -->
        </ul>
</nav>
<div class="recetas index large-9 medium-8 columns content">
    <h3><?= __('Busqueda Avanzada') ?></h3>
    <!-- *****************<?//= $this->Form->create($busqueda) ?> -->
	<?php //echo $this->Form->create() ?>
	<?php echo $this->Form->create( null,['url' => ['controller' => 'Recetas', 'action' => 'busquedaver'] ]) ?>
	<fieldset>
        <legend>Introduzca los datos de la receta a buscar</legend>
        <?php
			
			
			//*********ESTO ES PARA LAS RECETAS********************
			
			//nombre de la receta
            echo $this->Form->input('nombre',  ['required' => false]);
			
			//Tippo de plato
            echo $this->Form->input('tipo_plato', ['type' => 'select', 'options'=>\App\model\Entity\Receta::tipo_plato(),'empty'=>'Tipo_Plato']);
           //echo $this->Form->input('tipo_plato', ['type' => 'select', 'options'=>\App\model\Entity\Receta::tipo_plato(),'empty'=>false]);
			
			//Dificultad
            echo $this->Form->input('dificultad', ['type' => 'select', 'options'=>\App\model\Entity\Receta::dificultad(),'empty'=>'Dificultad']);
            //echo $this->Form->input('dificultad', ['type' => 'select', 'options'=>\App\model\Entity\Receta::dificultad(),'empty'=>false]);
             //echo $this->Form->input('dificultad', ['type' => 'select', 'options' => [1,2,3,4,5], 'empty' => 'Dificultad']);
			
			//Comensales
           echo $this->Form->input('comensales', ['type' => 'select', 'options'=>\App\model\Entity\Receta::comensales(),'empty'=>'Comensales']);
            //echo $this->Form->input('comensales', ['type' => 'select', 'options'=>\App\model\Entity\Receta::comensales(),'empty'=>false]);
             //echo $this->Form->input('comensales', ['options' => [1,2,4,6,8], 'empty' => 'Comensales']);
			
			//Tiempo de elaboracion
            echo $this->Form->input('tiempo_elaboracion', ['type' => 'number']);
			
			//Valoracion
            echo $this->Form->input('valoracion', ['type' => 'select', 'options'=>\App\model\Entity\Receta::valoracion(),'empty'=>'Valoracion']);
            //echo $this->Form->input('valoracion', ['type' => 'select', 'options'=>\App\model\Entity\Receta::valoracion(),'empty'=>false]);
			
			
        ?>
        <?= $this->Form->button(__('BUSCAR')) ?>
        <?= $this->Form->end() ?>
    </fieldset>
	
		<?php echo $this->Form->create( null,['url' => ['controller' => 'Recetas', 'action' => 'busquedafiltros'] ]) ?>
	<fieldset>
        <legend>Seleccione el campo por el que ordenar las recetas</legend>
        <?php
			
			
			//*********ESTO ES PARA LAS RECETAS********************
			
			//Campo por el que realizar el filtrado
            //echo $this->Form->input('campo', ['type' => 'select', 'options'=>\App\model\Entity\Receta::tipo_plato(),'empty'=>'campo']);
            echo $this->Form->input('campo', ['required' => true, 'type' => 'select', 'options' => ['nombre'=>'nombre', 'valoracion' =>'valoracion', 'comensales'=>'comensales', 'dificultad'=>'dificultad'], 'empty' => 'Campo']);
			
			//Forma de verlo (Ascendente o descendente)
            //echo $this->Form->input('forma', ['type' => 'select', 'options'=>\App\model\Entity\Receta::tipo_plato(),'empty'=>'ASC']);
            echo $this->Form->input('forma', ['required' => true, 'type' => 'select', 'options' => ['ASC'=>'ASC','DESC'=>'DESC'], 'empty' => 'Forma']);
			
        ?>
        <?= $this->Form->button(__('FILTRAR')) ?>
        <?= $this->Form->end() ?>
    </fieldset>
		
		
	
	
</div>
