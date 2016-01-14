<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TiendaOferta Entity.
 *
 * @property int $id * @property int $tienda_id * @property \App\Model\Entity\Tienda $tienda * @property int $ingrediente_id * @property \App\Model\Entity\Ingrediente $ingrediente * @property string $descripcion * @property string $envase * @property float $cantidad * @property string $medida * @property string $notas */
class TiendaOferta extends Entity
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
