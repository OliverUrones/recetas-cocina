<div class="usuarios form large-9 medium-8 columns content">
    <h3><?= __('Copia de Seguridad') ?></h3>
    <?= $this->Form->create() ?>
    <fieldset>
        <legend>Tablas</legend>
        <?php
            echo '<table>';
                echo '<tr>';
                echo '<td>';
                echo $this->Form->Label('Categorías');
                echo '</td>';
                echo '<td>';
                echo $this->Form->checkbox('Categorias', ['checked' => true, 'id' => 'categorias']);
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td>';
                echo $this->Form->Label('Ingredientes');
                echo '</td>';
                echo '<td>';
                echo $this->Form->checkbox('Ingredientes', ['checked' => true, 'id' => 'ingredientes']);
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td>';
                echo $this->Form->Label('Menu-Platos');
                echo '</td>';
                echo '<td>';
                echo $this->Form->checkbox('MenuPlatos', ['checked' => true, 'id' => 'menu-platos']);
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td>';
                echo $this->Form->Label('Menus');
                echo '</td>';
                echo '<td>';
                echo $this->Form->checkbox('Menus', ['checked' => true, 'id' => 'menus']);
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td>';
                echo $this->Form->Label('Planificación-Menús');
                echo '</td>';
                echo '<td>';
                echo $this->Form->checkbox('PlanificacionMenus', ['checked' => true, 'id' => 'planificacion-menus']);
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td>';
                echo $this->Form->Label('Planificaciones');
                echo '</td>';
                echo '<td>';
                echo $this->Form->checkbox('Planificaciones', ['checked' => true, 'id' => 'planificaciones']);
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td>';
                echo $this->Form->Label('Receta-Categorías');
                echo '</td>';
                echo '<td>';
                echo $this->Form->checkbox('RecetaCategorias', ['checked' => true, 'id' => 'receta-categorias']);
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td>';
                echo $this->Form->Label('Receta-Comentarios');
                echo '</td>';
                echo '<td>';
                echo $this->Form->checkbox('RecetaComentarios', ['checked' => true, 'id' => 'receta-comentarios']);
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td>';
                echo $this->Form->Label('Receta-Ingredientes');
                echo '</td>';
                echo '<td>';
                echo $this->Form->checkbox('RecetaIngredientes', ['checked' => true, 'id' => 'receta-ingredientes']);
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td>';
                echo $this->Form->Label('Receta-Paso-Imágenes');
                echo '</td>';
                echo '<td>';
                echo $this->Form->checkbox('RecetaPasoImagenes', ['checked' => true, 'id' => 'receta-paso-imagenes']);
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td>';
                echo $this->Form->Label('Receta-Pasos');
                echo '</td>';
                echo '<td>';
                echo $this->Form->checkbox('RecetaPasos', ['checked' => true, 'id' => 'receta-pasos']);
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td>';
                echo $this->Form->Label('Recetas');
                echo '</td>';
                echo '<td>';
                echo $this->Form->checkbox('Recetas', ['checked' => true, 'id' => 'recetas']);
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td>';
                echo $this->Form->Label('Tienda-Ofertas');
                echo '</td>';
                echo '<td>';
                echo $this->Form->checkbox('TiendaOfertas', ['checked' => true, 'id' => 'tienda-ofertas']);
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td>';
                echo $this->Form->Label('Tiendas');
                echo '</td>';
                echo '<td>';
                echo $this->Form->checkbox('Tiendas', ['checked' => true, 'id' => 'tiendas']);
                echo '</td>';
                echo '</tr>';
                
                echo '<tr>';
                echo '<td>';
                echo $this->Form->Label('Usuarios');
                echo '</td>';
                echo '<td>';
                echo $this->Form->checkbox('Usuarios', ['checked' => true, 'id' => 'usuarios']);
                echo '</td>';
                echo '</tr>';
                                
            echo '</table>';

        ?>
        <?= $this->Form->button(__('Crear')) ?>
        <?= $this->Form->end() ?>
    </fieldset>
</div>