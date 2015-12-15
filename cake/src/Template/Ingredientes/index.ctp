<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ingrediente'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tienda Ofertas'), ['controller' => 'TiendaOfertas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tienda Oferta'), ['controller' => 'TiendaOfertas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="ingredientes index large-9 medium-8 columns content">
    <h3><?= __('Ingredientes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('nombre') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ingredientes as $ingrediente): ?>
            <tr>
                <td><?= $this->Number->format($ingrediente->id) ?></td>
                <td><?= h($ingrediente->nombre) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $ingrediente->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ingrediente->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ingrediente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ingrediente->id)]) ?>
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
