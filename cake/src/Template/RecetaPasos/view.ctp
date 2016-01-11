<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Receta Paso'), ['action' => 'edit', $recetaPaso->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Receta Paso'), ['action' => 'delete', $recetaPaso->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recetaPaso->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Receta Pasos'), ['action' => 'index',$recetaPaso->receta->id]) ?> </li>
      </ul>
</nav>
<div class="recetaPasos view large-9 medium-8 columns content">
    <h3><?= h($recetaPaso->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Receta') ?></th>
            <td><?= $recetaPaso->has('receta') ? $this->Html->link($recetaPaso->receta->id, ['controller' => 'Recetas', 'action' => 'view', $recetaPaso->receta->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($recetaPaso->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Orden') ?></th>
            <td><?= $this->Number->format($recetaPaso->orden) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($recetaPaso->descripcion)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Receta Paso Imagenes') ?></h4>
        <?php if (!empty($recetaPaso->receta_paso_imagenes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Receta Paso Id') ?></th>
                <th><?= __('Orden') ?></th>
                <th><?= __('Imagen') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($recetaPaso->receta_paso_imagenes as $recetaPasoImagenes): ?>
            <tr>
                <td><?= h($recetaPasoImagenes->id) ?></td>
                <td><?= h($recetaPasoImagenes->receta_paso_id) ?></td>
                <td><?= h($recetaPasoImagenes->orden) ?></td>
                <td><?= h($recetaPasoImagenes->imagen) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RecetaPasoImagenes', 'action' => 'view', $recetaPasoImagenes->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'RecetaPasoImagenes', 'action' => 'edit', $recetaPasoImagenes->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RecetaPasoImagenes', 'action' => 'delete', $recetaPasoImagenes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recetaPasoImagenes->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
