<?php
namespace LexofficeSdk\Contact;

use LexofficeSdk\Abstracts\EntityAbstract;
use LexofficeSdk\Contact\CustomerEntity;
use LexofficeSdk\Contact\VendorEntity;

class RolesEntity extends EntityAbstract
{
    /**
     * @var CustomerEntity
     */
    public $customer;

    /**
     * @var VendorEntity
     */
    public $vendor;

    public function setDefaultData(): void
    {
        $this->customer = new CustomerEntity();
    }
}
