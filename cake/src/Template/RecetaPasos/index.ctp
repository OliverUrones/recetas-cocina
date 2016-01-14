<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Nuevo paso de receta'), ['action' => 'add',$receta_id]) ?></li>
        <li><?= $this->Html->link(__('Recetas'), ['controller' => 'Recetas', 'action' => 'index']) ?></li>
        </ul>
</nav>
<div class="recetaPasos index large-9 medium-8 columns content">
    <h3><?= __('Pasos de Receta') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('orden') ?></th>
               <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('receta_id') ?></th>
                
                <th class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recetaPasos as $recetaPaso){ ?>
			<?php if($recetaPaso->receta->id == $receta_id){ ?>
            <tr>
 <td><?= $this->Number->format($recetaPaso->orden) ?></td>
                <td><?= $this->Number->format($recetaPaso->id) ?></td>
                <td><?= $recetaPaso->has('receta') ? $this->Html->link($recetaPaso->receta->nombre, ['controller' => 'Recetas', 'action' => 'view', $recetaPaso->receta->id]) : '' ?></td>
               
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $recetaPaso->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $recetaPaso->id]) ?>
                    <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $recetaPaso->id], ['confirm' => __('Esta seguro que la desea eliminar # {0}?', $recetaPaso->id)]) ?>
                    <?= $this->Html->link(__('Imágenes'), ['controller'=>'RecetaPasoImagenes','action' => 'index', $recetaPaso->id]) ?>
                </td>
            </tr>
            <?php 
			}
			}
			?>
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
