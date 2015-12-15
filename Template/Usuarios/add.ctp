<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Ver Todos'), ['action' => 'index']) ?></li>
    </ul>
</nav> 
<div class="usuarios form large-9 medium-8 columns content">
    <h3><?= __('Nuevo Usuario') ?></h3>
    <?= $this->Form->create($usuario) ?>
    <fieldset>
        <legend>Datos del nuevo usuario</legend>
        <?php
            echo $this->Form->input('email');
            echo $this->Form->input('password');
            echo $this->Form->input('nombre');
            $opciones = [
                'Elija un rol' => [
                    'A' => 'Administrador',
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
            echo $this->Form->select('aceptado', $opciones);
            //DTR: Modificado nombre del input de "Fecha" a "creado", sino no valida al guardar.
            //DTR: Modificado tipo de campo de "date hour" a "datetime" porque no convierte bien la fecha/hora.
            echo $this->Form->input('creado', ['type' => 'datetime', 'value' => date('Y-m-d H:i:s'), 'readonly' => 'readonly']);
        ?>
        <?= $this->Form->button(__('Crear')) ?>
        <?= $this->Form->end() ?>
    </fieldset>
</div>