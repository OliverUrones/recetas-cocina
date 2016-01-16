<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Editar Plato asociado a un Menú'), ['action' => 'edit', $menuReceta->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Eliminar Plato de Menú'), ['action' => 'delete', $menuReceta->id], ['confirm' => __('¿Está seguro de que quiere eliminar # {0}?', $menuReceta->id)]) ?> </li>
        <li><?= $this->Html->link(__('Platos asociados a Menús'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Incluir Plato en un Menú'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Menús'), ['controller' => 'Menus', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nuevo Menú'), ['controller' => 'Menus', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Platos'), ['controller' => 'Recetas', 'action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="menuRecetas view large-9 medium-8 columns content">
    <h3><?= h($menuReceta->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Menu') ?></th>
            <td><?= $menuReceta->has('menu') ? $this->Html->link($menuReceta->menu->id, ['controller' => 'Menus', 'action' => 'view', $menuReceta->menu->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Receta') ?></th>
            <td><?= $menuReceta->has('receta') ? $this->Html->link($menuReceta->receta->id, ['controller' => 'Recetas', 'action' => 'view', $menuReceta->receta->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($menuReceta->id) ?></td>
        </tr>
    </table>
</div>
