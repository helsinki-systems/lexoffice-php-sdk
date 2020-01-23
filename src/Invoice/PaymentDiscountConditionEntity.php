<?php declare (strict_types = 1);

namespace LexofficeSdk\Invoice;

use LexofficeSdk\Abstracts\EntityAbstract;

class PaymentDiscountConditionEntity extends EntityAbstract
{
    public $discountPercentage;
    public $discountRange;
}
