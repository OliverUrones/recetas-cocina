<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Editar Categoria'), ['action' => 'edit', $categoria->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Borrar Categoria'), ['action' => 'delete', $categoria->id], ['confirm' => __('¿deseas borrar # {0}?', $categoria->nombre)]) ?> </li>
        <li><?= $this->Html->link(__('Listar Categorias'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nueva Categoria'), ['action' => 'add']) ?> </li>

    </ul>
</nav>
<div class="categorias view large-9 medium-8 columns content">
    <h3><?= h($categoria->nombre) ?></h3>
<!-- <?php print_r($categoria);?> --> 
    <table class="vertical-table">
        <tr>
            <th><?= __('Nombre') ?></th>
            <td><?= h($categoria->nombre) ?></td>
        </tr>
        <tr>
            <th><?= __('Categoria padre') ?></th>
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
        <h4><?= __('Categorias hijas') ?></h4>
        <?php if (!empty($categoria->child_categorias)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Nombre') ?></th>
                <th><?= __('Descriccion') ?></th>
                <th><?= __('Categoria Padre ') ?></th>
                <th class="actions"><?= __('Acciones') ?></th>
            </tr>
            <?php foreach ($categoria->child_categorias as $childCategorias): ?>
            <tr>
                <td><?= h($childCategorias->id) ?></td>
                <td><?= h($childCategorias->nombre) ?></td>
                <td><?= h($childCategorias->descripcion) ?></td>
                <td><?= h($childCategorias->parent_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('ver'), ['controller' => 'Categorias', 'action' => 'view', $childCategorias->id]) ?>
                    <?= $this->Html->link(__('editar'), ['controller' => 'Categorias', 'action' => 'edit', $childCategorias->id]) ?>
                    <?= $this->Form->postLink(__('borrar'), ['controller' => 'Categorias', 'action' => 'delete', $childCategorias->id], ['confirm' => __('¿deseas borrar # {0}?', $childCategorias->nombre)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
