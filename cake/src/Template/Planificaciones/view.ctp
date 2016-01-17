<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Editar Planificaciones'), ['action' => 'edit', $planificacione->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Borrar Planificaciones'), ['action' => 'delete', $planificacione->id], ['confirm' => __('¿Está seguro de que quiere eliminar # {0}?', $planificacione->id)]) ?> </li>
        <li><?= $this->Html->link(__('Listar Planificaciones'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nueva Planificación'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="planificaciones view large-9 medium-8 columns content">
    <h3><?= h($planificacione->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nombre') ?></th>
            <td><?= h($planificacione->nombre) ?></td>
        </tr>
        <tr>
            <th><?= __('Periodo') ?></th>
            <td><?= h($planificacione->periodo) ?></td>
        </tr>
        <tr>
            <th><?= __('Usuario') ?></th>
            <td><?= $planificacione->has('usuario') ? $this->Html->link($planificacione->usuario->id, ['controller' => 'Usuarios', 'action' => 'view', $planificacione->usuario->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($planificacione->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Notas') ?></h4>
        <?= $this->Text->autoParagraph(h($planificacione->notas)); ?>
    </div>
</div>
