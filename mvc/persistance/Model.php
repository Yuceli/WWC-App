<?php 
/**
* Model class
* @author Arandi López <arandilopez.github.io>
*/

abstract class Model {
    protected $attributes = [];

    protected $fillable = [];

    protected $relations = [];

    public $table = '';

    protected $commander;

    protected $exist = false;

    use CallableTrait;
    use FillableTrait;
    use MetaDataTrait;
    use FindableTrait;
    use StorableTrait;
    use SerializableTrait;

    function __construct($data = false, $exist = false)
    {
        $this->commander = new DBCommand();
        if (empty($this->table)) {
            $this->table = lcfirst(get_class($this));
        }
        $this->getMetaData();
        if ($data) {
            $this->fill($data);
            $this->exist = $exist;
        }
    }
}