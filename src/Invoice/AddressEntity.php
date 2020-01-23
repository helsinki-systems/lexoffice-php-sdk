<?php declare (strict_types = 1);

namespace LexofficeSdk\Invoice;

use LexofficeSdk\Abstracts\EntityAbstract;

class AddressEntity extends EntityAbstract
{
    public $contactId;
    public $name;
    public $supplement;
    public $street;
    public $city;
    public $zip;
    public $countryCode;
}
