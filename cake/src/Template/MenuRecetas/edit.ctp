<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Form->postLink(
                __('Borrar'),
                ['action' => 'delete', $menuReceta->id],
                ['confirm' => __('¿Está seguro de que quiere borrar # {0}?', $menuReceta->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Platos asociados a Menús'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Menús'), ['controller' => 'Menus', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nuevo Menú'), ['controller' => 'Menus', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Platos'), ['controller' => 'Recetas', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="menuRecetas form large-9 medium-8 columns content">
    <?= $this->Form->create($menuReceta) ?>
    <fieldset>
        <legend><?= __('Editar Plato/Menú') ?></legend>
        <?php
            echo $this->Form->input('menu_id', ['options' => $menus]);
            echo $this->Form->input('receta_id', ['options' => $recetas]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
