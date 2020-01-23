<?php declare (strict_types = 1);

namespace LexofficeSdk\Invoice;

use LexofficeSdk\Abstracts\EntityAbstract;

class TotalPriceEntity extends EntityAbstract
{
    public $currency = "EUR";
    public $totalNetAmount;
    public $totalGrossAmount;
    public $totalTaxAmount;
    public $totalDiscountAbsolute;
    public $totalDiscountPercentage;
}
