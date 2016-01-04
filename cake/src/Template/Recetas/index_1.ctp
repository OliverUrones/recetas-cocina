<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Receta'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Menu Platos'), ['controller' => 'MenuPlatos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Menu Plato'), ['controller' => 'MenuPlatos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Receta Categorias'), ['controller' => 'RecetaCategorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Receta Categoria'), ['controller' => 'RecetaCategorias', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Receta Comentarios'), ['controller' => 'RecetaComentarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Receta Comentario'), ['controller' => 'RecetaComentarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Receta Ingredientes'), ['controller' => 'RecetaIngredientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Receta Ingrediente'), ['controller' => 'RecetaIngredientes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Receta Pasos'), ['controller' => 'RecetaPasos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Receta Paso'), ['controller' => 'RecetaPasos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recetas index large-9 medium-8 columns content">
    <h3><?= __('Recetas') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('tipo_plato') ?></th>
                <th><?= $this->Paginator->sort('dificultad') ?></th>
                <th><?= $this->Paginator->sort('comensales') ?></th>
                <th><?= $this->Paginator->sort('tiempo_elaboracion') ?></th>
                <th><?= $this->Paginator->sort('valoracion') ?></th>
                <th><?= $this->Paginator->sort('usuario_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recetas as $receta): ?>
            <tr>
                <td><?= $this->Number->format($receta->id) ?></td>
                <td><?= h($receta->tipo_plato) ?></td>
                <td><?= h($receta->dificultad) ?></td>
                <td><?= h($receta->comensales) ?></td>
                <td><?= $this->Number->format($receta->tiempo_elaboracion) ?></td>
                <td><?= h($receta->valoracion) ?></td>
                <td><?= $receta->has('usuario') ? $this->Html->link($receta->usuario->id, ['controller' => 'Usuarios', 'action' => 'view', $receta->usuario->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $receta->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $receta->id]) ?>
					<?= $this->Html->link(__('Pasos'), ['controller'=>'RecetaPasos','action' => 'index', $receta->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $receta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $receta->id)]) ?>
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
