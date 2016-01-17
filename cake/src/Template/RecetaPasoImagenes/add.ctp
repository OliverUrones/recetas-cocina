<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Imagenes de paso'), ['action' => 'index',$recetaPaso_id]) ?></li>
         <li><?= $this->Html->link(__('Recetas'), ['controller' => 'Recetas', 'action' => 'index',]) ?></li>
    </ul>
</nav>
<div class="recetaPasoImagenes form large-9 medium-8 columns content">
    <?= $this->Form->create($recetaPasoImagene) ?>
    <fieldset>
        <legend><?= __('Añadir Imagen de paso') ?></legend>
        <?php
            echo $this->Form->input('orden');
            echo $this->Form->input('imagen',['type' => 'text','label'=>'Escriba la url de la imagen'])
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
