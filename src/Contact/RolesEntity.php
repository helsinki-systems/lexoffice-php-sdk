<?php
namespace LexofficeSdk\Contact;

use LexofficeSdk\Contact\CustomerEntity;
use LexofficeSdk\Contact\VendorEntity;

class RolesEntity
{
    /**
     * @var CustomerEntity
     */
    public $customer;

    /**
     * @var VendorEntity
     */
    public $vendor;

    public function __construct($data = null)
    {
        if ($data) {
            $this->setData($data);
        } else {
            $this->customer = new CustomerEntity();
        }
    }

    /**
     * @param $data
     * @return ContactEntity
     */
    public function setData($data): self
    {
        foreach ($data as $key => $value) {
            if (!property_exists($this, $key)) {
                trigger_error('the property ' . $key . ' does not exist in' . self::class);
                continue;
            }

            switch ($key) {
                case 'customer':
                    $this->{$key} = new CustomerEntity($value);
                    break;
                case 'vendor':
                    $this->{$key} = new VendorEntity($value);
                    break;
            }
        }
        return $this;
    }
}
