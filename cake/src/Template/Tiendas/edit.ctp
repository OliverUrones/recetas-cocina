<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Form->postLink(
                __('Borrar Tienda'),
                ['action' => 'delete', $tienda->id],
                ['confirm' => __('¿Estas seguro que desea borrar # {0}?', $tienda->nombre)]
            )
        ?></li>
        <li><?= $this->Html->link(__('Listar Tiendas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Listar Ofertas'), ['controller' => 'TiendaOfertas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nueva Oferta'), ['controller' => 'TiendaOfertas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tiendas form large-9 medium-8 columns content">
    <?= $this->Form->create($tienda) ?>
    <fieldset>
        <legend>Edición <?= h($tienda->nombre) ?></legend>
        <?php
            $usuario= $this->request->session()->read('Auth.User');
            if ($usuario['rol']=='A')
            {
                echo $this->Form->input('usuario_id',['options' => $nusu]);
            }
            echo $this->Form->input('nombre');
            echo $this->Form->input('domicilio');
            echo $this->Form->input('poblacion');
            echo $this->Form->input('provincia');
			$usuario= $this->request->session()->read('Auth.User');
            if ($usuario['rol']=='A')
            {
                echo $this->Form->input('activa');
            }
            echo $this->Form->input('visible');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Modificar')) ?>
    <?= $this->Form->end() ?>
</div>
