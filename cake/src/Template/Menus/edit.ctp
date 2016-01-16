<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $menu->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $menu->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Listar Menús'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Listar Platos de Menú'), ['controller' => 'MenuPlatos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nuevo Plato'), ['controller' => 'MenuPlatos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="menus form large-9 medium-8 columns content">
    <?= $this->Form->create($menu) ?>
    <fieldset>
        <legend><?= __('Editar Menú') ?></legend>
        <?php
            echo $this->Form->input('titulo');
            echo $this->Form->input('descripcion');
            
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
