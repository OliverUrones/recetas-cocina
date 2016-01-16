<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Aciones') ?></li>
        <li><?= $this->Html->link(__('Volver'), ['controller' => 'Recetas', 'action' => 'fichadetallada', $idreceta]) ?></li>
       
    </ul>
</nav>
<div class="recetaComentarios form large-9 medium-8 columns content">
    <?= $this->Form->create($recetaComentario) ?>
    <fieldset>
        <legend><?= __('Add Receta Comentario') ?></legend>
        <?php

            echo $this->Form->input('fechahora');
            echo $this->Form->input('texto');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
