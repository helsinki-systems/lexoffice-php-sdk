<?php declare (strict_types = 1);

namespace LexofficeSdk\Invoice;

use LexofficeSdk\Abstracts\EntityAbstract;

class ShippingConditionEntity extends EntityAbstract
{
    public $shippingDate;
    public $shippingEndDate;
    public $shippingType;
}
