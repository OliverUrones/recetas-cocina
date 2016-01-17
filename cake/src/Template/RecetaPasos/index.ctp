<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Añadir nuevo paso de elaboración de la receta'), ['action' => 'add',$receta_id]) ?></li>
        <li><?= $this->Html->link(__('ir a recetas'), ['controller' => 'Recetas', 'action' => 'index']) ?></li>
        </ul>
</nav>
<div class="recetaPasos index large-9 medium-8 columns content">
    <?php
                   
            foreach ($recetaPasos as $recetaPaso){ ?>
            <?php if($recetaPaso->receta->id == $receta_id){
                $nombre= $recetaPaso->receta->nombre ; 
                
            }}
$nombre= $recetaPaso->receta->nombre ; 

?>
    <h3><?= __('Pasos para elaboración de '.$nombre) ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('Paso nº') ?></th>
                <th><?= $this->Paginator->sort('descripción') ?></th>
         
               
                
                <th class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
                   
            foreach ($recetaPasos as $recetaPaso){ ?>
			<?php if($recetaPaso->receta->id == $receta_id){ ?>
            <tr>
 <td><?= $this->Number->format($recetaPaso->orden) ?></td>
             
                <td><?=  $recetaPaso->descripcion ?></td>
               
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
