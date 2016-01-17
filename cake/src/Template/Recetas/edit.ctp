<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Ir a recetas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Ir a pasos de elaboración de receta'), ['controller' => 'RecetaPasos', 'action' => 'index',$receta->id]) ?></li>
    </ul>
</nav>
<div class="recetas form large-9 medium-8 columns content">
    <?= $this->Form->create($receta) ?>
    <fieldset>
        <legend><?= __('Editar Receta') ?></legend>
        <?php
            echo $this->Form->input('nombre');
            echo $this->Form->input('descripcion');
            echo $this->Form->input('tipo_plato',['type' => 'select', 'options'=>\App\model\Entity\Receta::tipo_plato()]);
            echo $this->Form->input('dificultad');
            echo $this->Form->input('comensales');
            echo $this->Form->input('tiempo_elaboracion');
            echo $this->Form->input('valoracion');
            if($usuario['rol']=='A'){
            echo $this->Form->input('aceptada');
            }
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
