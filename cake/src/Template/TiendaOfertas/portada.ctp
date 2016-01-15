<?php
use Cake\ORM\TableRegistry;
use App\Model\TiendaOfertasTable;

    if(!isset($tiendaOfertas) )
    {
        $tiendaOfertas = TableRegistry::get('TiendaOfertas')->find();
        $tiendaOfertas = TableRegistry::get('TiendaOfertas')->find('all')->contain(['Tiendas','Ingredientes']);
        $tiendaOfertas = $tiendaOfertas->find('all')->toArray();
    }
?>
<div class="tiendaOfertas right index large-4">
    <h3><?= __('¡OFERTAS ACTIVAS!') ?></h3>
    <h5><i><?= __('"Anímese y eche un vistazo a nuestra sección de Ofertas"') ?></i></h5>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                 <th><?= $this->Paginator->sort('tienda_id') ?></th>
                <th><?= $this->Paginator->sort('ingrediente_id') ?></th>
                <th><?= $this->Paginator->sort('cantidad') ?></th>
                <th><?= $this->Paginator->sort('medida') ?></th>
            
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tiendaOfertas as $tiendaOferta): ?>
            <tr>
                <td><?= $tiendaOferta->has('tienda') ? $this->Html->link($tiendaOferta->tienda->nombre, ['controller' => 'Tiendas', 'action' => 'viewpublico', $tiendaOferta->tienda->id]) : '' ?></td>
                <td><?= $tiendaOferta->has('ingrediente') ? $this->Html->link($tiendaOferta->ingrediente->nombre, ['controller' => 'Ingredientes', 'action' => 'view', $tiendaOferta->ingrediente->id]) : '' ?></td>
                <td><?= $this->Number->format($tiendaOferta->cantidad) ?></td>
                <td><?= h($tiendaOferta->medida) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Acceder a la oferta '), ['controller'=>'TiendaOfertas', 'action' => 'view2', $tiendaOferta->id]) ?>
                 </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
