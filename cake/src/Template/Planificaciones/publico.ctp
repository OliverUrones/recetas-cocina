<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
		<li><?= $this->Html->link(__('Platos asociados a menús'), ['controller' => 'MenuRecetas', 'action' => 'publico']) ?></li>
		<li><?= $this->Html->link(__('Planificaciones de menús'), ['controller' => 'PlanificacioneMenus', 'action' => 'publico']) ?></li>
    </ul>
</nav>
<div class="planificaciones index large-9 medium-8 columns content">
    <h3><?= __('Planificaciones') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('nombre') ?></th>
                <th><?= $this->Paginator->sort('periodo') ?></th>
                <th><?= $this->Paginator->sort('usuario_id') ?></th>
                <th class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($planificaciones as $planificacione): ?>
            <tr>
                <td><?= $this->Number->format($planificacione->id) ?></td>
                <td><?= h($planificacione->nombre) ?></td>
                <td><?= h($planificacione->periodo) ?></td>
                <td><?= $planificacione->has('usuario') ? $this->Html->link($planificacione->usuario->id, ['controller' => 'Usuarios', 'action' => 'vista', $planificacione->usuario->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'vista', $planificacione->id]) ?>
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
