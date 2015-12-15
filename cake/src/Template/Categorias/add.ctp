<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Categorias'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="categorias form large-9 medium-8 columns content">
    <?= $this->Form->create($categoria) ?>
    <fieldset>
        <legend><?= __('Add Categoria') ?></legend>
        <?php
            echo $this->Form->input('nombre');
            echo $this->Form->input('descripcion');
            echo $this->Form->input('categoria_padre_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
