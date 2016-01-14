<?php return array (
  'Categorias' => 
  array (
    0 => 
    array (
      'id' => 1,
      'nombre' => 'Categoría 1',
      'descripcion' => 'Categoría Uno',
      'categoria_padre_id' => 0,
    ),
    1 => 
    array (
      'id' => 2,
      'nombre' => 'Categoría 2',
      'descripcion' => 'Categoría Dos',
      'categoria_padre_id' => 1,
    ),
  ),
  'Ingredientes' => 
  array (
    0 => 
    array (
      'id' => 1,
      'nombre' => 'Ingrediente 1',
      'descripcion' => 'Ingrediente Uno',
      'datos_nutricion' => 'asdfcvbtr srth',
    ),
    1 => 
    array (
      'id' => 2,
      'nombre' => 'Ingrediente2',
      'descripcion' => 'Ingrediente Dos',
      'datos_nutricion' => 'Datos Nutrición ingrediente Dos',
    ),
  ),
  'MenuPlatos' => 
  array (
    0 => 
    array (
      'menu_id' => 1,
      'receta_id' => 1,
    ),
    1 => 
    array (
      'menu_id' => 2,
      'receta_id' => 1,
    ),
  ),
  'Menus' => 
  array (
    0 => 
    array (
      'id' => 1,
      'titulo' => 'Título Menú Uno',
      'descripcion' => 'Descripción Menú Uno',
      'usuario_id' => 1,
    ),
    1 => 
    array (
      'id' => 2,
      'titulo' => 'Título Menu Dos',
      'descripcion' => 'Descripción Menú Dos',
      'usuario_id' => 1,
    ),
  ),
  'PlanificacionMenus' => 
  array (
    0 => 
    array (
      'id' => 1,
      'planificacion_id' => 2,
      'menu_id' => 2,
      'numero_dia' => 6,
    ),
    1 => 
    array (
      'id' => 2,
      'planificacion_id' => 1,
      'menu_id' => 2,
      'numero_dia' => 3,
    ),
  ),
  'Planificaciones' => 
  array (
    0 => 
    array (
      'id' => 1,
      'nombre' => 'Planificación Uno',
      'periodo' => 'Periodo Planificación Uno',
      'usuario_id' => 1,
      'notas' => 'Notas Planificación Uno',
    ),
    1 => 
    array (
      'id' => 2,
      'nombre' => 'Planificación Dos',
      'periodo' => 'Periodo Planificación Dos',
      'usuario_id' => 1,
      'notas' => 'Notas Planificación Dos',
    ),
  ),
  'RecetaComentarios' => 
  array (
    0 => 
    array (
      'id' => 1,
      'receta_id' => 1,
      'usuario_id' => 1,
      'fechahora' => 
      Cake\I18n\Time::__set_state(array(
         'date' => '2016-01-14 00:00:00.000000',
         'timezone_type' => 3,
         'timezone' => 'UTC',
      )),
      'texto' => 'Comentario de la receta Uno',
    ),
    1 => 
    array (
      'id' => 2,
      'receta_id' => 2,
      'usuario_id' => 1,
      'fechahora' => 
      Cake\I18n\Time::__set_state(array(
         'date' => '2016-01-16 00:00:00.000000',
         'timezone_type' => 3,
         'timezone' => 'UTC',
      )),
      'texto' => 'Comentario de la Receta Dos',
    ),
  ),
  'RecetaIngredientes' => 
  array (
    0 => 
    array (
      'id' => 1,
      'receta_id' => 1,
      'ingrediente_id' => 1,
      'cantidad' => 0,
      'medida' => '323asdf',
      'notas' => 'nbmyuxcgh',
    ),
    1 => 
    array (
      'id' => 2,
      'receta_id' => 1,
      'ingrediente_id' => 2,
      'cantidad' => 75673600,
      'medida' => NULL,
      'notas' => 'vzxiuoi57t8k fr67n rftgz',
    ),
  ),
  'RecetaPasoImagenes' => 
  array (
    0 => 
    array (
      'id' => 1,
      'receta_paso_id' => 1,
      'orden' => 0,
      'imagen' => '/tmp/img.jpg',
    ),
    1 => 
    array (
      'id' => 2,
      'receta_paso_id' => 1,
      'orden' => 2,
      'imagen' => '/tmp/img2.png',
    ),
  ),
  'RecetaPasos' => 
  array (
    0 => 
    array (
      'id' => 1,
      'receta_id' => 2,
      'orden' => 1,
      'descripcion' => 'fdgw456',
    ),
    1 => 
    array (
      'id' => 2,
      'receta_id' => 2,
      'orden' => 2,
      'descripcion' => 'vbzxcfvh65 46y zasdfbhcd bhdhb',
    ),
  ),
  'Recetas' => 
  array (
    0 => 
    array (
      'id' => 1,
      'nombre' => 'Nombre Receta uno',
      'descripcion' => 'Descripción Receta Uno',
      'tipo_plato' => '2',
      'dificultad' => false,
      'comensales' => true,
      'tiempo_elaboracion' => 0,
      'valoracion' => true,
      'usuario_id' => 1,
      'aceptada' => true,
    ),
    1 => 
    array (
      'id' => 2,
      'nombre' => 'Nombre Receta Dos',
      'descripcion' => 'Descripción Receta Dos',
      'tipo_plato' => 'E',
      'dificultad' => false,
      'comensales' => true,
      'tiempo_elaboracion' => 0,
      'valoracion' => true,
      'usuario_id' => 0,
      'aceptada' => true,
    ),
  ),
  'TiendaOfertas' => 
  array (
    0 => 
    array (
      'id' => 1,
      'tienda_id' => 1,
      'ingrediente_id' => 1,
      'descripcion' => 'Oferta ID 1',
      'envase' => 'Envase de la oferta ID Uno',
      'cantidad' => 5345.2299999999996,
      'medida' => '354ml',
      'notas' => NULL,
    ),
    1 => 
    array (
      'id' => 2,
      'tienda_id' => 2,
      'ingrediente_id' => 1,
      'descripcion' => 'cvsdfbg',
      'envase' => 'sdfgdf sdfge45 ',
      'cantidad' => 3432,
      'medida' => '23cm3',
      'notas' => 'Nota de la oferta Dos',
    ),
  ),
  'Tiendas' => 
  array (
    0 => 
    array (
      'id' => 1,
      'nombre' => 'Tienda Uno',
      'domicilio' => 'Domicilio Tienda Uno',
      'poblacion' => 'Población Tienda Uno',
      'provincia' => 'Provincia Tienda Uno',
      'usuario_id' => 1,
      'activa' => true,
      'visible' => true,
    ),
    1 => 
    array (
      'id' => 2,
      'nombre' => 'Tienda Dos',
      'domicilio' => 'Domicilio Tienda Dos',
      'poblacion' => 'Población Tienda Dos',
      'provincia' => 'Provincia Tienda Dos',
      'usuario_id' => 1,
      'activa' => true,
      'visible' => true,
    ),
  ),
  'Usuarios' => 
  array (
    0 => 
    array (
      'id' => 1,
      'email' => 'admin@admin.es',
      'password' => '$2y$10$LCEFSOiRqUrVLET3macDQ.3ZwYmtMpQtqFWR.Oz56w6hLu1T6kHKS',
      'nombre' => 'Admin',
      'rol' => 'A',
      'aceptado' => true,
      'creado' => 
      Cake\I18n\Time::__set_state(array(
         'date' => '2015-12-08 20:07:00.000000',
         'timezone_type' => 3,
         'timezone' => 'UTC',
      )),
    ),
  ),
);