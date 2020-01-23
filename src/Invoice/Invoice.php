<?php declare (strict_types = 1);

namespace LexofficeSdk\Invoice;

use LexofficeSdk\Abstracts\EntityAbstract;
use LexofficeSdk\Invoice\AddressEntity;
use LexofficeSdk\Invoice\FilesEntity;
use LexofficeSdk\Invoice\LineItemEntity;
use LexofficeSdk\Invoice\PaymentConditionEntity;
use LexofficeSdk\Invoice\ShippingConditionEntity;
use LexofficeSdk\Invoice\TaxAmountEntity;
use LexofficeSdk\Invoice\TaxContitionEntity;
use LexofficeSdk\Invoice\TotalPriceEntity;

class Invoice extends EntityAbstract
{
    public $id;
    public $organizationId;
    public $createdDate;
    public $updatedDate;
    public $version;
    public $language;
    public $archived;
    public $voucherStatus;
    public $voucherNumber;
    public $voucherDate;
    public $dueDate;

    /**
     * @var AddressEntity
     */
    public $address;

    /**
     * @var LineItemEntity[]
     */
    public $lineItems = array();

    /**
     * @var TotalPriceEntity
     */
    public $totalPrice;

    /**
     * @var TaxAmountEntity[]
     */
    public $taxAmounts = array();

    /**
     * @var TaxContitionEntity
     */
    public $taxConditions;

    /**
     * @var PaymentConditionEntity
     */
    public $paymentConditions;

    /**
     * @var ShippingConditionEntity
     */
    public $shippingConditions;

    public $title;
    public $introduction;
    public $remark;

    /**
     * @var FilesEntity
     */
    public $files;

    protected $relations = [
        'address' => AddressEntity::class,
        'totalPrice' => TotalPriceEntity::class,
        'taxConditions' => TaxContitionEntity::class,
        'paymentConditions' => PaymentConditionEntity::class,
        'shippingConditions' => ShippingConditionEntity::class,
        'files' => FilesEntity::class,
    ];

    protected $relationsList = [
        'lineItems' => LineItemEntity::class,
        'taxAmounts' => TaxAmountEntity::class,
    ];
}
