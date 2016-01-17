<?php
use Cake\ORM\TableRegistry;
use App\Model\RecetasTable;
use Cake\Controller\Component;

    if(!isset($Recetas) )
    {
        /*$Recetas = TableRegistry::get('Recetas');
        $Recetas = &paginator->paginate($Recetas->find(), $config);
        $Recetas = $Recetas->toArray();*/
        $Recetas = TableRegistry::get('Recetas')->find();
        $Recetas = $Recetas->find('all')->toArray();
    }
?>
<div class="recetas left index large-7">
    <h3 align="center"><?= __('RECETAS') ?></h3>
    <h5 align="center"><i><?= __('"Busque la receta que le guste e intentela"') ?></i></h5>
   <!-- <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div> -->
    <table cellpadding="0" cellspacing="0">
        
        <tbody>
            <?php foreach ($Recetas as $receta){ ?>
            <?php if ($receta->aceptada== true ) { ?>
            <tr>

                <h4 class="actions">
                <?=$this->Html->link(__($receta->nombre ), ['controller'=>'Recetas','action' => 'fichadetallada', $receta->id])?></h4>
                <table>
                    <tr>
                        <td>Tipo de plato: <?= h($receta->mostrarTipo_plato($receta->tipo_plato)) ?></td>
                    </tr>
                    <tr >
                        <td colspan="2"><?= substr($receta->descripcion,0,100)?>...</td>
                    </tr>
                    <tr>
                        <td>Dificultad: <?=  $receta->mostrarDificultad($receta->dificultad) ?></td>
                        <td> Valoración: <?=  $receta->mostrarValoracion($receta->valoracion) ?></td>
                     </tr>
                     <tr>
                        <td></td>
                       
                        <td class="actions">
                             <?= $this->Html->link(__('Ver '.$receta->nombre ), ['controller'=>'Recetas','action' => 'fichadetallada', $receta->id]) ?>
                        </td>
                         <td></td>
                     </tr>
                </table>
            </tr>
            <?php }} ?>
        </tbody>
    </table>
    <!-- <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('siguiente') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div> -->
</div>

