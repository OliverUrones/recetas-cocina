<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PlanificacioneMenu Entity.
 *
 * @property int $id
 * @property int $planificacione_id
 * @property \App\Model\Entity\Planificacione $planificacione
 * @property int $menu_id
 * @property \App\Model\Entity\Menu $menu
 * @property int $numero_dia
 */
class PlanificacioneMenu extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
	
	 public static function dia($numero_dia){
		$lista=array("lunes","martes","miercoles","jueves","viernes","sabado","domingo");
		return $lista[$numero_dia];
	 }
	 
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
