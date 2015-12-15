<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Menu'), ['action' => 'edit', $menu->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Menu'), ['action' => 'delete', $menu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menu->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Menus'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menu'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Menu Platos'), ['controller' => 'MenuPlatos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menu Plato'), ['controller' => 'MenuPlatos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="menus view large-9 medium-8 columns content">
    <h3><?= h($menu->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Usuario') ?></th>
            <td><?= $menu->has('usuario') ? $this->Html->link($menu->usuario->id, ['controller' => 'Usuarios', 'action' => 'view', $menu->usuario->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($menu->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Titulo') ?></h4>
        <?= $this->Text->autoParagraph(h($menu->titulo)); ?>
    </div>
    <div class="row">
        <h4><?= __('Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($menu->descripcion)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Menu Platos') ?></h4>
        <?php if (!empty($menu->menu_platos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Menu Id') ?></th>
                <th><?= __('Receta Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($menu->menu_platos as $menuPlatos): ?>
            <tr>
                <td><?= h($menuPlatos->menu_id) ?></td>
                <td><?= h($menuPlatos->receta_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MenuPlatos', 'action' => 'view', $menuPlatos->menu_id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'MenuPlatos', 'action' => 'edit', $menuPlatos->menu_id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MenuPlatos', 'action' => 'delete', $menuPlatos->menu_id], ['confirm' => __('Are you sure you want to delete # {0}?', $menuPlatos->menu_id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
