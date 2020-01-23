<?php declare (strict_types = 1);

namespace LexofficeSdk\Profile;

use LexofficeSdk\Abstracts\EntityAbstract;
use LexofficeSdk\Profile\CreatedEntity;

class Profile extends EntityAbstract
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

}
