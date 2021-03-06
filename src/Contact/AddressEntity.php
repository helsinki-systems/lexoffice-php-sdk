<?php declare (strict_types = 1);

namespace LexofficeSdk\Contact;

use LexofficeSdk\Abstracts\EntityAbstract;

class AddressEntity extends EntityAbstract
{

    public $supplement;
    public $street;
    public $zip;
    public $city;
    public $countryCode;

    public function setDefaultData(): void
    {
        $this->countryCode = "DE";
    }
}
