<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Planificaciones'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="planificaciones form large-9 medium-8 columns content">
    <?= $this->Form->create($planificacione) ?>
    <fieldset>
        <legend><?= __('Añadir Planificación') ?></legend>
        <?php
            echo $this->Form->input('nombre');
            echo $this->Form->input('periodo');
            echo $this->Form->input('notas');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
