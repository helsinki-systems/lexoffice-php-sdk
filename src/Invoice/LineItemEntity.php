<?php declare (strict_types = 1);

namespace LexofficeSdk\Invoice;

use LexofficeSdk\Abstracts\EntityAbstract;
use LexofficeSdk\Invoice\UnitPriceEntity;

class LineItemEntity extends EntityAbstract
{
    public $id;
    public $type;
    public $name;
    public $description;
    public $quantity;
    public $unitName;
    /**
     * @var UnitPriceEntity
     */
    public $unitPrice;
    public $discountPercentage;
    public $lineItemAmount;

    protected $relations = [
        'unitPrice' => UnitPriceEntity::class,
    ];
}
