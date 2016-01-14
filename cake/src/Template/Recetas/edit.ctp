<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Form->postLink(
                __('Eliminar'),
                ['action' => 'delete', $receta->id],
                ['confirm' => __('Esta seguro que la desea eliminar # {0}?', $receta->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Recetas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Pasos de Receta'), ['controller' => 'RecetaPasos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nuevo paso de receta'), ['controller' => 'RecetaPasos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recetas form large-9 medium-8 columns content">
    <?= $this->Form->create($receta) ?>
    <fieldset>
        <legend><?= __('Editar Receta') ?></legend>
        <?php
            echo $this->Form->input('nombre');
            echo $this->Form->input('descripcion');
            echo $this->Form->input('tipo_plato');
            echo $this->Form->input('dificultad');
            echo $this->Form->input('comensales');
            echo $this->Form->input('tiempo_elaboracion');
            echo $this->Form->input('valoracion');
            echo $this->Form->input('aceptada');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
