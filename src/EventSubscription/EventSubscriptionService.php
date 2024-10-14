<?php declare (strict_types = 1);

namespace LexofficeSdk\EventSubscription;

use LexofficeSdk\Abstracts\ServiceAbstract;
use LexofficeSdk\Interfaces\ApiClientInterface;
use LexofficeSdk\EventSubscription\EventSubscription;

class EventSubscriptionService extends ServiceAbstract
{

    public function __construct(ApiClientInterface $apiClient)
    {
        parent::__construct($apiClient, "event-subscriptions/", EventSubscription::class);
    }
}
