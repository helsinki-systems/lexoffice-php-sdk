<?php declare (strict_types = 1);

namespace LexofficeSdk\Contact;

use LexofficeSdk\Abstracts\ServiceAbstract;
use LexofficeSdk\Contact\Contact;
use LexofficeSdk\Interfaces\ApiClientInterface;

class ContactService extends ServiceAbstract
{

    public function __construct(ApiClientInterface $apiClient)
    {
        parent::__construct($apiClient, "contacts/", Contact::class);
    }
}
