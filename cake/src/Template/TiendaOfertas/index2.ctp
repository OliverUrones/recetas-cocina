<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Listar Tiendas'), ['controller' => 'Tiendas','action' => 'indexpublico']) ?> </li>
       </ul>
</nav>
<div class="tiendaOfertas index large-9 medium-8 columns content">
    <h3><?= __('Ofertas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                 <th><?= $this->Paginator->sort('tienda_id') ?></th>
                <th><?= $this->Paginator->sort('ingrediente_id') ?></th>
                <th><?= $this->Paginator->sort('cantidad') ?></th>
                <th><?= $this->Paginator->sort('medida') ?></th>
                <th class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tiendaOfertas as $tiendaOferta){ ?>
            <?php if ($tiendaOferta->tienda->visible== true && $tiendaOferta->tienda->activa== true ) { ?>
            <tr>
                <td><?= $tiendaOferta->has('tienda') ? $this->Html->link($tiendaOferta->tienda->nombre, ['controller' => 'Tiendas', 'action' => 'viewpublico', $tiendaOferta->tienda->id]) : '' ?></td>
                <td><?= $tiendaOferta->has('ingrediente') ? $this->Html->link($tiendaOferta->ingrediente->nombre, ['controller' => 'Ingredientes', 'action' => 'view', $tiendaOferta->ingrediente->id]) : '' ?></td>
                <td><?= $this->Number->format($tiendaOferta->cantidad) ?></td>
                <td><?= h($tiendaOferta->medida) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view2', $tiendaOferta->id]) ?>
                 </td>
            </tr>
            <?php }} ?>
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
