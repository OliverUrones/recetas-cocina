<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RecetaPasoImagene Entity.
 *
 * @property int $id
 * @property int $receta_paso_id
 * @property \App\Model\Entity\RecetaPaso $receta_paso
 * @property int $orden
 * @property string $imagen
 */
class RecetaPasoImagene extends Entity
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
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
