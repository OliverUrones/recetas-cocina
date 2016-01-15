<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Nueva Categoria'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('Administrar recetas en categorias'), ['controller'=>'recetaCategorias', 'action' => 'index']) ?></li>
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
                <th><?= $this->Paginator->sort('parent_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorias as $categoria): ?>
            <tr>
                <td><?= $this->Number->format($categoria->id) ?></td>
                <td><?= h($categoria->nombre) ?></td>
                <td><?= $categoria->has('parent_categoria') ? $this->Html->link($categoria->parent_categoria->nombre, ['controller' => 'Categorias', 'action' => 'view', $categoria->parent_categoria->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $categoria->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $categoria->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $categoria->id], ['confirm' => __('Are you sure you want to delete # {0}?', $categoria->id)]) ?>
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
