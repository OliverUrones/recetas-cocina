<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $recetaCategoria->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $recetaCategoria->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Receta Categorias'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Recetas'), ['controller' => 'Recetas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Receta'), ['controller' => 'Recetas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['controller' => 'Categorias', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Categoria'), ['controller' => 'Categorias', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recetaCategorias form large-9 medium-8 columns content">
    <?= $this->Form->create($recetaCategoria) ?>
    <fieldset>
        <legend><?= __('Edit Receta Categoria') ?></legend>
        <?php
            echo $this->Form->input('receta_id', ['options' => $recetas]);
            echo $this->Form->input('categoria_id', ['options' => $categorias]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
