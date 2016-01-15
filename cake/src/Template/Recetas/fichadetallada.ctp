<div class="recetas view large-9 medium-8 columns content">
    <h3><?= h($receta->nombre) ?></h3>
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
            <td><?= $receta->aceptada ? __('Si') : __('No'); ?></td>
         </tr>
    </table>
   
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
               
            </tr>
            <?php foreach ($receta->menu_platos as $menuPlatos): ?>
            <tr>
                <td><?= h($menuPlatos->menu_id) ?></td>
                <td><?= h($menuPlatos->receta_id) ?></td>
               
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Categorias relacionadas') ?></h4>
        <?php if (!empty($receta->receta_categorias)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Receta Id') ?></th>
                <th><?= __('Categoria Id') ?></th>
                
            </tr>
            <?php foreach ($receta->receta_categorias as $recetaCategorias): ?>
            <tr>
                <td><?= h($recetaCategorias->receta_id) ?></td>
                <td><?= h($recetaCategorias->categoria_id) ?></td>
               
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
                
            </tr>
            <?php foreach ($receta->receta_comentarios as $recetaComentarios): ?>
            <tr>
                <td><?= h($recetaComentarios->id) ?></td>
                <td><?= h($recetaComentarios->receta_id) ?></td>
                <td><?= h($recetaComentarios->usuario_id) ?></td>
                <td><?= h($recetaComentarios->fechahora) ?></td>
                <td><?= h($recetaComentarios->texto) ?></td>
                
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
               
            </tr>
            <?php foreach ($receta->receta_ingredientes as $recetaIngredientes): ?>
            <tr>
                <td><?= h($recetaIngredientes->id) ?></td>
                <td><?= h($recetaIngredientes->receta_id) ?></td>
                <td><?= h($recetaIngredientes->ingrediente_id) ?></td>
                <td><?= h($recetaIngredientes->cantidad) ?></td>
                <td><?= h($recetaIngredientes->medida) ?></td>
                <td><?= h($recetaIngredientes->notas) ?></td>
               
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
    
    <div class="related">
        <h4><?= __('Pasos elaboración de la receta') ?></h4>
        <?php if (!empty($receta->receta_pasos)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>

                <th><?= __('Orden') ?></th>
                <th><?= __('Descripcion') ?></th>
                 <th><?= __('Imagenes del paso') ?></th>
            </tr>
            <?php foreach ($receta->receta_pasos as $recetaPasos): ?>
            <tr>
                <td><?= h($recetaPasos->orden) ?></td>
                <td><?= h($recetaPasos->descripcion) ?></td>
                <td>
                 <?php
                 
                 foreach ($pasos->receta_paso_imagenes as $recetaPasoImagenes): ?>
            <tr>
              
               
                <td><img src="<?= h($recetaPasoImagenes->imagen) ?>"height="82" width="152" /></td>
                
            </tr>
            <?php endforeach; ?>
                
                </td>
               
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    </div>
</div>
