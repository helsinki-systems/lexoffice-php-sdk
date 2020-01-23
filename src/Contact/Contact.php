<?php declare (strict_types = 1);

namespace LexofficeSdk\Contact;

use LexofficeSdk\Abstracts\EntityAbstract;
use LexofficeSdk\Contact\AddressesEntity;
use LexofficeSdk\Contact\EmailAddressesEntity;
use LexofficeSdk\Contact\PhoneNumbersEntity;
use LexofficeSdk\Contact\RolesEntity;

class Contact extends EntityAbstract
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

    protected $relations = [
        'roles' => RolesEntity::class,
        'company' => CompanyEntity::class,
        'person' => PersonEntity::class,
        'addresses' => AddressesEntity::class,
        'emailAddresses' => EmailAddressesEntity::class,
        'phoneNumbers' => PhoneNumbersEntity::class,
    ];

    public function setDefaultData(): void
    {
        $this->version = 0;
        $this->roles = new RolesEntity();
        $this->person = new PersonEntity();
        $this->addresses = new AddressesEntity();
        $this->emailAddresses = new EmailAddressesEntity();
        $this->phoneNumbers = new PhoneNumbersEntity();
    }
}
