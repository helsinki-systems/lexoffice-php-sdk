<?php declare (strict_types = 1);

namespace LexofficeSdk\Contact;

class CompanyContactPersonEntity
{
    const HERR = 'Herr';
    const FRAU = 'Frau';

    public $salutation;
    public $firstName;
    public $lastName;
    public $emailAddress;
    public $phoneNumber;

    public function __construct($data = null)
    {
        if ($data) {
            $this->setData($data);
        }
    }

    /**
     * @param $data
     * @return CompanyContactPersonEntity
     */
    public function setData($data): self
    {
        foreach ($data as $key => $value) {
            if (!property_exists($this, $key)) {
                trigger_error('the property ' . $key . ' does not exist in' . self::class);
                continue;
            }
            $this->{$key} = (string) $value;

        }
        return $this;
    }
}
