<?php declare (strict_types = 1);

namespace LexofficeSdk\Contact;

use LexofficeSdk\Abstracts\EntityAbstract;
use LexofficeSdk\Contact\AddressEntity;

class AddressesEntity extends EntityAbstract
{
    /**
     * @var AddressEntity[]
     */
    public $billing = array();

    /**
     * @var AddressEntity[]
     */
    public $shipping = array();

    protected $relations = [
        'billing' => AddressEntity::class,
        'shipping' => AddressEntity::class,
    ];

}
