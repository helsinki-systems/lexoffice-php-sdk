<?php declare (strict_types = 1);

namespace LexofficeSdk\Contact;

use LexofficeSdk\Api\ApiClientInterface;
use LexofficeSdk\Contact\ContactEntity;

class ContactService
{
    const ENDPOINT = "contacts/";
    /**
     * @var ApiClientInterface
     */
    private $apiClient;

    public function __construct(ApiClientInterface $apiClient)
    {
        $this->apiClient = $apiClient;
    }

    /**
     * @var query
     * @return ContactEntity
     */
    public function getContact(string $id)
    {
        $response = json_decode($this->apiClient->get(self::ENDPOINT . $id)->getBody()->getContents());
        return new ContactEntity($response);
    }

    /**
     * @var query
     * @return array
     */
    public function getContacts(array $query = ['page' => 0, 'size' => 25])
    {
        $response = json_decode($this->apiClient->get(self::ENDPOINT, $query)->getBody()->getContents());

        $contacts = array();
        foreach ($response->content as $contact) {
            array_push($contacts, new ContactEntity($contact));
        }

        $response->content = $contacts;

        return $response;
    }

    public function createContact(ContactEntity $contact)
    {
        $response = $this->apiClient->post(self::ENDPOINT, json_encode($contact));
        return json_decode($response->getBody()->getContents());
    }
}
