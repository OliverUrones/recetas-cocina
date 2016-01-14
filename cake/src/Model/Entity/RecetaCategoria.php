<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * RecetaCategoria Entity.
 *
 * @property int $id * @property int $receta_id * @property \App\Model\Entity\Receta $receta * @property int $categoria_id * @property \App\Model\Entity\Categoria $categoria */
class RecetaCategoria extends Entity
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
