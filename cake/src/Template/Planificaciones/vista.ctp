<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
<li><?= $this->Html->link(__('Planificaciones'), ['action' => 'publico']) ?> </li>
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
            <td><?= $planificacione->has('usuario') ? $this->Html->link($planificacione->usuario->id, ['controller' => 'Usuarios', 'action' => 'vista', $planificacione->usuario->id]) : '' ?></td>
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
