<div class="usuarios form large-9 medium-8 columns content">
    <h3><?= __('Cambiar Contraseña') ?></h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend>Datos de ingreso</legend>
        <?php
            echo $this->Form->input('email');
            echo $this->Form->input('Nueva contraseña', ['type' => 'password', 'name' => 'password', 'id' => 'password']);
            echo $this->Form->input('Repita contraseña', ['type' => 'password']);
        ?>
        <?= $this->Form->button(__('Cambiar')) ?>
        <?= $this->Form->end() ?>
    </fieldset>
</div>