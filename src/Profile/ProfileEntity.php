<?php declare (strict_types = 1);

namespace LexofficeSdk\Profile;

use LexofficeSdk\Profile\CreatedEntity;

class ProfileEntity
{
    public $organizationId;

    public $companyName;

    /**
     * @var CreatedEntity
     */
    public $created;

    public $connectionId;

    public $taxType;

    public $smallBusiness;

    public function __construct($data = null)
    {
        if ($data) {
            $this->setData($data);
        }
    }

    /**
     * @param $data
     * @return ProfileEntity
     */
    public function setData($data): self
    {
        foreach ($data as $key => $value) {
            if (!property_exists($this, $key)) {
                trigger_error('the property ' . $key . ' does not exist in' . self::class);
                continue;
            }

            switch ($key) {
                case 'created':
                    $this->{$key} = $value;
                    break;
                default:
                    $this->{$key} = (string) $value;
                    break;
            }
        }
        return $this;
    }
}
