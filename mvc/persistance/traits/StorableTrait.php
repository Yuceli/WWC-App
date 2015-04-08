<?php

/**
* StorableTrait
* @author Arandi López <arandilopez.github.io>
*/
trait StorableTrait {
	
	public function saveInCsv()
	{
		$csv = new CSVDataAccess();
        $data = $this->__toArray();
        $csv->write($data);
	}

	public static function create(array $data)
	{
		$instance = new static($data);
        $instance->save();
        return $instance;
	}

	public function save()
	{
		if (!$this->exist) {
			$id = $this->commander->insert($this);
            $this->{$this->getPrimaryKey()} = $id;
            $this->exist = true;
		}else{
			$this->update();
		}
	}

	public function delete()
	{
		$this->commander->delete($this);
	}

	public function update()
	{
        $id = $this->commander->update($this);
	}
}