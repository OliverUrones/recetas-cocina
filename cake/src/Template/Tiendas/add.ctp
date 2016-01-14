<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Menu') ?></li>
        <li><?= $this->Html->link(__('Lista de Tiendas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Lista de Ofertas'), ['controller' => 'TiendaOfertas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Nueva Oferta'), ['controller' => 'TiendaOfertas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tiendas form large-9 medium-8 columns content">
    <?= $this->Form->create($tienda) ?>
    <fieldset>
        <legend><?= __('Add Tienda') ?></legend>
        <?php
		$usuario= $this->request->session()->read('Auth.User');
		
            echo $this->Form->input('nombre');
            echo $this->Form->input('domicilio');
            echo $this->Form->input('poblacion');
            echo $this->Form->input('provincia');
           
			if ($usuario['rol']=='A')
			{	echo $this->Form->input('activa');
			
				echo $this->Form->input('visible');
			}
        ?>
    </fieldset>
    <?= $this->Form->button(__('Añadir')) ?>
    <?= $this->Form->end() ?>
</div>
