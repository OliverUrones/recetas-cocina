<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Acciones') ?></li>
        <li><?= $this->Html->link(__('Listar Recetas'), ['action' => 'index']) ?></li>
       
    </ul>
</nav>
<div class="recetas form large-9 medium-8 columns content">
    <?= $this->Form->create($receta) ?>
    <fieldset>
        <legend><?= __('Crear Receta') ?></legend>
        <?php
            echo $this->Form->input('nombre');
            echo $this->Form->input('descripcion');
            echo $this->Form->input('tipo_plato', ['type' => 'select', 'options'=>\App\model\Entity\Receta::tipo_plato(),'empty'=>'Seleccionar']);
            echo $this->Form->input('dificultad' , ['type' => 'select', 'options'=>\App\model\Entity\Receta::dificultad(),'empty'=>'Seleccionar']);
             echo $this->Form->input('comensales', ['type' => 'select', 'options' => [1=>1,2=>2,4=>4,6=>6,8=>8], 'empty' => false]);
            echo $this->Form->input('tiempo_elaboracion');
            $usuario= $this->request->session()->read('Auth.User');
           
            echo $this->Form->input('valoracion', ['type' => 'select', 'options'=>\App\model\Entity\Receta::valoracion(),'empty'=>'Seleccionar']);
             if($usuario['rol']=='A'){
            echo $this->Form->input('aceptada');
            }
        ?>
    </fieldset>
    <?= $this->Form->button(__('Enviar')) ?>
    <?= $this->Form->end() ?>
</div>
