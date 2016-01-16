<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Receta Categorias'), ['action' => 'index']) ?></li>

    </ul>
</nav>
<div class="recetaCategorias form large-9 medium-8 columns content">
    <?= $this->Form->create($recetaCategoria) ?>
    <fieldset>
        <legend><?= __('Add Receta Categoria') ?></legend>
        <?php
            echo $this->Form->input('recetas_id', ['options' => $recetas]);
            echo $this->Form->input('categorias_id', ['options' => $categorias]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
