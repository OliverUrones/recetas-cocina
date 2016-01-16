<div class="related">
        <h4><?= __('Comentarios') ?></h4>
        <?php if (!empty($receta->receta_comentarios)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Usuario') ?></th>
                <th><?= __('Fecha') ?></th>
                <th><?= __('Opinión') ?></th>
                
            </tr>
            <?php foreach ($receta->receta_comentarios as $recetaComentarios): ?>
            <tr>
                <td>
                   <?php  foreach ($comentarios as $comen): ?>
                    <?php if($comen->usuario->id == $recetaComentarios->id) echo $comen->usuario->nombre ; ?>
                <?php endforeach; ?> </td>

                <td><?= h($recetaComentarios->fechahora) ?></td>
                <td><?= h($recetaComentarios->texto) ?></td>
                
            </tr>
            <?php endforeach; ?>
            
             
            
        </table>
    <?php endif; ?>
    </div>