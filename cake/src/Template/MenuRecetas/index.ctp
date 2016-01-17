<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Incluir Plato en un Menú'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Menús'), ['controller' => 'Menus', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nuevo Menú'), ['controller' => 'Menus', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Platos'), ['controller' => 'Recetas', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="menuRecetas index large-9 medium-8 columns content">
    <h3><?= __('Platos en Menú') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('menu_id') ?></th>
                <th><?= $this->Paginator->sort('receta_id') ?></th>
                <th class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($menuRecetas as $menuReceta): ?>
            <tr>
                <td><?= $this->Number->format($menuReceta->id) ?></td>
                <td><?= $menuReceta->has('menu') ? $this->Html->link($menuReceta->menu->id, ['controller' => 'Menus', 'action' => 'view', $menuReceta->menu->id]) : '' ?></td>
                <td><?= $menuReceta->has('receta') ? $this->Html->link($menuReceta->receta->id, ['controller' => 'Recetas', 'action' => 'view', $menuReceta->receta->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $menuReceta->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $menuReceta->id]) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $menuReceta->id], ['confirm' => __('¿Está seguro de que quiere eliminar # {0}?', $menuReceta->id)]) ?>
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
