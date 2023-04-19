<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SearchBookHistory Entity
 *
 * @property string $id
 * @property \Cake\I18n\FrozenTime $search_datetime
 * @property string $search_word
 * @property string $search_result
 */
class SearchBookHistory extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'search_datetime' => true,
        'search_word' => true,
        'search_result' => true,
    ];
}
