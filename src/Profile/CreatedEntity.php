<?php declare (strict_types = 1);

namespace LexofficeSdk\Profile;

class CreatedEntitiy
{
    public $userName;
    public $userEmail;
    public $date;

    public function __construct($data = null)
    {
        if ($data) {
            $this->setData($data);
        }
    }

    /**
     * @param $data
     * @return CreatedEntitiy
     */
    public function setData($data): self
    {
        foreach ($data as $key => $value) {
            if (!property_exists($this, $key)) {
                trigger_error('the property ' . $key . ' does not exist in' . self::class);
                continue;
            }

            $this->{$key} = (string) $value;

        }
        return $this;
    }
}
