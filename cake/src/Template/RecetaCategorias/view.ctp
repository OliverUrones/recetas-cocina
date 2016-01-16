<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Editar Receta Categoria'), ['action' => 'edit', $recetaCategoria->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Borrar Receta Categoria'), ['action' => 'delete', $recetaCategoria->id], ['confirm' => __('¿Desea borrar # {0}?', $recetaCategoria->id)]) ?> </li>
        <li><?= $this->Html->link(__('Listar Receta Categorias'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nueva Receta Categoria'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="recetaCategorias view large-9 medium-8 columns content">
    <h3><?= h($recetaCategoria->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Receta') ?></th>
            <td><?= $recetaCategoria->has('receta') ? $this->Html->link($recetaCategoria->receta->nombre, ['controller' => 'Recetas', 'action' => 'view', $recetaCategoria->receta->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Categoria') ?></th>
            <td><?= $recetaCategoria->has('categoria') ? $this->Html->link($recetaCategoria->categoria->nombre, ['controller' => 'Categorias', 'action' => 'view', $recetaCategoria->categoria->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($recetaCategoria->id) ?></td>
        </tr>
    </table>
</div>
