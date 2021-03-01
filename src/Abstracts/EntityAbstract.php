<?php declare (strict_types = 1);

namespace LexofficeSdk\Abstracts;

use LexofficeSdk\Interfaces\EntityInterface;

abstract class EntityAbstract implements EntityInterface
{
    protected $relations = [];
    protected $relationsList = [];
    protected $valueList = [];
    public function __construct($data = null)
    {
        if ($data) {
            $this->setData($data);
        } else {
            $this->setDefaultData();
        }
    }
    /**
     * @param $data
     * @return self
     */
    public function setData($data): EntityInterface
    {
        foreach ($data as $key => $value) {
            try{
                if (!property_exists($this, $key)) {
                    trigger_error('the property ' . $key . ' does not exist in' . static::class);
                    continue;
                }
            }catch (\TypeError $e){
                #trigger_error('the property ' . $key . ' is not of type String in' . static::class);
            }

            if (array_key_exists($key, $this->relations)) {
                $this->{$key} = new $this->relations[$key]($value);
            } elseif (array_key_exists($key, $this->relationsList)) {
                foreach ($value as $i) {
                    array_push($this->{$key}, new $this->relationsList[$key]($i));
                }
            } elseif (array_key_exists($key, $this->valueList)) {
                foreach ($value as $i) {
                    array_push($this->{$key}, $i);
                }
            } else {
                $this->{$key} = $value;
            }
        }
        return $this;
    }

    public function setDefaultData(): void
    {
        foreach ($this->relations as $key => $value) {
            $this->{$key} = new $value();
        }
    }
}
