<div class="usuarios form large-9 medium-8 columns content">
    <h3><?= __('Restaurar copia de seguridad') ?></h3>
    <?= $this->Form->create(null, ['type' => 'file']) ?>
    <fieldset>
        <legend>Suba un archivo</legend>
        <?php
            echo $this->Form->file('archivo');
        ?>
        <?= $this->Form->button(__('Restaurar')) ?>
        <?= $this->Form->end() ?>
    </fieldset>
</div>