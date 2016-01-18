<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Listar Ofertas'), ['action' => 'index2']) ?> </li>
       </ul>
</nav>
<div class="tiendaOfertas view large-9 medium-8 columns content">
    <h3>Oferta de <?= h($tiendaOferta->ingrediente->nombre) ?> de <?= h($tiendaOferta->tienda->nombre) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Tienda') ?></th>
            <td><?= $tiendaOferta->has('tienda') ? $this->Html->link($tiendaOferta->tienda->nombre, ['controller' => 'Tiendas', 'action' => 'viewpublico', $tiendaOferta->tienda->id]) : '' ?></td>
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
        <h4><?= __('Descripcion de la oferta') ?></h4>
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
