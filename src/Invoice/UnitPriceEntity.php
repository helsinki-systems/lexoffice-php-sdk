<?php declare (strict_types = 1);

namespace LexofficeSdk\Invoice;

use LexofficeSdk\Abstracts\EntityAbstract;

class UnitPriceEntity extends EntityAbstract
{
    public $currency = "EUR";
    public $netAmount;
    public $grossAmount;
    public $taxRatePercentage;
}
