<?php declare (strict_types = 1);

namespace LexofficeSdk\Contact;

class PhoneNumbersEntity
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
    public $mobile = array();

    /**
     * @var array
     */
    public $private = array();

    /**
     * @var array
     */
    public $fax = array();

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
     * @return PhoneNumbersEntity
     */
    public function setData($data): self
    {
        foreach ($data as $key => $value) {
            if (!property_exists($this, $key)) {
                trigger_error('the property ' . $key . ' does not exist in' . self::class);
                continue;
            }

            foreach ($value as $phoneNumber) {
                array_push($this->{$key}, $phoneNumber);
            }

        }
        return $this;
    }

}
