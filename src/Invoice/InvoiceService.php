<?php declare (strict_types = 1);

namespace LexofficeSdk\Invoice;

use LexofficeSdk\Abstracts\ServiceAbstract;
use LexofficeSdk\Interfaces\ApiClientInterface;
use LexofficeSdk\Invoice\Invoice;

class InvoiceService extends ServiceAbstract
{

    public function __construct(ApiClientInterface $apiClient)
    {
        parent::__construct($apiClient, "invoices/", Invoice::class);
    }
}
