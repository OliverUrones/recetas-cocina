<?php return array (
  'Categorias' => 
  array (
    0 => 
    array (
      'id' => 1,
      'nombre' => 'Categoría 1',
      'descripcion' => 'Categoría Uno',
      'categoria_id' => 0,
    ),
    1 => 
    array (
      'id' => 2,
      'nombre' => 'Categoría 2',
      'descripcion' => 'Categoría Dos',
      'categoria_id' => 1,
    ),
  ),
  'Ingredientes' => 
  array (
    0 => 
    array (
      'id' => 1,
      'nombre' => 'Ingrediente 1',
      'descripcion' => 'Ingrediente Uno',
      'datos_nutricion' => 'Una Caloría',
    ),
    1 => 
    array (
      'id' => 2,
      'nombre' => 'Ingrediente2',
      'descripcion' => 'Ingrediente Dos',
      'datos_nutricion' => 'Dos Calorías',
    ),
  ),
  'MenuPlatos' => 
  array (
    0 => 
    array (
      'menu_id' => 1,
      'receta_id' => 2,
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
      'titulo' => 'Menú 1',
      'descripcion' => 'Menú Uno',
      'usuario_id' => 1,
    ),
    1 => 
    array (
      'id' => 2,
      'titulo' => 'Menú 2',
      'descripcion' => 'Menú Dos',
      'usuario_id' => 1,
    ),
  ),
  'PlanificacionMenus' => 
  array (
  ),
  'Planificaciones' => 
  array (
  ),
  'RecetaCategorias' => 
  array (
  ),
  'RecetaComentarios' => 
  array (
  ),
  'RecetaIngredientes' => 
  array (
  ),
  'RecetaPasoImagenes' => 
  array (
  ),
  'RecetaPasos' => 
  array (
  ),
  'Recetas' => 
  array (
    0 => 
    array (
      'id' => 1,
      'nombre' => 'Receta 1',
      'descripcion' => 'Receta Uno',
      'tipo_plato' => '1',
      'dificultad' => false,
      'comensales' => true,
      'tiempo_elaboracion' => 0,
      'valoracion' => true,
      'usuario_id' => 0,
      'aceptada' => true,
    ),
    1 => 
    array (
      'id' => 2,
      'nombre' => 'Receta 2',
      'descripcion' => 'Receta Dos',
      'tipo_plato' => '2',
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
      'descripcion' => 'Descripción de la oferta de la tienda uno',
      'envase' => 'Envase del ingrediente uno de la oferta de la tienda uno',
      'cantidad' => 62.340000000000003,
      'medida' => 'ml',
      'notas' => 'Notas de la oferta de la tienda uno',
    ),
    1 => 
    array (
      'id' => 2,
      'tienda_id' => 2,
      'ingrediente_id' => 1,
      'descripcion' => 'Descripción de la oferta de la tienda dos',
      'envase' => 'Envase del ingrediente uno de la oferta de la tienda dos',
      'cantidad' => 78.900000000000006,
      'medida' => 'ml',
      'notas' => 'Notas de la oferta de la tienda dos',
    ),
  ),
  'Tiendas' => 
  array (
    0 => 
    array (
      'id' => 1,
      'nombre' => 'Tienda Uno',
      'domicilio' => 'Domicilio Tienda Uno ',
      'poblacion' => 'Población Tienda Uno',
      'provincia' => 'Provincia Tienda Uno',
      'usuario_id' => 4,
      'activa' => true,
      'visible' => true,
    ),
    1 => 
    array (
      'id' => 2,
      'nombre' => 'Lazarito',
      'domicilio' => 'Plaza Mayor 3',
      'poblacion' => 'Moraleja del Vino',
      'provincia' => 'Zamora',
      'usuario_id' => 4,
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
      'password' => '$2y$10$2QZ4Q4iQIKObGr0hRE47TOCr8ha/Wc.s.KWqAlQyJwodgSd.k.SS2',
      'nombre' => 'Admin',
      'rol' => 'A',
      'aceptado' => true,
      'creado' => 
      Cake\I18n\Time::__set_state(array(
         'date' => '2016-01-12 13:11:00.000000',
         'timezone_type' => 3,
         'timezone' => 'UTC',
      )),
    ),
    1 => 
    array (
      'id' => 2,
      'email' => 'Oliver.Urones@usal.es',
      'password' => '$2y$10$L5NHmn62P2RrirNrOF5ah.ZvpGcsHc4MfW4JPLUfwvYlQtmW9Pcc.',
      'nombre' => 'Oliver Urones García',
      'rol' => 'C',
      'aceptado' => true,
      'creado' => 
      Cake\I18n\Time::__set_state(array(
         'date' => '2016-01-12 13:13:00.000000',
         'timezone_type' => 3,
         'timezone' => 'UTC',
      )),
    ),
  ),
);