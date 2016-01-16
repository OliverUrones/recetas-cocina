<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Form->postLink(
                __('Borrar'),
                ['action' => 'delete', $recetaCategoria->id],
                ['confirm' => __('¿Desea Borrar # {0}?', $recetaCategoria->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Listar Receta Categorias'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nueva Receta Categorias'), ['controller' => 'RecetaCategorias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recetaCategorias form large-9 medium-8 columns content">
    <?= $this->Form->create($recetaCategoria) ?>
    <fieldset>
        <legend><?= __('Editar Receta Categoria') ?></legend>
        <?php
            echo $this->Form->input('nombre receta', ['options' => $recetas]);
            echo $this->Form->input('nombre categoria', ['options' => $categorias]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('enviar')) ?>
    <?= $this->Form->end() ?>
</div>
