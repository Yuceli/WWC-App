<?php

/**
* DBCommand class
*/
class DBCommand {

	function __construct()
	{

	}

	private function query($sql, $values = [])
	{
        $pdo = DBConnection::getConnection();
		$stmt = $pdo->prepare($sql);
		$stmt->execute($values);

		//if($stmt->rowCount() === 1) return $stmt->fetch(PDO::FETCH_ASSOC);
		if($stmt->rowCount() >= 1) return $stmt->fetchAll(PDO::FETCH_ASSOC);
		$pdo = null;
		return false; // No results
	}

	private function queryOne($sql, $values)
	{
		$pdo = DBConnection::getConnection();
		$stmt = $pdo->prepare($sql);
		$stmt->execute($values);

		if($stmt->rowCount() === 1) return $stmt->fetch(PDO::FETCH_ASSOC);
		if($stmt->rowCount() > 1) return $stmt->fetchAll(PDO::FETCH_ASSOC);
		$pdo = null;
		return false; // No results
	}

    private function executeInsertOrUpdate($query, $values)
    {
        $pdo = DBConnection::getConnection();
        $stm = $pdo->prepare($query);
        $stm->execute($values);
        $id = $pdo->lastInsertId();
        $pdo = null;
        return $id;
    }

	public function execute($query, $values)
	{
        return $this->query($query, $values);
	}

	public function insert(Model $model)
	{
		$queryBuilder = new QueryBuilder();
        $fillables = array_diff($model->getFields(), array($model->getPrimaryKey()));
		$queryBuilder->insert($model->table, $fillables);
		$queryBuilder->values($fillables);
        $query = $queryBuilder->build();
        $values = array_diff($model->getAttributes(), array($model->getPrimaryKey() => $model->{$model->getPrimaryKey()}));
        return $this->executeInsertOrUpdate($query, $values);
	}

	public function delete(Model $model)
	{
		$queryBuilder = new QueryBuilder();
		$queryBuilder->delete($model->table)->where("{$model->getPrimaryKey()} = {$model->{$model->getPrimaryKey()}}");
		$query = $queryBuilder->build();

		$pdo = DBConnection::getConnection();
		$pdo->exec($query);
		$id = $pdo->lastInsertId();

		$pdo = null;

		return $id;
	}

	public function select($table, $condition = false, $values = false)
	{
		$queryBuilder = new QueryBuilder();
		$queryBuilder->select()->from($table);
		if ($condition) {
			$queryBuilder->where($condition);
		}
		$query = $queryBuilder->build();
		return $this->execute($query, $values);
	}

	public function selectOne($table, $condition = false, $values = false)
	{
		$queryBuilder = new QueryBuilder();
		$queryBuilder->select()->from($table);
		if ($condition) {
			$queryBuilder->where($condition);
		}
		$query = $queryBuilder->limit(1)->build();
		return $this->queryOne($query, $values);
	}

    public function selectAll($table)
    {
        $queryBuilder = new QueryBuilder();
        $query = $queryBuilder->select()->from($table)->build();
        return $this->execute($query, array());
    }

	public function update(Model $model)
	{
        $queryBuilder = new QueryBuilder();
        $fillables = array_diff($model->getAttributes(), array($model->getPrimaryKey() => $model->{$model->getPrimaryKey()}));
        $queryBuilder->update($model->table)->set($fillables)->where("{$model->table}.{$model->getPrimaryKey()} = {$model->{$model->getPrimaryKey()}}");
        $query = $queryBuilder->build();
        $values = array_diff($model->getAttributes(), array($model->getPrimaryKey() => $model->{$model->getPrimaryKey()}));
		//var_dump($query); exit();
        return $this->executeInsertOrUpdate($query, $values);
	}

	public function getMetaData($table)
	{
		try{
            $pdo = DBConnection::getConnection();
			$query = "SHOW COLUMNS FROM $table";
			$stm = $pdo->prepare($query);
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_ASSOC);
		}catch(Exception $e){
			echo $e->getMessage();
		}
		
	}

}
