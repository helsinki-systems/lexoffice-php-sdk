<?php declare (strict_types = 1);

namespace LexofficeSdk\Contact;

class EmailAddressesEntity
{
    /**
     * @var array
     */
    public $business = array();

    /**
     * @var array
     */
    public $office = array();

    /**
     * @var array
     */
    public $private = array();

    /**
     * @var array
     */
    public $other = array();

    public function __construct($data = null)
    {
        if ($data) {
            $this->setData($data);
        }
    }

    /**
     * @param $data
     * @return EmailAddressesEntity
     */
    public function setData($data): self
    {
        foreach ($data as $key => $value) {
            if (!property_exists($this, $key)) {
                trigger_error('the property ' . $key . ' does not exist in' . self::class);
                continue;
            }

            foreach ($value as $emailAddress) {
                array_push($this->{$key}, $emailAddress);
            }

        }
        return $this;
    }

}
