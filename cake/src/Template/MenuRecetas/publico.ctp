<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Menús'), ['controller' => 'Menus', 'action' => 'publico']) ?></li>
        <li><?= $this->Html->link(__('Platos'), ['controller' => 'Recetas', 'action' => 'publico']) ?></li>
    </ul>
</nav>
<div class="menuRecetas index large-9 medium-8 columns content">
    <h3><?= __('Platos en Menús') ?></h3>
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
                <td><?= $menuReceta->has('menu') ? $this->Html->link($menuReceta->menu->id, ['controller' => 'Menus', 'action' => 'vista', $menuReceta->menu->id]) : '' ?></td>
                <td><?= $menuReceta->has('receta') ? $this->Html->link($menuReceta->receta->id, ['controller' => 'Recetas', 'action' => 'vista', $menuReceta->receta->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'vista', $menuReceta->id]) ?>
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
