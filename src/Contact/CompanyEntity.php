<?php declare (strict_types = 1);

namespace LexofficeSdk\Contact;

use LexofficeSdk\Abstracts\EntityAbstract;
use LexofficeSdk\Contact\CompanyContactPersonEntity;

class CompanyEntity extends EntityAbstract
{
    public $allowTaxFreeInvoices;
    public $name;
    public $taxNumber;
    public $vatRegistrationId;

    /**
     * @var CompanyContactPersonEntity[]
     */
    public $contactPersons = array();

    protected $relationsList = [
        'contactPersons' => CompanyContactPersonEntity::class,
    ];

    public function setDefaultData(): void
    {
        array_push($this->contactPersons, new CompanyContactPersonEntity());
    }
}
