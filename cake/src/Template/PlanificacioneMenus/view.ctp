<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Editar Planificación'), ['action' => 'edit', $planificacioneMenu->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Borrar Planificación'), ['action' => 'delete', $planificacioneMenu->id], ['confirm' => __('¿Está seguro de que quiere eliminar # {0}?', $planificacioneMenu->id)]) ?> </li>
        <li><?= $this->Html->link(__('Planificaciones con Menús'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Añadir Menús a Planificaciones'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Planificaciones'), ['controller' => 'Planificaciones', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nueva Planificación'), ['controller' => 'Planificaciones', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Menús'), ['controller' => 'Menus', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nuevo Menú'), ['controller' => 'Menus', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="planificacioneMenus view large-9 medium-8 columns content">
    <h3><?= h($planificacioneMenu->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Planificación') ?></th>
            <td><?= $planificacioneMenu->has('planificacione') ? $this->Html->link($planificacioneMenu->planificacione->id, ['controller' => 'Planificaciones', 'action' => 'view', $planificacioneMenu->planificacione->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Menú') ?></th>
            <td><?= $planificacioneMenu->has('menu') ? $this->Html->link($planificacioneMenu->menu->id, ['controller' => 'Menus', 'action' => 'view', $planificacioneMenu->menu->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($planificacioneMenu->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Día') ?></th>
			<?php $dias= array("lunes","martes","miercoles","jueves","viernes","sabado","domingo")?>
            <td><?=$dias[$planificacioneMenu->numero_dia] ?></td>
        </tr>
    </table>
</div>
