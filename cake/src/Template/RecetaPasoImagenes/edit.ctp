<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        
        <li><?= $this->Html->link(__('Ir a imagenes de pasos de elaboración'), ['action' => 'index', $recetaPasoImagene->receta_paso_id]) ?></li>
       </ul>
</nav>
<div class="recetaPasoImagenes form large-9 medium-8 columns content">
    <?= $this->Form->create($recetaPasoImagene) ?>
    <fieldset>
        <legend><?= __('Editar Imagen de paso') ?></legend>
        <?php
        
            echo $this->Form->input('orden');
            echo $this->Form->input('imagen');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
