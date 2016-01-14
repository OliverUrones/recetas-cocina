<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Listar Ofertas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Listar Ingredientes'), ['controller' => 'Ingredientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nuevo Ingrediente'), ['controller' => 'Ingredientes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tiendaOfertas form large-9 medium-8 columns content">
    <?= $this->Form->create($tiendaOferta) ?>
    <fieldset>
        <legend><?= __('Añadir Oferta') ?></legend>
        <?php
            echo $this->Form->input('tienda_id', ['options' => $nombres]);
            echo $this->Form->input('ingrediente_id', ['options' => $ingredientes]);
            echo $this->Form->input('descripcion');
            echo $this->Form->input('envase');
            echo $this->Form->input('cantidad');
            echo $this->Form->input('medida');
            echo $this->Form->input('notas');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Añadir')) ?>
    <?= $this->Form->end() ?>
</div>
