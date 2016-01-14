<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Editar Ingrediente'), ['action' => 'edit', $ingrediente->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Borrar Ingrediente'), ['action' => 'delete', $ingrediente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ingrediente->id)]) ?> </li>
        <li><?= $this->Html->link(__('Listar Ingredientes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Crear Ingrediente'), ['action' => 'add']) ?> </li>
        <!--	<li><?//= $this->Html->link(__('List Tienda Ofertas'), ['controller' => 'TiendaOfertas', 'action' => 'index']) ?> </li>		-->
        <!--	<li><?//= $this->Html->link(__('New Tienda Oferta'), ['controller' => 'TiendaOfertas', 'action' => 'add']) ?> </li>		-->
    </ul>
</nav>
<div class="ingredientes view large-9 medium-8 columns content">
    <h3><?= h($ingrediente->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nombre') ?></th>
            <td><?= h($ingrediente->nombre) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($ingrediente->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($ingrediente->descripcion)); ?>
    </div>
    <div class="row">
        <h4><?= __('Datos Nutricion') ?></h4>
        <?= $this->Text->autoParagraph(h($ingrediente->datos_nutricion)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Tienda Ofertas') ?></h4>
        <?php if (!empty($ingrediente->tienda_ofertas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Tienda Id') ?></th>
                <th><?= __('Ingrediente Id') ?></th>
                <th><?= __('Descripcion') ?></th>
                <th><?= __('Envase') ?></th>
                <th><?= __('Cantidad') ?></th>
                <th><?= __('Medida') ?></th>
                <th><?= __('Notas') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($ingrediente->tienda_ofertas as $tiendaOfertas): ?>
            <tr>
                <td><?= h($tiendaOfertas->id) ?></td>
                <td><?= h($tiendaOfertas->tienda_id) ?></td>
                <td><?= h($tiendaOfertas->ingrediente_id) ?></td>
                <td><?= h($tiendaOfertas->descripcion) ?></td>
                <td><?= h($tiendaOfertas->envase) ?></td>
                <td><?= h($tiendaOfertas->cantidad) ?></td>
                <td><?= h($tiendaOfertas->medida) ?></td>
                <td><?= h($tiendaOfertas->notas) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'TiendaOfertas', 'action' => 'view', $tiendaOfertas->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'TiendaOfertas', 'action' => 'edit', $tiendaOfertas->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'TiendaOfertas', 'action' => 'delete', $tiendaOfertas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tiendaOfertas->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
