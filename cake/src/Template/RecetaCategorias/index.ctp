<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Receta Categoria'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Recetas'), ['controller' => 'Recetas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Receta'), ['controller' => 'Recetas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recetaCategorias index large-9 medium-8 columns content">
    <h3><?= __('Receta Categorias') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('receta_id') ?></th>
                <th><?= $this->Paginator->sort('categoria_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recetaCategorias as $recetaCategoria): ?>
            <tr>
                <td><?= $this->Number->format($recetaCategoria->id) ?></td>
                <td><?= $recetaCategoria->has('receta') ? $this->Html->link($recetaCategoria->receta->id, ['controller' => 'Recetas', 'action' => 'view', $recetaCategoria->receta->id]) : '' ?></td>
                <td><?= $recetaCategoria->has('categoria') ? $this->Html->link($recetaCategoria->categoria->id, ['controller' => 'Categorias', 'action' => 'view', $recetaCategoria->categoria->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $recetaCategoria->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $recetaCategoria->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $recetaCategoria->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recetaCategoria->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
