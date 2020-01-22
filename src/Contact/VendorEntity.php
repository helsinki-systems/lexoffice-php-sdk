<?php
namespace LexofficeSdk\Contact;

class VendorEntity
{
    public $number;

    public function __construct($data = null)
    {
        if ($data) {
            $this->setData($data);
        }
    }

    /**
     * @param $data
     * @return VendorEntity
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
