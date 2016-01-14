<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Categoria'), ['action' => 'edit', $categoria->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Categoria'), ['action' => 'delete', $categoria->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoria->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Categorias'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Categoria'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="categorias view large-9 medium-8 columns content">
    <h3><?= h($categoria->id) ?></h3>
	<?php print_r($categoria);?>
    <table class="vertical-table">
        <tr>
            <th><?= __('Nombre') ?></th>
            <td><?= h($categoria->nombre) ?></td>
        </tr>
        <tr>
            <th><?= __('Parent Categoria') ?></th>
            <td><?= $categoria->has('parent_categoria') ? $this->Html->link($categoria->parent_categoria->id, ['controller' => 'Categorias', 'action' => 'view', $categoria->parent_categoria->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($categoria->id) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($categoria->descripcion)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Categorias') ?></h4>
        <?php if (!empty($categoria->child_categorias)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Nombre') ?></th>
                <th><?= __('Descripcion') ?></th>
                <th><?= __('Parent Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($categoria->child_categorias as $childCategorias): ?>
            <tr>
                <td><?= h($childCategorias->id) ?></td>
                <td><?= h($childCategorias->nombre) ?></td>
                <td><?= h($childCategorias->descripcion) ?></td>
                <td><?= h($childCategorias->parent_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Categorias', 'action' => 'view', $childCategorias->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Categorias', 'action' => 'edit', $childCategorias->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Categorias', 'action' => 'delete', $childCategorias->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childCategorias->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
