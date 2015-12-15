<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Recetas'), ['action' => 'index']) ?></li>
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
<div class="recetas form large-9 medium-8 columns content">
    <?= $this->Form->create($receta) ?>
    <fieldset>
        <legend><?= __('Add Receta') ?></legend>
        <?php
            echo $this->Form->input('nombre');
            echo $this->Form->input('descripcion');
            echo $this->Form->input('tipo_plato');
            echo $this->Form->input('dificultad' , ['type' => 'number']);
            echo $this->Form->input('comensales');
            echo $this->Form->input('tiempo_elaboracion');
            echo $this->Form->input('valoracion');
            echo $this->Form->input('usuario_id', ['options' => $usuarios, 'empty' => true]);
            echo $this->Form->input('aceptada');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
