<?php declare (strict_types = 1);

namespace LexofficeSdk\Contact;

class AddressEntity
{

    public $supplement;
    public $street;
    public $zip;
    public $city;
    public $countryCode;

    public function __construct($data = null)
    {
        if ($data) {
            $this->setData($data);
        } else {
            $this->countryCode = "DE";
        }
    }

    /**
     * @param $data
     * @return AddressEntity
     */
    public function setData($data): self
    {
        foreach ($data as $key => $value) {
            if (!property_exists($this, $key)) {
                trigger_error('the property ' . $key . ' does not exist in' . self::class);
                continue;
            }

            $this->{$key} = $value;

        }
        return $this;
    }
}
