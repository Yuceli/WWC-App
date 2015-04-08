<?php 

/**
* CallableTrait for model
*/
trait CallableTrait {

	public function __get($key)
    {
        if($key and isset($this->attributes[$key]))
        {
            return $this->attributes[$key];
        }
    }

    public function __set($key, $value)
    {
        if ($key and $value) 
        {
            $this->attributes[$key] = $value;
        }
    }
	
	 public function __call($name, $params)
    {
        throw new Exception("Undefined method $name"); 
    }

    public static function __callStatic($name, $params)
    {
        if (preg_match("/findBy/", $name)) {
        	$attribute = preg_replace("/findBy/", "", $name);
			return self::findBy(lcfirst($attribute), $params);
        }elseif (preg_match("/findAllBy/", $name)){
            $attribute = preg_replace("/findAllBy/", "", $name);
            return self::findAllBy(lcfirst($attribute), $params);
        }else{
            throw new Exception("No method found");
        }
    }
}