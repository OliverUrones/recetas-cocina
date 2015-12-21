<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Tiendaoferta'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tiendas'), ['controller' => 'Tiendas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tienda'), ['controller' => 'Tiendas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ingredientes'), ['controller' => 'Ingredientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ingrediente'), ['controller' => 'Ingredientes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tiendaofertas index large-9 medium-8 columns content">
    <h3><?= __('Tiendaofertas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('tienda_id') ?></th>
                <th><?= $this->Paginator->sort('ingrediente_id') ?></th>
                <th><?= $this->Paginator->sort('cantidad') ?></th>
                <th><?= $this->Paginator->sort('medida') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tiendaofertas as $tiendaoferta): ?>
            <tr>
                <td><?= $this->Number->format($tiendaoferta->id) ?></td>
                <td><?= $tiendaoferta->has('tienda') ? $this->Html->link($tiendaoferta->tienda->id, ['controller' => 'Tiendas', 'action' => 'view', $tiendaoferta->tienda->id]) : '' ?></td>
                <td><?= $tiendaoferta->has('ingrediente') ? $this->Html->link($tiendaoferta->ingrediente->id, ['controller' => 'Ingredientes', 'action' => 'view', $tiendaoferta->ingrediente->id]) : '' ?></td>
                <td><?= $this->Number->format($tiendaoferta->cantidad) ?></td>
                <td><?= h($tiendaoferta->medida) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $tiendaoferta->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $tiendaoferta->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $tiendaoferta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tiendaoferta->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
