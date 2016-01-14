<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Form->postLink(
                __('Borrar'),
                ['action' => 'delete', $ingrediente->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $ingrediente->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Ver Ingredientes'), ['action' => 'index']) ?></li>
        <!--	<li><?//= $this->Html->link(__('List Tienda Ofertas'), ['controller' => 'TiendaOfertas', 'action' => 'index']) ?></li> -->
        <!--	<li><?//= $this->Html->link(__('New Tienda Oferta'), ['controller' => 'TiendaOfertas', 'action' => 'add']) ?></li> -->
    </ul>
</nav>
<div class="ingredientes form large-9 medium-8 columns content">
    <?= $this->Form->create($ingrediente) ?>
    <fieldset>
        <legend><?= __('Edit Ingrediente') ?></legend>
        <?php
            echo $this->Form->input('nombre');
            echo $this->Form->input('descripcion');
            echo $this->Form->input('datos_nutricion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Editar')) ?>
    <?= $this->Form->end() ?>
</div>
