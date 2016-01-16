<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Nueva Categoria'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="categorias index large-9 medium-8 columns content">

<?php
	foreach($arbol as $v){
		echo $v."<br>";
	}
	
	
	?>
    <h3><?= __('Categorias') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('nombre') ?></th>
                <th><?= $this->Paginator->sort('categoria padre') ?></th>
                <th class="actions"><?= __('acciones') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $categoria): ?>
            <tr>
                <td><?= $this->Number->format($categoria->id) ?></td>
                <td><?= h($categoria->nombre) ?></td>
                <td><?= $categoria->has('parent_categoria') ? $this->Html->link($categoria->parent_categoria->nombre, ['controller' => 'Categorias', 'action' => 'view', $categoria->parent_categoria->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['action' => 'view', $categoria->id]) ?>
                    <?= $this->Html->link(__('Editar'), ['action' => 'edit', $categoria->id]) ?>
                    <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $categoria->id], ['confirm' => __('¿Desea borrar # {0}?', $categoria->nombre)]) ?>
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
