<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Editar Imagen de Paso'), ['action' => 'edit', $recetaPasoImagene->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Eliminar Imagen de paso'), ['action' => 'delete', $recetaPasoImagene->id], ['confirm' => __('Esta seguro que la desea eliminar # {0}?', $recetaPasoImagene->id)]) ?> </li>
        <li><?= $this->Html->link(__('Imagenes de pasos'), ['action' => 'index',$recetaPasoImagene->receta_paso->id]) ?> </li>
        <li><?= $this->Html->link(__('Nueva imagen de paso'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Pasos de receta'), ['controller' => 'RecetaPasos', 'action' => 'index',$recetaPasoImagene->receta_paso->id]) ?> </li>
        <li><?= $this->Html->link(__('Nuevo paso de receta'), ['controller' => 'RecetaPasos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="recetaPasoImagenes view large-9 medium-8 columns content">

    <h3>Imagen nº <?= h($recetaPasoImagene->orden)  ?> del paso nº <?= h($recetaPasoImagene->receta_paso->orden) ?></h3>
   
    <div class="row">
        
        <img src=<?=$recetaPasoImagene->imagen?> />
    </div>
</div>
