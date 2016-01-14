<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $recetaPasoImagene->id],
                ['confirm' => __('Esta seguro que la desea eliminar # {0}?', $recetaPasoImagene->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Imagenes de pasos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Pasos de recetas'), ['controller' => 'RecetaPasos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nuevo paso en receta'), ['controller' => 'RecetaPasos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recetaPasoImagenes form large-9 medium-8 columns content">
    <?= $this->Form->create($recetaPasoImagene) ?>
    <fieldset>
        <legend><?= __('Editar Imagen de paso') ?></legend>
        <?php
            echo $this->Form->input('receta_paso_id', ['options' => $recetaPasos]);
            echo $this->Form->input('orden');
            echo $this->Form->input('imagen');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
