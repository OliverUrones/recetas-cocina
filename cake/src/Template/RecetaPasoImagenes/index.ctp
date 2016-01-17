<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Añadir nueva imagen de paso de elaboración'), ['action' => 'add',$recetaPaso_id]) ?></li>
        <li><?= $this->Html->link(__('Ir a los pasos de la receta'), ['controller' => 'RecetaPasos', 'action' => 'view', $recetaPaso_id]) ?></li>
        
    </ul>
</nav>
<?php foreach ($recetaPasoImagenes as $recetaPasoImagene): ?>
<?php if($recetaPasoImagene->receta_paso->id == $recetaPaso_id){ ?>
<?php 
$orden=$recetaPasoImagene->receta_paso->orden; ?>
<?php } ?>
<?php endforeach; ?>
<div class="recetaPasoImagenes index large-9 medium-8 columns content">
    <h3><?= __('Imagenes del paso nº '). $orden  ?> </h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('orden') ?></th>
                 <th><?= h('vista') ?></th>
                <th class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recetaPasoImagenes as $recetaPasoImagene): ?>
            <?php if($recetaPasoImagene->receta_paso->id == $recetaPaso_id){ ?>
            <tr>
                
                <!--td><?= $recetaPasoImagene->has('receta_paso') ? $this->Html->link($recetaPasoImagene->receta_paso->id, ['controller' => 'RecetaPasos', 'action' => 'view', $recetaPasoImagene->receta_paso->id]) : '' ?></td-->
                <td><?= $this->Number->format($recetaPasoImagene->orden) ?></td>
                 <td><img src="<?= h($recetaPasoImagene->imagen) ?>"height="82" width="152" /></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $recetaPasoImagene->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $recetaPasoImagene->id]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $recetaPasoImagene->id], ['confirm' => __('Esta seguro que la desea eliminar # {0}?', $recetaPasoImagene->id)]) ?>
                </td>
            </tr>
            <?php } ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
