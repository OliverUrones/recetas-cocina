<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Receta Paso Imagene,$recetaPaso_id'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Receta Pasos'), ['controller' => 'RecetaPasos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Receta Paso'), ['controller' => 'RecetaPasos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="recetaPasoImagenes index large-9 medium-8 columns content">
    <h3><?= __('Receta Paso Imagenes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('receta_paso_id') ?></th>
                <th><?= $this->Paginator->sort('orden') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recetaPasoImagenes as $recetaPasoImagene): ?>
            <?php if($recetaPasoImagene->receta_paso->id == $recetaPaso_id){ ?>
            <tr>
                <td><?= $this->Number->format($recetaPasoImagene->id) ?></td>
                <td><?= $recetaPasoImagene->has('receta_paso') ? $this->Html->link($recetaPasoImagene->receta_paso->id, ['controller' => 'RecetaPasos', 'action' => 'view', $recetaPasoImagene->receta_paso->id]) : '' ?></td>
                <td><?= $this->Number->format($recetaPasoImagene->orden) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $recetaPasoImagene->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $recetaPasoImagene->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $recetaPasoImagene->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recetaPasoImagene->id)]) ?>
                </td>
            </tr>
            <?php } ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
