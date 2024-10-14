<?php declare (strict_types = 1);

namespace LexofficeSdk\EventSubscription;

use LexofficeSdk\Abstracts\EntityAbstract;

class EventSubscription extends EntityAbstract
{
    public $eventType;
    public $callbackUrl;
}
