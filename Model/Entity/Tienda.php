<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tienda Entity.
 *
 * @property int $id
 * @property string $nombre
 * @property string $domicilio
 * @property string $poblacion
 * @property string $provincia
 * @property int $usuario_id
 * @property \App\Model\Entity\Usuario $usuario
 * @property bool $activa
 * @property bool $visible
 * @property \App\Model\Entity\TiendaOferta[] $tienda_ofertas
 */
class Tienda extends Entity
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
