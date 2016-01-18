<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Añadir Ingrediente a Receta'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Ver Recetas'), ['controller' => 'Recetas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Crear Receta'), ['controller' => 'Recetas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Ver Ingredientes'), ['controller' => 'Ingredientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Crear Ingrediente'), ['controller' => 'Ingredientes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recetaIngredientes index large-9 medium-8 columns content">
    <h3><?= __('Listado de Ingredientes en Recetas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('receta_id') ?></th>
                <th><?= $this->Paginator->sort('ingrediente_id') ?></th>
                <th><?= $this->Paginator->sort('cantidad') ?></th>
                <th><?= $this->Paginator->sort('medida') ?></th>
                <th class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recetaIngredientes as $recetaIngrediente): ?>
            <tr>
                <td><?= $this->Number->format($recetaIngrediente->id) ?></td>
                <td><?= $recetaIngrediente->has('receta') ? $this->Html->link($recetaIngrediente->receta->id, ['controller' => 'Recetas', 'action' => 'view', $recetaIngrediente->receta->id]) : '' ?></td>
                <td><?= $recetaIngrediente->has('ingrediente') ? $this->Html->link($recetaIngrediente->ingrediente->id, ['controller' => 'Ingredientes', 'action' => 'view', $recetaIngrediente->ingrediente->id]) : '' ?></td>
                <td><?= $this->Number->format($recetaIngrediente->cantidad) ?></td>
                <td><?= h($recetaIngrediente->medida) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $recetaIngrediente->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $recetaIngrediente->id]) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $recetaIngrediente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recetaIngrediente->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Siguiente') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
