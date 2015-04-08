<?php 

/**
* FillableTrait for model
*/
trait FillableTrait {

    protected function isFillable($key)
    {
        if (in_array($key, $this->fields)) {
            return true;
        }else{
            return false;
        }
    }

    protected function fill($attributes)
    {
        foreach ($attributes as $attribute => $value) {
            if ($this->isFillable($attribute)) {
                $this->setAttribute($attribute, $value);
            }
        }
    }

    protected function fillDirty($attributes)
    {
        foreach ($attributes as $key => $value) {
            $fillable = $this->fillable;
            $this->setAttribute($fillable[$key], $value);
        }
    }

    protected function setAttribute($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    protected function getAttribute($name)
    {
        return $this->attributes[$name];
    }

    public function getAttributes()
    {
        return $this->attributes;
    }

    public function getFillables()
    {
        return $this->fillable;
    }
}