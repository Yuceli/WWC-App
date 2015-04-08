<?php 

/**
* MetaDataTrait for model
*/
trait MetaDataTrait {

	protected $fields = [];

	protected $primaryKey;

	public function getMetaData()
	{
		$metaData = $this->commander->getMetaData($this->table);
		foreach ($metaData as $data){
            array_push($this->fields, $data['Field']);
            if($data['Key'] === 'PRI'){
                $this->primaryKey = $data['Field'];
            }
        }
	}

	public function getPrimaryKey()
	{
		return $this->primaryKey;
	}

	public function getFields()
	{
		return $this->fields;
	}
}