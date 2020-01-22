<?php declare (strict_types = 1);

namespace LexofficeSdk\Contact;

use LexofficeSdk\Contact\AddressEntity;

class AddressesEntity
{
    /**
     * @var AddressEntity[]
     */
    public $billing = array();

    /**
     * @var AddressEntity[]
     */
    public $shipping = array();

    public function __construct($data = null)
    {
        if ($data) {
            $this->setData($data);
        }
    }

    /**
     * @param $data
     * @return AddressesEntity
     */
    public function setData($data): self
    {
        foreach ($data as $key => $value) {
            if (!property_exists($this, $key)) {
                trigger_error('the property ' . $key . ' does not exist in' . self::class);
                continue;
            }

            switch ($key) {
                case 'shipping':
                case 'billing':
                    foreach ($value as $address) {
                        array_push($this->{$key}, new AddressEntity($address));
                    }
                    break;
                default:
                    break;
            }

        }
        return $this;
    }
}
