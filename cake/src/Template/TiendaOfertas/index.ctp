<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Nueva Oferta'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Listar Tiendas'), ['controller' => 'Tiendas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Listar Ingredientes'), ['controller' => 'Ingredientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nuevo Ingrediente'), ['controller' => 'Ingredientes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tiendaOfertas index large-9 medium-8 columns content">
    <h3><?= __('Ofertas') ?></h3>
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
            <?php foreach ($tiendaOfertas as $tiendaOferta): ?>
            <tr>
                <td><?= $this->Number->format($tiendaOferta->id) ?></td>
                <td><?= $tiendaOferta->has('tienda') ? $this->Html->link($tiendaOferta->tienda->nombre, ['controller' => 'Tiendas', 'action' => 'view', $tiendaOferta->tienda->id]) : '' ?></td>
                <td><?= $tiendaOferta->has('ingrediente') ? $this->Html->link($tiendaOferta->ingrediente->id, ['controller' => 'Ingredientes', 'action' => 'view', $tiendaOferta->ingrediente->id]) : '' ?></td>
                <td><?= $this->Number->format($tiendaOferta->cantidad) ?></td>
                <td><?= h($tiendaOferta->medida) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $tiendaOferta->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $tiendaOferta->id]) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $tiendaOferta->id], ['confirm' => __('¿Estas seguro que desea borrar la oferta # {0}?', $tiendaOferta->id)]) ?>
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
