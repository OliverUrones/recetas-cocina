<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $recetaPaso->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $recetaPaso->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Pasos de Receta'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Recetas'), ['controller' => 'Recetas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nueva Receta'), ['controller' => 'Recetas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Imagenes de pasos de receta'), ['controller' => 'RecetaPasoImagenes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nueva imagen de paso de receta'), ['controller' => 'RecetaPasoImagenes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recetaPasos form large-9 medium-8 columns content">
    <?= $this->Form->create($recetaPaso) ?>
    <fieldset>
        <legend><?= __('Editar Paso de receta') ?></legend>
        <?php
            echo $this->Form->input('receta_id', ['options' => $recetas]);
            echo $this->Form->input('orden');
            echo $this->Form->input('descripcion');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
