<?php declare (strict_types = 1);

namespace LexofficeSdk\Invoice;

use LexofficeSdk\Abstracts\EntityAbstract;
use LexofficeSdk\Invoice\PaymentDiscountConditionEntity;

class PaymentConditionEntity extends EntityAbstract
{
    public $paymentTermLabel;
    public $paymentTermDuration;

    /**
     * @var PaymentDiscountConditionEntity[]
     */
    public $paymentDiscountConditions = array();

    protected $relationList = [
        'paymentDiscountConditions' => PaymentDiscountConditionEntity::class,
    ];
}
