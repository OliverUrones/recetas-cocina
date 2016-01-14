<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Receta Comentario'), ['action' => 'edit', $recetaComentario->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Receta Comentario'), ['action' => 'delete', $recetaComentario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recetaComentario->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Receta Comentarios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Receta Comentario'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Recetas'), ['controller' => 'Recetas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Receta'), ['controller' => 'Recetas', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="recetaComentarios view large-9 medium-8 columns content">
    <h3><?= h($recetaComentario->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Receta') ?></th>
            <td><?= $recetaComentario->has('receta') ? $this->Html->link($recetaComentario->receta->id, ['controller' => 'Recetas', 'action' => 'view', $recetaComentario->receta->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Usuario') ?></th>
            <td><?= $recetaComentario->has('usuario') ? $this->Html->link($recetaComentario->usuario->id, ['controller' => 'Usuarios', 'action' => 'view', $recetaComentario->usuario->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($recetaComentario->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Fechahora') ?></th>
            <td><?= h($recetaComentario->fechahora) ?></tr>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Texto') ?></h4>
        <?= $this->Text->autoParagraph(h($recetaComentario->texto)); ?>
    </div>
</div>
