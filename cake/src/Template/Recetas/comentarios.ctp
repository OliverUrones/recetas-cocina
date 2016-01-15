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