<?php 

/**
* FindableTrait for objects
 * @autor Arandi Lopez
*/
trait FindableTrait {

    /**
    *   @deprecated Don't use this
    */
	public static function findAllInCsv()
	{
		$csv = new CSVDataAccess();
        $data = $csv->read();
        $users = array();
        foreach ($data as $d) {
            $user = new static($d, true);
            array_push($users, $user);
        }

        return $users;
	}

    public static function all()
    {
        $instance = new static;
        $modelDatas = $instance->commander->selectAll($instance->table);
        $models = array();
        foreach($modelDatas as $modelData){
            $model = new static($modelData, true);
            array_push($models, $model);
        }
        return $models;
    }

    public static function find($id)
    {
        $instance = new static;
        $modelData = $instance->commander->selectOne($instance->table, "{$instance->getPrimaryKey()} = ?", array($id));
        return new static($modelData, true);
    }

    public static function findAllBy($attribute, $value)
    {
        $instance = new static;
        $modelDatas = $instance->commander->select($instance->table, "$attribute = ?", $value);
        $models = array();
        foreach ($modelDatas as $data) {
            $model = new static($data, true);
            array_push($models, $model);
        }

        return $models;
    }

    public static function findBy($attribute, $value)
    {
        $instance = new static;
        $modelData = $instance->commander->selectOne($instance->table, "$attribute = ?", $value);
        return new static($modelData, true);
    }

}