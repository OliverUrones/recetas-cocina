<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Crear Ingrediente'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Ver Ingredientes'), ['action' => 'index']) ?></li>
        <!--	<li><?//= $this->Html->link(__('List Tienda Ofertas'), ['controller' => 'TiendaOfertas', 'action' => 'index']) ?></li>		-->
        <!--	<li><?//= $this->Html->link(__('New Tienda Oferta'), ['controller' => 'TiendaOfertas', 'action' => 'add']) ?></li>		-->
    </ul>
</nav>
<div class="ingredientes index large-9 medium-8 columns content">
    <h3><?= __('Ingredientes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('nombre') ?></th>
                <th class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ingredientes as $ingrediente): ?>
            <tr>
                <td><?= $this->Number->format($ingrediente->id) ?></td>
                <td><?= h($ingrediente->nombre) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $ingrediente->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $ingrediente->id]) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $ingrediente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ingrediente->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
