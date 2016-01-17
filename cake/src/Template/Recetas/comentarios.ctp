<div class="related">
        <h4><?= __('Comentarios') ?></h4>
        <?php if (!empty($receta->receta_comentarios)): ?>
            <?php foreach ($receta->receta_comentarios as $recetaComentarios): ?>
                   <?php  foreach ($comentarios as $comen): ?>
                    <?php if($comen->usuario->id == $recetaComentarios->id) ?>
                [<?= h($recetaComentarios->fechahora)?>]
                <b><?= h($comen->usuario->nombre)  ?> dice:</b><br/>
                <i><?= h($recetaComentarios->texto) ?></i>
   
                <?php endforeach; ?> 
            <?php endforeach; ?>   
    <?php endif; ?>
    </div>