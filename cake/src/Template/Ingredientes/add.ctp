<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Ver Ingredientes'), ['action' => 'index']) ?></li>
        <!--   <li><?//= $this->Html->link(__('List Tienda Ofertas'), ['controller' => 'TiendaOfertas', 'action' => 'index']) ?></li> -->
        <!--   <li><?//= $this->Html->link(__('New Tienda Oferta'), ['controller' => 'TiendaOfertas', 'action' => 'add']) ?></li> -->
    </ul>
</nav>
<div class="ingredientes form large-9 medium-8 columns content">
    <?= $this->Form->create($ingrediente) ?>
    <fieldset>
        <legend><?= __('Añadir Ingrediente') ?></legend>
        <?php
            echo $this->Form->input('nombre');
            echo $this->Form->input('descripcion');
            echo $this->Form->input('datos_nutricion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Añadir')) ?>
    <?= $this->Form->end() ?>
</div>
