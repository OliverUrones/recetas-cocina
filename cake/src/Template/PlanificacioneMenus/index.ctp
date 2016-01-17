<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Añadir Menú a Planificación'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Planificaciones'), ['controller' => 'Planificaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nueva Planificación'), ['controller' => 'Planificaciones', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Menús'), ['controller' => 'Menus', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nuevo Menú'), ['controller' => 'Menus', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="planificacioneMenus index large-9 medium-8 columns content">
    <h3><?= __('Planificaciones de Menús') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('planificacion') ?></th>
                <th><?= $this->Paginator->sort('menu') ?></th>
                <th><?= $this->Paginator->sort('Dia') ?></th>
                <th class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php  $dias=array("lunes","martes","miercoles","jueves","viernes","sabado","domingo");
			foreach ($planificacioneMenus as $planificacioneMenu): ?>
            <tr>
                <td><?= $this->Number->format($planificacioneMenu->id) ?></td>
                <td><?= $planificacioneMenu->has('planificacione') ? $planificacioneMenu->planificacione->nombre : '' ?></td>
                <td><?= $planificacioneMenu->has('menu') ? $planificacioneMenu->menu->titulo: '' ?></td>
                <td><?= $dias[$planificacioneMenu->numero_dia] ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $planificacioneMenu->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $planificacioneMenu->id]) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $planificacioneMenu->id], ['confirm' => __('¿Está seguro de que quiere eliminar # {0}?', $planificacioneMenu->id)]) ?>
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
