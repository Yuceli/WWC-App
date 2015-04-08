<?php 

/**
* SerializableTrait for model
*/
trait SerializableTrait {
	
	public function __toArray()
    {
        $modelArray = [];
        foreach ($this->fillable as $fill) {
            $modelArray[$fill] = $this->attributes[$fill];
        }
        return $modelArray;
    }

    public function __toJson()
    {
        
    }
}