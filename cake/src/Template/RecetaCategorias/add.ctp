<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Listar Receta Categorias'), ['action' => 'index']) ?></li>

    </ul>
</nav>
<div class="recetaCategorias form large-9 medium-8 columns content">
    <?= $this->Form->create($recetaCategoria) ?>
    <fieldset>
        <legend><?= __('Nueva Receta Categoria') ?></legend>
        <?php
            echo $this->Form->input('nombre receta', ['options' => $recetas]);
            echo $this->Form->input('nombre categoria', ['options' => $categorias]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
