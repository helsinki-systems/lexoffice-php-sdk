<?php declare (strict_types = 1);

namespace LexofficeSdk\Contact;

use LexofficeSdk\Abstracts\EntityAbstract;

class EmailAddressesEntity extends EntityAbstract
{
    /**
     * @var array
     */
    public $business = array();

    /**
     * @var array
     */
    public $office = array();

    /**
     * @var array
     */
    public $private = array();

    /**
     * @var array
     */
    public $other = array();

    protected $valueList = [
        'business', 'office', 'private', 'other',
    ];
}
