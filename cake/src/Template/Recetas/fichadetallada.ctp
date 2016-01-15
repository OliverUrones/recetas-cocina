
<div class="recetas view large-9 medium-8 columns content">
    
        <h4><?= h($receta->nombre); ?></h4>
    <table class="vertical-table">
        <tr>
            <th><?= __('Tipo Plato') ?></th>
            <td><?= $receta->mostrarTipo_plato($receta->tipo_plato)?></td>
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
        <h4><?= __('Descripcion') ?></h4>
        <?= $this->Text->autoParagraph(h($receta->descripcion)); ?>
    </div>
    <div class="related">
       <!-- <h4><?= __('Related Menu Platos') ?></h4>-->
        <?php if (!empty($receta->menu_platos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Menu Id') ?></th>
                <th><?= __('Receta Id') ?></th>
                <th class="actions"><?= __('Acciones') ?></th>
            </tr>
            <?php foreach ($receta->menu_platos as $menuPlatos): ?>
            <tr>
                <td><?= h($menuPlatos->menu_id) ?></td>
                <td><?= h($menuPlatos->receta_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['controller' => 'MenuPlatos', 'action' => 'view', $menuPlatos->menu_id]) ?>

                    <?= $this->Html->link(__('Editar'), ['controller' => 'MenuPlatos', 'action' => 'edit', $menuPlatos->menu_id]) ?>

                    <?= $this->Form->postLink(__('Eliminar'), ['controller' => 'MenuPlatos', 'action' => 'delete', $menuPlatos->menu_id], ['confirm' => __('Esta seguro que la desea eliminar # {0}?', $menuPlatos->menu_id)]) ?>

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
                <th class="actions"><?= __('Acciones') ?></th>
            </tr>
            <?php foreach ($receta->receta_categorias as $recetaCategorias): ?>
            <tr>
                <td><?= h($recetaCategorias->receta_id) ?></td>
                <td><?= h($recetaCategorias->categoria_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['controller' => 'RecetaCategorias', 'action' => 'view', $recetaCategorias->receta_id]) ?>

                    <?= $this->Html->link(__('Editar'), ['controller' => 'RecetaCategorias', 'action' => 'edit', $recetaCategorias->receta_id]) ?>

                    <?= $this->Form->postLink(__('Eliminar'), ['controller' => 'RecetaCategorias', 'action' => 'delete', $recetaCategorias->receta_id], ['confirm' => __('Esta seguro que la desea eliminar # {0}?', $recetaCategorias->receta_id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Comentarios') ?></h4>
        <?php if (!empty($receta->receta_comentarios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Receta Id') ?></th>
                <th><?= __('Usuario Id') ?></th>
                <th><?= __('Fechahora') ?></th>
                <th><?= __('Texto') ?></th>
                <th class="actions"><?= __('Acciones') ?></th>
            </tr>
            <?php foreach ($receta->receta_comentarios as $recetaComentarios): ?>
            <tr>
                <td><?= h($recetaComentarios->id) ?></td>
                <td><?= h($recetaComentarios->receta_id) ?></td>
                <td><?= h($recetaComentarios->usuario_id) ?></td>
                <td><?= h($recetaComentarios->fechahora) ?></td>
                <td><?= h($recetaComentarios->texto) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('Ver'), ['controller' => 'RecetaComentarios', 'action' => 'view', $recetaComentarios->id]) ?>

                    <?= $this->Html->link(__('Editar'), ['controller' => 'RecetaComentarios', 'action' => 'edit', $recetaComentarios->id]) ?>

                    <?= $this->Form->postLink(__('Eliminar'), ['controller' => 'RecetaComentarios', 'action' => 'delete', $recetaComentarios->id], ['confirm' => __('Esta seguro que la desea eliminar # {0}?', $recetaComentarios->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Ingredientes') ?></h4>
        <?php if (!empty($receta->receta_ingredientes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Receta Id') ?></th>
                <th><?= __('Ingrediente Id') ?></th>
                <th><?= __('Cantidad') ?></th>
                <th><?= __('Medida') ?></th>
                <th><?= __('Notas') ?></th>
                <th class="actions"><?= __('Acciones') ?></th>
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
                    <?= $this->Html->link(__('Ver'), ['controller' => 'RecetaIngredientes', 'action' => 'view', $recetaIngredientes->id]) ?>

                    <?= $this->Html->link(__('Editar'), ['controller' => 'RecetaIngredientes', 'action' => 'edit', $recetaIngredientes->id]) ?>

                    <?= $this->Form->postLink(__('Eliminar'), ['controller' => 'RecetaIngredientes', 'action' => 'delete', $recetaIngredientes->id], ['confirm' => __('Esta seguro que la desea eliminar # {0}?', $recetaIngredientes->id)]) ?>

                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Pasos') ?></h4>
        <?php if (!empty($receta->receta_pasos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
               <th><?= __('Orden') ?></th>
                <th><?= __('Descripcion') ?></th>
                <th> <?= __('imagenes') ?></th>
            </tr>
            <?php foreach ($pasos as $recetaPasos): ?>
            <tr>
                <td><?= h($recetaPasos->orden) ?></td>
                <td><?= h($recetaPasos->descripcion) ?></td>
                 <?php foreach ($recetaPasos->receta_paso_imagenes as $recetaPasoImagenes): ?>
            
              
                
                       <td> <img src="<?= h($recetaPasoImagenes->imagen) ?>"height="82" width="152" /></td>
               
          
                        <?php endforeach; ?>
          
                
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
