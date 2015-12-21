<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Tiendaofertas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Tiendas'), ['controller' => 'Tiendas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tienda'), ['controller' => 'Tiendas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ingredientes'), ['controller' => 'Ingredientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ingrediente'), ['controller' => 'Ingredientes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tiendaofertas form large-9 medium-8 columns content">
    <?= $this->Form->create($tiendaoferta) ?>
    <fieldset>
        <legend><?= __('Add Tiendaoferta') ?></legend>
        <?php
            echo $this->Form->input('tienda_id', ['options' => $tiendas]);
            echo $this->Form->input('ingrediente_id', ['options' => $ingredientes]);
            echo $this->Form->input('descripcion');
            echo $this->Form->input('envase');
            echo $this->Form->input('cantidad');
            echo $this->Form->input('medida');
            echo $this->Form->input('notas');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
