<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Receta Paso Imagene'), ['action' => 'edit', $recetaPasoImagene->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Receta Paso Imagene'), ['action' => 'delete', $recetaPasoImagene->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recetaPasoImagene->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Receta Paso Imagenes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Receta Paso Imagene'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Receta Pasos'), ['controller' => 'RecetaPasos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Receta Paso'), ['controller' => 'RecetaPasos', 'action' => 'add']) ?> </li>
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
