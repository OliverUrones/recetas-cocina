<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Editar Tienda'), ['action' => 'edit', $tienda->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Borrar Tienda'), ['action' => 'delete', $tienda->id], ['confirm' => __('¿Estas seguro que desea borrar # {0}?', $tienda->id)]) ?> </li>
        <li><?= $this->Html->link(__('Listar Tiendas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nueva Tienda'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Listar Ofertas'), ['controller' => 'TiendaOfertas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nueva Oferta'), ['controller' => 'TiendaOfertas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tiendas view large-9 medium-8 columns content">
    <h3><?= h($tienda->nombre) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nombre') ?></th>
            <td><?= h($tienda->nombre) ?></td>
        </tr>
        <tr>
            <th><?= __('Domicilio') ?></th>
            <td><?= h($tienda->domicilio) ?></td>
        </tr>
        <tr>
            <th><?= __('Poblacion') ?></th>
            <td><?= h($tienda->poblacion) ?></td>
        </tr>
        <tr>
            <th><?= __('Provincia') ?></th>
            <td><?= h($tienda->provincia) ?></td>
        </tr>
        <tr>
            <th><?= __('Usuario') ?></th>
            <td><?= $tienda->has('usuario') ? $this->Html->link($tienda->usuario->nombre, ['controller' => 'Usuarios', 'action' => 'view', $tienda->usuario->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($tienda->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Activa') ?></th>
            <td><?= $tienda->activa ? __('Sí') : __('No'); ?></td>
         </tr>
        <tr>
            <th><?= __('Visible') ?></th>
            <td><?= $tienda->visible ? __('Sí') : __('No'); ?></td>
         </tr>
    </table>
    <div class="related">
        <h4><?= __('Ofertas de la Tienda') ?></h4>
        <?php if (!empty($tienda->tienda_ofertas)): ?>
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
                <th class="actions"><?= __('Acciones') ?></th>
            </tr>
            <?php foreach ($tienda->tienda_ofertas as $tiendaOfertas): ?>
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
                    <?= $this->Html->link(__('Ver'), ['controller' => 'TiendaOfertas', 'action' => 'view', $tiendaOfertas->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['controller' => 'TiendaOfertas', 'action' => 'edit', $tiendaOfertas->id]) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['controller' => 'TiendaOfertas', 'action' => 'delete', $tiendaOfertas->id], ['confirm' => __('¿Estas seguro que desea borrar # {0}?', $tiendaOfertas->nombre)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
