<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Receta Entity.
 *
 * @property int $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $tipo_plato
 * @property bool $dificultad
 * @property bool $comensales
 * @property int $tiempo_elaboracion
 * @property bool $valoracion
 * @property int $usuario_id
 * @property \App\Model\Entity\Usuario $usuario
 * @property bool $aceptada
 * @property \App\Model\Entity\MenuPlato[] $menu_platos
 * @property \App\Model\Entity\RecetaCategoria[] $receta_categorias
 * @property \App\Model\Entity\RecetaComentario[] $receta_comentarios
 * @property \App\Model\Entity\RecetaIngrediente[] $receta_ingredientes
 * @property \App\Model\Entity\RecetaPaso[] $receta_pasos
 */
class Receta extends Entity
{
	
	
	/*
	
	Nombre, Descripción, Tipo Plato (E=Entrantes, 1=Primeros, 2=Segundos, P=Postres),
	Ingredientes, Dificultad recomendada (1=Muy Facil, ..., 5=Muy Dificil), 
	Dificultad por votacion, Comensales, Tiempo Elaboración, Pasos, Imagenes, Comentarios, Categoria/as.,
	Valoración (1=Peor, ..., 5=Mejor), Usuario, Aceptada 
	*/

   public static function dificultad()
   {
	 
	   $lista= [
			1=>'1 - Muy fácil',
			2=>'2 - Fácil',
			3=>'3 - Media',
			4=>'4 - Difícil',
			5=>'5 - Muy Difícil',

	   ];
		return $lista;
   }

   
   
   public static function tipo_plato()
   {
	 
	   $lista= [
			'E'=>'Entrantes',
			1=>'Primeros',
			2=>'Segundos',
			'P'=>'Postres',
			'O'=>'Otros',

	   ];
		return $lista;
   }
   
   
      public static function valoracion()
   {
	 
	   $lista= [
			1=>' *',
			2=>' **',
			3=>' ***',
			4=>' ****',
			5=>' *****',

	   ];
		return $lista;
   }

   


    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
