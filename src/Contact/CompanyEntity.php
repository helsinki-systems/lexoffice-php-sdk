<?php declare (strict_types = 1);

namespace LexofficeSdk\Contact;

use LexofficeSdk\Contact\CompanyContactPersonEntity;

class CompanyEntity
{
    public $allowTaxFreeInvoices;
    public $name;
    public $taxNumber;
    public $vatRegistrationId;

    /**
     * @var CompanyContactPersonEntity[]
     */
    public $contactPersons = array();

    public function __construct($data = null)
    {
        if ($data) {
            $this->setData($data);
        } else {
            array_push($this->contactPersons, new CompanyContactPersonEntity());
        }
    }

    /**
     * @param $data
     * @return CompanyEntity
     */
    public function setData($data): self
    {
        foreach ($data as $key => $value) {
            if (!property_exists($this, $key)) {
                trigger_error('the property ' . $key . ' does not exist in' . self::class);
                continue;
            }

            switch ($key) {
                case 'contactPersons':
                    foreach ($value as $contact) {
                        array_push($this->{$key}, new CompanyContactPersonEntity($contact));
                    }
                    break;
                default:
                    $this->{$key} = $value;
                    break;
            }
        }
        return $this;
    }
}
