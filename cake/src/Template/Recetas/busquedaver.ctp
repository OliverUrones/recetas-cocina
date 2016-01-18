<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?//= __('Acciones') ?></li>
       <!-- <li><?//= $this->Html->link(__('Nueva Receta'), ['action' => 'add']) ?></li> -->
        </ul>
</nav>
<div class="recetas index large-9 medium-8 columns content">
    <h3><?= __('Resultados Busqueda Avanzada') ?></h3>
    <!-- *****************<?//= $this->Form->create($busqueda) ?> -->
	<?= "Esto es una prueba para ver si llega el formulario";?>
	 <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('nombre') ?></th>
                <th><?= $this->Paginator->sort('tipo_plato') ?></th>
                <th><?= $this->Paginator->sort('descripcion') ?></th>
                <th><?= $this->Paginator->sort('dificultad') ?></th>
                <th><?= $this->Paginator->sort('comensales') ?></th>
                <th><?= $this->Paginator->sort('tiempo_elaboracion') ?></th>
                <th><?= $this->Paginator->sort('valoracion') ?></th>
                <!-- <th><?//= $this->Paginator->sort('usuario_id') ?></th> 
                <th class="actions"><?= __('Acciones') ?></th>-->
            
            </tr>
        </thead>
        <tbody>
		
            <?php foreach ($recetas as $receta): ?>
            <tr>

                <td><?= h($receta->nombre) ?></td>
                <td><?= h($receta->mostrarTipo_plato($receta->tipo_plato)) ?></td>
                <td><?= h($receta->descripcion) ?></td>
                <td><?= h($receta->dificultad) ?></td>
                <td><?= h($receta->comensales) ?></td>
                <td><?= $this->Number->format($receta->tiempo_elaboracion) ?></td>
                <td><?= h($receta->valoracion) ?></td>
                <!-- <td><?= $receta->has('usuario') ? $this->Html->link($receta->usuario->nombre, ['controller' => 'Usuarios', 'action' => 'view', $receta->usuario->id]) : '' ?></td> -->
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['controller'=>'Recetas','action' => 'fichadetallada', $receta->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
     <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div> 
	
</div>
