<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Receta Comentario'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Recetas'), ['controller' => 'Recetas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Receta'), ['controller' => 'Recetas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recetaComentarios index large-9 medium-8 columns content">
    <h3><?= __('Receta Comentarios') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('receta_id') ?></th>
                <th><?= $this->Paginator->sort('usuario_id') ?></th>
                <th><?= $this->Paginator->sort('fechahora') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recetaComentarios as $recetaComentario): ?>
            <tr>
                <td><?= $this->Number->format($recetaComentario->id) ?></td>
                <td><?= $recetaComentario->has('receta') ? $this->Html->link($recetaComentario->receta->id, ['controller' => 'Recetas', 'action' => 'view', $recetaComentario->receta->id]) : '' ?></td>
                <td><?= $recetaComentario->has('usuario') ? $this->Html->link($recetaComentario->usuario->id, ['controller' => 'Usuarios', 'action' => 'view', $recetaComentario->usuario->id]) : '' ?></td>
                <td><?= h($recetaComentario->fechahora) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $recetaComentario->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $recetaComentario->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $recetaComentario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recetaComentario->id)]) ?>
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
