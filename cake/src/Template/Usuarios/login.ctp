<div class="usuarios form large-9 medium-8 columns content">
    <h3><?= __('Formulario de login') ?></h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend>Datos de ingreso</legend>
        <?php
            echo $this->Form->input('email');
            echo $this->Form->input('password');
        ?>
        <?= $this->Html->link(__('¿Olvidó su contraseña?'), ['controller' => 'Usuarios', 'action' => 'recuperarPass']); ?>
        <?= $this->Form->button(__('Acceder')) ?>
        <?= $this->Form->end() ?>
    </fieldset>
</div>