<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Ver Todos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Crear Nuevo'), ['action' => 'add']) ?></li>
        <li>
            <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $usuario->id], ['confirm' => __('¿Está seguro que quiere borrar a # {0}?', $usuario->id)]) ?>
        </li>
    </ul>
</nav>
<div class="usuarios index large-9 medium-8 columns content">
    <h3><?= __('Editando Usuario') ?></h3>
    <?= $this->Form->create($usuario) ?>
    <fieldset>
        <legend><?= __('Modificar usuario') ?></legend>
        <?php
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('nombre');
            $opciones = [
                'Elija un rol' => [
                    'A' => 'Administardor',
                    'C' => 'Colaborador',
                    'T' => 'Tienda'
                ],
            ];
            echo $this->Form->select('rol', $opciones);
            $opciones = [
                'Aceptado' => [
                    0 => 'No',
                    1 => 'Sí'
                ],
            ];
            echo $this->Form->select('aceptado',$opciones);
            echo $this->Form->input('creado');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Guardar cambios')) ?>
    <?= $this->Form->end() ?>
</div>