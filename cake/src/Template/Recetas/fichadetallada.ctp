<nav class="large-3 medium-1 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Datos útiles') ?></li>
        <li><?= __('Tipo Plato: ').'<b>'. $receta->mostrarTipo_plato($receta->tipo_plato)?></b></li>
        <li><?= __('Tiempo Elaboracion: ').'<b>'. $this->Number->format($receta->tiempo_elaboracion) ?> minutos</b></li>
        <li><?= __('Dificultad :').'<b>'. $receta->mostrarDificultad($this->Number->format($receta->dificultad))?></b></li>
        <li><?= __('Comensales :').'<b>'. $this->Number->format($receta->comensales)?></b></li>
        <li><?= __('Valoracion :').'<b>'. $receta->mostrarValoracion($this->Number->format($receta->valoracion))?></b></li>
        <li><?= __('Aceptada :').'<b>'. $receta->aceptada ? __('Si') : __('No');?></b></li>
        
        
        <li class="heading"><?= __('Ingredientes') ?></li>
         <?php if (!empty($receta->receta_ingredientes)): 
            foreach ($receta->receta_ingredientes as $recetaIngredientes): ?>
            <li>
                 <?= h($recetaIngredientes->cantidad) ?>
               <?= h($recetaIngredientes->medida) ?>
                  
                <?php  foreach ($ingredientes as $ingre): 
                    if($ingre->ingrediente->id == $recetaIngredientes->id) echo $ingre->ingrediente->nombre ; ?>
                <?php endforeach; ?>  
            </li>
            <?php endforeach; ?>
    <?php endif; ?>
        </ul>
</nav>
<div class="recetas view large-9 medium-8 columns content">
    
        <h4><?= h($receta->nombre); ?></h4>
    
   
    <div class="row">
        
        <?= $this->Text->autoParagraph(h($receta->descripcion)); ?>
    </div>
    <!--    
    <div class="related">
        <h4><?= __('Platos') ?></h4>
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
        <h4><?= __('Categorias') ?></h4>
        <?php if (!empty($receta->receta_categorias)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('receta_id') ?></th>
                <th><?= __('categoria_id') ?></th>
                
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
    -->
       

     
          <?php  /*var_dump($ingredientes);
  foreach ($ingredientes as $ingre): ?>
           
                <?php echo $ingre->ingrediente->nombre; ?>

  <?php endforeach; ?>

    
    <div class="related">
        <h4><?= __('Ingredientes') ?></h4>
        <?php if (!empty($receta->receta_ingredientes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Ingrediente') ?></th>
                <th><?= __('Cantidad') ?></th>
                <th><?= __('Medida') ?></th>
                <th><?= __('Notas') ?></th>
            </tr>
            <?php
            
            
            foreach ($receta->receta_ingredientes as $recetaIngredientes): ?>
            <tr>
                <td><?php  foreach ($ingredientes as $ingre): ?>
                    <?php if($ingre->ingrediente->id == $recetaIngredientes->id) echo $ingre->ingrediente->nombre ; ?>
                <?php endforeach; ?> </td>
                <td><?= h($recetaIngredientes->cantidad) ?></td>
                <td><?= h($recetaIngredientes->medida) ?></td>
                <td><?= h($recetaIngredientes->notas) ?></td>     
            </tr>
            <?php endforeach; ?>
        </table>
    <?php endif;*/ ?>
    <!--/div-->
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
     <?php include ("comentarios.ctp"); ?>
</div>
