<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Planificaciones con Menús'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Planificaciones'), ['controller' => 'Planificaciones', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nueva Planificación'), ['controller' => 'Planificaciones', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Menús'), ['controller' => 'Menus', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nuevo Menú'), ['controller' => 'Menus', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="planificacioneMenus form large-9 medium-8 columns content">
    <?= $this->Form->create($planificacioneMenu) ?>
    <fieldset>
        <legend><?= __('Añadir Planificación') ?></legend>
        <?php
            echo $this->Form->input('planificacione_id', ['options' => $planificaciones]);
            echo $this->Form->input('menu_id', ['options' => $menus]);
            echo $this->Form->input('numero_dia',['options' => array("lunes","martes","miercoles","jueves","viernes","sabado","domingo")]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>

<?php 
