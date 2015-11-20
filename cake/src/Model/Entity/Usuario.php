<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Usuario Entity.
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $nombre
 * @property string $rol
 * @property bool $aceptado
 * @property \Cake\I18n\Time $creado
 * @property \App\Model\Entity\Menu[] $menus
 * @property \App\Model\Entity\Planificacione[] $planificaciones
 * @property \App\Model\Entity\RecetaComentario[] $receta_comentarios
 * @property \App\Model\Entity\Receta[] $recetas
 * @property \App\Model\Entity\Tienda[] $tiendas
 */
class Usuario extends Entity
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
