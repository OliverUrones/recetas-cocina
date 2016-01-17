<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Nueva Planificación'), ['action' => 'add']) ?></li>
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
                <td><?= $planificacione->has('usuario') ? $this->Html->link($planificacione->usuario->id, ['controller' => 'Usuarios', 'action' => 'view', $planificacione->usuario->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $planificacione->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $planificacione->id]) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $planificacione->id], ['confirm' => __('¿Está seguro de que desea eliminar # {0}?', $planificacione->id)]) ?>
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
