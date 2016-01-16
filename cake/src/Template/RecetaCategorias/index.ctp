<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Nueva Receta Categoria'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Listar Recetas Categoria'), ['controller' => 'Recetas', 'action' => 'index']) ?></li>
    </ul>
</nav>
<div class="recetaCategorias index large-9 medium-8 columns content">
    <h3><?= __('Receta Categorias') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('Nombre Receta') ?></th>
                <th><?= $this->Paginator->sort('Nombre Categoria') ?></th>
                <th class="actions"><?= __('Acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($recetaCategorias as $recetaCategoria): ?>
            <tr>
                <td><?= $this->Number->format($recetaCategoria->id) ?></td>
                <td><?= $recetaCategoria->has('receta') ? $this->Html->link($recetaCategoria->receta->nombre, ['controller' => 'Recetas', 'action' => 'view', $recetaCategoria->receta->id]) : '' ?></td>
                <td><?= $recetaCategoria->has('categoria') ? $this->Html->link($recetaCategoria->categoria->nombre, ['controller' => 'Categorias', 'action' => 'view', $recetaCategoria->categoria->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $recetaCategoria->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $recetaCategoria->id]) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $recetaCategoria->id], ['confirm' => __('¿Desea Borrar # {0}?', $recetaCategoria->id)]) ?>
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
