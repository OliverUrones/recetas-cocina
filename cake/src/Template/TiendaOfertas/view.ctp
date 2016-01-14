<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Editar Oferta'), ['action' => 'edit', $tiendaOferta->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Borrar Oferta'), ['action' => 'delete', $tiendaOferta->id], ['confirm' => __('¿Estas seguro que desea borrar la oferta de {0} de {1}?',$tiendaOferta->ingrediente->nombre,$tiendaOferta->tienda->nombre)]) ?> </li>
        <li><?= $this->Html->link(__('Listar Ofertas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nueva Oferta'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Listar Ingredientes'), ['controller' => 'Ingredientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nuevo Ingrediente'), ['controller' => 'Ingredientes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tiendaOfertas view large-9 medium-8 columns content">
    <h3>Oferta de <?= h($tiendaOferta->ingrediente->nombre) ?> de <?= h($tiendaOferta->tienda->nombre) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Tienda') ?></th>
            <td><?= $tiendaOferta->has('tienda') ? $this->Html->link($tiendaOferta->tienda->nombre, ['controller' => 'Tiendas', 'action' => 'view', $tiendaOferta->tienda->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Ingrediente') ?></th>
            <td><?= $tiendaOferta->has('ingrediente') ? $this->Html->link($tiendaOferta->ingrediente->nombre, ['controller' => 'Ingredientes', 'action' => 'view', $tiendaOferta->ingrediente->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Medida') ?></th>
            <td><?= h($tiendaOferta->medida) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($tiendaOferta->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Cantidad') ?></th>
            <td><?= $this->Number->format($tiendaOferta->cantidad) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($tiendaOferta->descripcion)); ?>
    </div>
    <div class="row">
        <h4><?= __('Envase') ?></h4>
        <?= $this->Text->autoParagraph(h($tiendaOferta->envase)); ?>
    </div>
    <div class="row">
        <h4><?= __('Notas') ?></h4>
        <?= $this->Text->autoParagraph(h($tiendaOferta->notas)); ?>
    </div>
</div>
