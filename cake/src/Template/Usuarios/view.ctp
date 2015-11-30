<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Ver Todos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Crear Nuevo'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Modificar'), ['action'=> 'edit', $usuario->id])?></li>
        <li>
            <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $usuario->id], ['confirm' => __('¿Está seguro que quiere borrar a # {0}?', $usuario->id)]) ?>
        </li>
    </ul>
</nav> 
<div class="usuarios index large-9 medium-8 columns content">
    <h3><?= __('Detalles de usuario') ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('E-mail') ?></th>
            <td><?= h($usuario->email) ?></td>
        </tr>
        
        <tr>
            <th><?= __('Contraseña') ?></th>
            <td><?= h(md5($usuario->password)) ?></td>
        </tr>
        
        <tr>
            <th><?= __('Nombre') ?></th>
            <td><?= h($usuario->nombre) ?></td>
        </tr>
        
        <tr>
            <th><?= __('Rol') ?></th>
            <td><?php if(h($usuario->rol) === 'A')
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
        </tr>
        
        <tr>
            <th>
                <?= __('Aceptado') ?>
            </th>
            <td>
                <?php if(h($usuario->aceptado) == 1)
                        {
                            echo 'Sí';
                        }else
                        {
                            echo 'No';
                        }
                    
                ?>
            </td>
        </tr>
        
        <tr>
            <th><?= __('Fecha de creación') ?></th>
            <td><?= h($usuario->creado) ?></td>
        </tr>
    </table>
</div>