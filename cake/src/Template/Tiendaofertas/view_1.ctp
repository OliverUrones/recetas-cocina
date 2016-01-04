<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tiendaoferta'), ['action' => 'edit', $tiendaoferta->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tiendaoferta'), ['action' => 'delete', $tiendaoferta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tiendaoferta->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tiendaofertas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tiendaoferta'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tiendas'), ['controller' => 'Tiendas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tienda'), ['controller' => 'Tiendas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ingredientes'), ['controller' => 'Ingredientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ingrediente'), ['controller' => 'Ingredientes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tiendaofertas view large-9 medium-8 columns content">
    <h3><?= h($tiendaoferta->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Tienda') ?></th>
            <td><?= $tiendaoferta->has('tienda') ? $this->Html->link($tiendaoferta->tienda->id, ['controller' => 'Tiendas', 'action' => 'view', $tiendaoferta->tienda->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Ingrediente') ?></th>
            <td><?= $tiendaoferta->has('ingrediente') ? $this->Html->link($tiendaoferta->ingrediente->id, ['controller' => 'Ingredientes', 'action' => 'view', $tiendaoferta->ingrediente->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Medida') ?></th>
            <td><?= h($tiendaoferta->medida) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($tiendaoferta->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Cantidad') ?></th>
            <td><?= $this->Number->format($tiendaoferta->cantidad) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($tiendaoferta->descripcion)); ?>
    </div>
    <div class="row">
        <h4><?= __('Envase') ?></h4>
        <?= $this->Text->autoParagraph(h($tiendaoferta->envase)); ?>
    </div>
    <div class="row">
        <h4><?= __('Notas') ?></h4>
        <?= $this->Text->autoParagraph(h($tiendaoferta->notas)); ?>
    </div>
</div>
