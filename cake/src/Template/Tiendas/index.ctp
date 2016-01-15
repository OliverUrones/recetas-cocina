<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Nueva Tienda'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Listar Ofertas'), ['controller' => 'TiendaOfertas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nueva Oferta'), ['controller' => 'TiendaOfertas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tiendas index large-9 medium-8 columns content">
    <h3><?= __('Tiendas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('nombre') ?></th>
                <th><?= $this->Paginator->sort('domicilio') ?></th>
                <th><?= $this->Paginator->sort('poblacion') ?></th>
                <th><?= $this->Paginator->sort('provincia') ?></th>
                <th><?= $this->Paginator->sort('usuario_id') ?></th>
                <th><?= $this->Paginator->sort('activa') ?></th>
                <th class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tiendas as $tienda): ?>
            <tr>
                <td><?= $this->Number->format($tienda->id) ?></td>
                <td><?= h($tienda->nombre) ?></td>
                <td><?= h($tienda->domicilio) ?></td>
                <td><?= h($tienda->poblacion) ?></td>
                <td><?= h($tienda->provincia) ?></td>
                <td><?= $tienda->has('usuario') ? $this->Html->link($tienda->usuario->id, ['controller' => 'Usuarios', 'action' => 'view', $tienda->usuario->id]) : '' ?></td>
                <td><?= $tienda->activa ? __('Sí') : __('No'); ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $tienda->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $tienda->id]) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $tienda->id], ['confirm' => __('¿Estas seguro que desea borrar # {0}?', $tienda->nombre)]) ?>
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
