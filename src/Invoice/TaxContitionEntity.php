<?php declare (strict_types = 1);

namespace LexofficeSdk\Invoice;

use LexofficeSdk\Abstracts\EntityAbstract;

class TaxContitionEntity extends EntityAbstract
{
    const NET = 'net';
    const GROSS = 'gross';
    const VATFREE = 'vatfree';
    const INTRACOMMUNITYSUPPLY = 'intraCommunitySupply';
    const CONSTRUCTIONSERVICE13B = 'constructionService13b';
    const EXTERNALSERVICE13B = 'externalService13b';
    const THIRDPARTYCOUNTRYSERVICE = 'thirdPartyCountryService';
    const THIRDPARTYCOUNTRYDELIVERY = 'thirdPartyCountryDelivery';

    public $taxType;
    public $taxTypeNote;
}
