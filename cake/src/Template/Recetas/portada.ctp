<?php
use Cake\ORM\TableRegistry;
use App\Model\RecetasTable;

    if(!isset($Recetas) )
    {
        $Recetas = TableRegistry::get('Recetas')->find();
        $Recetas = $Recetas->find('all')->toArray();
    }
?>
<div class="recetas left index large-7">
    <h3><?= __('RECETAS') ?></h3>
    <h5><i><?= __('"Busque la receta que le guste e intentela"') ?></i></h5>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('tipo_plato') ?></th>
                <th><?= $this->Paginator->sort('nombre') ?></th>
                <th><?= $this->Paginator->sort('descripcion') ?></th>
                <th><?= $this->Paginator->sort('dificultad') ?></th>
                <th><?= $this->Paginator->sort('comensales') ?></th>
                <th><?= $this->Paginator->sort('tiempo_elaboracion') ?></th>
                <th><?= $this->Paginator->sort('valoracion') ?></th>
                <th><?= $this->Paginator->sort('usuario_id') ?></th>
                <th class="actions"><?= __('Acciones') ?></th>
            
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Recetas as $receta): ?>
            <tr>

                <td><?= h($receta->mostrarTipo_plato($receta->tipo_plato)) ?></td>
                <td><?= h($receta->nombre) ?></td>
                <td><?= h($receta->descripcion) ?></td>
                <td><?= h($receta->dificultad) ?></td>
                <td><?= h($receta->comensales) ?></td>
                <td><?= $this->Number->format($receta->tiempo_elaboracion) ?></td>
                <td><?= h($receta->valoracion) ?></td>
                <td><?= $receta->has('usuario') ? $this->Html->link($receta->usuario->id, ['controller' => 'Usuarios', 'action' => 'view', $receta->usuario->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['controller'=>'Recetas','action' => 'view', $receta->id]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

