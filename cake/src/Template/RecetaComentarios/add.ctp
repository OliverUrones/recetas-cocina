<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Receta Comentarios'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Recetas'), ['controller' => 'Recetas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Receta'), ['controller' => 'Recetas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recetaComentarios form large-9 medium-8 columns content">
    <?= $this->Form->create($recetaComentario) ?>
    <fieldset>
        <legend><?= __('Add Receta Comentario') ?></legend>
        <?php
            echo $this->Form->input('receta_id', ['options' => $recetas]);
            echo $this->Form->input('usuario_id', ['options' => $usuarios]);
            echo $this->Form->input('fechahora');
            echo $this->Form->input('texto');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
