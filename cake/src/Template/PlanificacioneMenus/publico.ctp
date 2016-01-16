<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Planificaciones'), ['controller' => 'Planificaciones', 'action' => 'publico']) ?></li>
        <li><?= $this->Html->link(__('Menús'), ['controller' => 'Menus', 'action' => 'publico']) ?></li>
    </ul>
</nav>
<div class="planificacioneMenus index large-9 medium-8 columns content">
    <h3><?= __('Planificaciones de Menús') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
              
                <th><?= $this->Paginator->sort('planificacion') ?></th>
                <th><?= $this->Paginator->sort('menu') ?></th>
                <th><?= $this->Paginator->sort('Dia') ?></th>
                <th class="actions"><?= __('Accioness') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php  $dias=array("lunes","martes","miercoles","jueves","viernes","sabado","domingo");
			foreach ($planificacioneMenus as $planificacioneMenu): ?>
            <tr>
               
                <td><?= $planificacioneMenu->has('planificacione') ? $planificacioneMenu->planificacione->nombre : '' ?></td>
                <td><?= $planificacioneMenu->has('menu') ? $planificacioneMenu->menu->titulo: '' ?></td>
                <td><?= $dias[$planificacioneMenu->numero_dia] ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'vista', $planificacioneMenu->id]) ?>                   
                </td>
            </tr>
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
