<?php

/**
* Database Query Builder
*/
class QueryBuilder {

	public $pdo = null;
	protected $selects;
	protected $table;
	protected $query;

	public function select($value = '*')
	{
		$this->query = "SELECT $value ";
		return $this;
	}

	public function from($table)
	{
		$this->query .= "FROM $table";
		$this->table = $table;
		return $this;
	}

	public function insert($table='', $columns)
	{
		$columnsString = implode(',', $columns);
		$this->query = "INSERT INTO $table ($columnsString)";
		return $this;
	}

	public function values($values)
	{
        $vals = array_map(function($g){
            return ':'.$g;
        }, $values);

		$valuesString = implode(',', $vals);
		$this->query .= " VALUES ($valuesString)";
		return $this;
	}

	public function delete($table='')
	{
		$this->query = "DELETE FROM $table ";
		return $this;
	}

	public function where($condition)
	{
		$this->query .= " WHERE $condition";
	}

	public function update($table='')
	{
		$this->query = "UPDATE $table";
		return $this;
	}

	public function set($values)
	{
        $stm = "";
        foreach($values as $key => $v) {
            $stm .= ",$key = :$key";
        }
		$s = trim($stm, ',');
		$this->query .= " SET $s";
		return $this;
	}

	public function limit($i)
	{
		$this->query .= " LIMIT $i";
		return $this;
	}

	public function build()
	{
		return $this->query.";";
	}
}