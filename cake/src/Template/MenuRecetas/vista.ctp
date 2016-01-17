<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
		<li><?= $this->Html->link(__('Platos asociados a Menús'), ['action' => 'publico']) ?> </li>
        <li><?= $this->Html->link(__('Menús'), ['controller' => 'Menus', 'action' => 'publico']) ?> </li>
        <li><?= $this->Html->link(__('Platos'), ['controller' => 'Recetas', 'action' => 'publico']) ?> </li>
    </ul>
</nav>
<div class="menuRecetas view large-9 medium-8 columns content">
    <h3><?= h($menuReceta->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Menu') ?></th>
            <td><?= $menuReceta->has('menu') ? $this->Html->link($menuReceta->menu->id, ['controller' => 'Menus', 'action' => 'vista', $menuReceta->menu->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Receta') ?></th>
            <td><?= $menuReceta->has('receta') ? $this->Html->link($menuReceta->receta->id, ['controller' => 'Recetas', 'action' => 'vista', $menuReceta->receta->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($menuReceta->id) ?></td>
        </tr>
    </table>
</div>
