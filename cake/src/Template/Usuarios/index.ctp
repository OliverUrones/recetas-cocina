<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Ver Todos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Crear Nuevo'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="usuarios index large-9 medium-8 columns content">
    <h3><?= __('Usuarios') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('password') ?></th>
                <th><?= $this->Paginator->sort('nombre') ?></th>
                <th><?= $this->Paginator->sort('rol') ?></th>
                <th><?= $this->Paginator->sort('aceptado') ?></th>
                <th><?= $this->Paginator->sort('creado') ?></th>
                <th><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?= h($usuario->id) ?></td>
                <td><?= h($usuario->email) ?></td>
                <td><?= h($usuario->password) ?></td>
                <td><?= h($usuario->nombre) ?></td>
                <td>
                    <?php   if(h($usuario->rol) === 'A')
                            {
                                echo 'Administrador';
                            }
                            if(h($usuario->rol) === 'C')
                            {
                                echo 'Colaborador';
                            }
                            if(h($usuario->rol) === 'T')
                            {
                                echo 'Tienda';
                            }
                    ?>
                </td>
                <td><?php if($usuario->aceptado == 1)
                        {
                            echo 'Sí';
                        }else
                        {
                            echo 'No';
                        }
                    ?>
                </td>
                <td><?= h($usuario->creado) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $usuario->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $usuario->id]) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $usuario->id], ['confirm' => __('¿Está seguro que quiere borrar a # {0}?', $usuario->id)]) ?>
                </td>
            </tr>
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