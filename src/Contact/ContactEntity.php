<?php declare (strict_types = 1);

namespace LexofficeSdk\Contact;

use LexofficeSdk\Contact\AddressesEntity;
use LexofficeSdk\Contact\EmailAddressesEntity;
use LexofficeSdk\Contact\PhoneNumbersEntity;
use LexofficeSdk\Contact\RolesEntity;

class ContactEntity
{
    public $id;
    public $organizationId;
    public $version;

    /**
     * @var RolesEntity
     */
    public $roles;

    /**
     * @var CompanyEntity
     */
    public $company;

    /**
     * @var PersonEntity
     */
    public $person;

    /**
     * @var AddressesEntity
     */
    public $addresses;

    /**
     * @var EmailAddressesEntity
     */
    public $emailAddresses;

    /**
     * @var PhoneNumbersEntity
     */
    public $phoneNumbers;
    public $note;
    public $archived;

    public function __construct($data = null)
    {
        if ($data) {
            $this->setData($data);
        } else {
            $this->setDefaultData();
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
                case 'roles':
                    $this->{$key} = new RolesEntity($value);
                    break;
                case 'company':
                    $this->{$key} = new CompanyEntity($value);
                    break;
                case 'person':
                    $this->{$key} = new PersonEntity($value);
                    break;
                case 'addresses':
                    $this->{$key} = new AddressesEntity($value);
                    break;
                case 'emailAddresses':
                    $this->{$key} = new EmailAddressesEntity($value);
                    break;
                case 'phoneNumbers':
                    $this->{$key} = new PhoneNumbersEntity($value);
                    break;
                default:
                    $this->{$key} = $value;
                    break;
            }
        }
        return $this;
    }

    private function setDefaultData()
    {
        $this->version = 0;
        $this->roles = new RolesEntity();
        $this->person = new PersonEntity();
        $this->addresses = new AddressesEntity();
        $this->emailAddresses = new EmailAddressesEntity();
        $this->phoneNumbers = new PhoneNumbersEntity();
    }
}
