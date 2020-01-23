<?php declare (strict_types = 1);

namespace LexofficeSdk\Contact;

use LexofficeSdk\Abstracts\EntityAbstract;

class CompanyContactPersonEntity extends EntityAbstract
{
    const HERR = 'Herr';
    const FRAU = 'Frau';

    public $salutation;
    public $firstName;
    public $lastName;
    public $emailAddress;
    public $phoneNumber;

}
