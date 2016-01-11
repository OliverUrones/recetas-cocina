<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Editar Receta'), ['action' => 'edit', $receta->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Eliminar Receta'), ['action' => 'delete', $receta->id], ['confirm' => __('Are you sure you want to delete # {0}?', $receta->id)]) ?> </li>
        <li><?= $this->Html->link(__('Listar Recetas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('Nueva Receta'), ['action' => 'add']) ?> </li>
        <!-- li><?= $this->Html->link(__('List Usuarios'), ['controller' => 'Usuarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Usuario'), ['controller' => 'Usuarios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Menu Platos'), ['controller' => 'MenuPlatos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Menu Plato'), ['controller' => 'MenuPlatos', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Receta Categorias'), ['controller' => 'RecetaCategorias', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Receta Categoria'), ['controller' => 'RecetaCategorias', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Receta Comentarios'), ['controller' => 'RecetaComentarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Receta Comentario'), ['controller' => 'RecetaComentarios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Receta Ingredientes'), ['controller' => 'RecetaIngredientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Receta Ingrediente'), ['controller' => 'RecetaIngredientes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Receta Pasos'), ['controller' => 'RecetaPasos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Receta Paso'), ['controller' => 'RecetaPasos', 'action' => 'add']) ?> </li -->
    </ul>
</nav>
<div class="recetas view large-9 medium-8 columns content">
    <h3><?= h($receta->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Tipo Plato') ?></th>
            <td><?= $receta->mostrarTipo_plato($receta->tipo_plato)?></td>
        </tr>
        <tr>
            <th><?= __('Usuario') ?></th>
            <td><?= $receta->has('usuario') ? $this->Html->link($receta->usuario->id, ['controller' => 'Usuarios', 'action' => 'view', $receta->usuario->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($receta->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Tiempo Elaboracion') ?></th>
            <td><?= $this->Number->format($receta->tiempo_elaboracion) ?></td>
        </tr>
        <tr>
            <th><?= __('Dificultad') ?></th>
            <td><?=  $receta->mostrarDificultad($this->Number->format($receta->dificultad)) ?></td>
         </tr>
        <tr>
            <th><?= __('Comensales') ?></th>
            <td><?=  $this->Number->format($receta->comensales) ?></td>
         </tr>
        <tr>
            <th><?= __('Valoracion') ?></th>
            <td><?=  $receta->mostrarValoracion($this->Number->format($receta->valoracion)) ?></td>
         </tr>
        <tr>
            <th><?= __('Aceptada') ?></th>
            <td><?= $receta->aceptada ? __('Yes') : __('No'); ?></td>
         </tr>
    </table>
    <div class="row">
        <h4><?= __('Nombre') ?></h4>
        <?= $this->Text->autoParagraph(h($receta->nombre)); ?>
    </div>
    <div class="row">
        <h4><?= __('Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($receta->descripcion)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Menu Platos') ?></h4>
        <?php if (!empty($receta->menu_platos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Menu Id') ?></th>
                <th><?= __('Receta Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($receta->menu_platos as $menuPlatos): ?>
            <tr>
                <td><?= h($menuPlatos->menu_id) ?></td>
                <td><?= h($menuPlatos->receta_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'MenuPlatos', 'action' => 'view', $menuPlatos->menu_id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'MenuPlatos', 'action' => 'edit', $menuPlatos->menu_id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'MenuPlatos', 'action' => 'delete', $menuPlatos->menu_id], ['confirm' => __('Are you sure you want to delete # {0}?', $menuPlatos->menu_id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Receta Categorias') ?></h4>
        <?php if (!empty($receta->receta_categorias)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Receta Id') ?></th>
                <th><?= __('Categoria Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($receta->receta_categorias as $recetaCategorias): ?>
            <tr>
                <td><?= h($recetaCategorias->receta_id) ?></td>
                <td><?= h($recetaCategorias->categoria_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RecetaCategorias', 'action' => 'view', $recetaCategorias->receta_id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'RecetaCategorias', 'action' => 'edit', $recetaCategorias->receta_id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RecetaCategorias', 'action' => 'delete', $recetaCategorias->receta_id], ['confirm' => __('Are you sure you want to delete # {0}?', $recetaCategorias->receta_id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Receta Comentarios') ?></h4>
        <?php if (!empty($receta->receta_comentarios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Receta Id') ?></th>
                <th><?= __('Usuario Id') ?></th>
                <th><?= __('Fechahora') ?></th>
                <th><?= __('Texto') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($receta->receta_comentarios as $recetaComentarios): ?>
            <tr>
                <td><?= h($recetaComentarios->id) ?></td>
                <td><?= h($recetaComentarios->receta_id) ?></td>
                <td><?= h($recetaComentarios->usuario_id) ?></td>
                <td><?= h($recetaComentarios->fechahora) ?></td>
                <td><?= h($recetaComentarios->texto) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RecetaComentarios', 'action' => 'view', $recetaComentarios->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'RecetaComentarios', 'action' => 'edit', $recetaComentarios->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RecetaComentarios', 'action' => 'delete', $recetaComentarios->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recetaComentarios->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Receta Ingredientes') ?></h4>
        <?php if (!empty($receta->receta_ingredientes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Receta Id') ?></th>
                <th><?= __('Ingrediente Id') ?></th>
                <th><?= __('Cantidad') ?></th>
                <th><?= __('Medida') ?></th>
                <th><?= __('Notas') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($receta->receta_ingredientes as $recetaIngredientes): ?>
            <tr>
                <td><?= h($recetaIngredientes->id) ?></td>
                <td><?= h($recetaIngredientes->receta_id) ?></td>
                <td><?= h($recetaIngredientes->ingrediente_id) ?></td>
                <td><?= h($recetaIngredientes->cantidad) ?></td>
                <td><?= h($recetaIngredientes->medida) ?></td>
                <td><?= h($recetaIngredientes->notas) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RecetaIngredientes', 'action' => 'view', $recetaIngredientes->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'RecetaIngredientes', 'action' => 'edit', $recetaIngredientes->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RecetaIngredientes', 'action' => 'delete', $recetaIngredientes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recetaIngredientes->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Receta Pasos') ?></h4>
        <?php if (!empty($receta->receta_pasos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Receta Id') ?></th>
                <th><?= __('Orden') ?></th>
                <th><?= __('Descripcion') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($receta->receta_pasos as $recetaPasos): ?>
            <tr>
                <td><?= h($recetaPasos->id) ?></td>
                <td><?= h($recetaPasos->receta_id) ?></td>
                <td><?= h($recetaPasos->orden) ?></td>
                <td><?= h($recetaPasos->descripcion) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'RecetaPasos', 'action' => 'view', $recetaPasos->id]) ?>

                    <?= $this->Html->link(__('Edit'), ['controller' => 'RecetaPasos', 'action' => 'edit', $recetaPasos->id]) ?>

                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'RecetaPasos', 'action' => 'delete', $recetaPasos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $recetaPasos->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
