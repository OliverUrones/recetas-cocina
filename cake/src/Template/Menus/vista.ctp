<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Menús'), ['action' => 'publico']) ?> </li>
        <li><?= $this->Html->link(__('Platos asociados a Menús'), ['controller' => 'menuRecetas', 'action' => 'publico']) ?> </li>
    </ul>
</nav>
<div class="menus view large-9 medium-8 columns content">
    <h3><?= h($menu->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Usuario') ?></th>
            <td><?= $menu->has('usuario') ? $this->Html->link($menu->usuario->id, ['controller' => 'Usuarios', 'action' => 'vista', $menu->usuario->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($menu->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Título') ?></h4>
        <?= $this->Text->autoParagraph(h($menu->titulo)); ?>
    </div>
    <div class="row">
        <h4><?= __('Descripción') ?></h4>
        <?= $this->Text->autoParagraph(h($menu->descripcion)); ?>
    </div>
    <div class="related">
        <h4><?= __('Platos incluidos en el menú') ?></h4>
        <?php if (!empty($menu->menu_recetas)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Menu Id') ?></th>
                <th><?= __('Receta Id') ?></th>
                <th class="actions"><?= __('Acciones') ?></th>
            </tr>
            <?php foreach ($menu->menu_recetas as $menuRecetas): ?>
            <tr>
                <td><?= h($menuRecetas->menu_id) ?></td>
                <td><?= h($menuRecetas->receta_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['controller' => 'menuRecetas', 'action' => 'vista', $menuRecetas->menu_id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
