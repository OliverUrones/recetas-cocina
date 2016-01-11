<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Editar Imagen de Paso'), ['action' => 'edit', $recetaPasoImagene->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Eliminar Imagen de paso'), ['action' => 'delete', $recetaPasoImagene->id], ['confirm' => __('Esta seguro que la desea eliminar # {0}?', $recetaPasoImagene->id)]) ?> </li>
        <li><?= $this->Html->link(__('Imagenes de pasos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nueva imagen de paso'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Pasos de receta'), ['controller' => 'RecetaPasos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nuevo paso de receta'), ['controller' => 'RecetaPasos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="recetaPasoImagenes view large-9 medium-8 columns content">
    <h3><?= h($recetaPasoImagene->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Receta Paso') ?></th>
            <td><?= $recetaPasoImagene->has('receta_paso') ? $this->Html->link($recetaPasoImagene->receta_paso->id, ['controller' => 'RecetaPasos', 'action' => 'view', $recetaPasoImagene->receta_paso->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($recetaPasoImagene->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Orden') ?></th>
            <td><?= $this->Number->format($recetaPasoImagene->orden) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Imagen') ?></h4>
        <?= $this->Text->autoParagraph(h($recetaPasoImagene->imagen)); ?>
    </div>
</div>
