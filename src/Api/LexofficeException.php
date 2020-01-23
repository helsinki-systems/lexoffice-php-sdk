<?php declare (strict_types = 1);

namespace LexofficeSdk\Api;

use Exception;

class LexofficeException extends Exception
{
    public function __toString()
    {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }

}
