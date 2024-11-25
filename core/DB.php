<?php


class DB {
	private static $_instance = null;
	private $_pdo, $_query, $_result, $_count = 0, $_error = false, $_lastInsertID = null, $_errMsg;
	
	private function __construct() {
		try {
			$this->_pdo = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
			//$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			//$this->_pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->_pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		} catch(PDOException $e) {
			die ($e->getMessage());
		}
	}
	
	
	
	public static function getInstance() {
		if (!isset(self::$_instance)) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	
	
	public function query($sql, $params=[], $class=false) {
		$this->_error = false;
		if ($this->_query = $this->_pdo->prepare($sql)) {
			$x = 1;
			if (count($params)) {
				foreach ($params as $param) {
					$this->_query->bindValue($x, $param);
					$x++;
				}
			}
			
			if ($this->_query->execute()) {
				if ($class) {
						$this->_result = $this->_query->fetchAll(PDO::FETCH_CLASS, $class);
					} else {
						$this->_result = $this->_query->fetchAll(PDO::FETCH_ASSOC);
					}
				$this->_count = $this->_query->rowCount();
				$this->_lastInsertID = $this->_pdo->lastInsertId();
				//H::d($this->_lastInsertID);
			} else {
				$this->_error = true;
				$this->_errMsg = "DB Error: Execute failed";
			}
			
			
		} else {
			$this->_error = true;
			$this->_errMsg = "DB Error: Prepare failed";
		}
		return $this;
	}
	
	
	
	protected function _read($table='', $params=[], $class=false) {	
		$expressionString = '';
		$conditionString = '';
		$bind = [];
		$order = '';
		$limit = '';
		
		
		//expressions
		if (isset($params['expressions']) && !empty($params['expressions'])) {
			$expressionString = $params['expressions'];
		} else {
			$expressionString = '*';
		}
		
		
		
		//conditions
		if (isset($params['conditions']) && !empty($params['conditions'])) {
			$conditionString = " WHERE {$params['conditions']}";
		}

		
		//bind
		if (is_array($params) && array_key_exists('bind', $params)) {
			$bind = $params['bind'];
		}
		
		//order
		if (is_array($params) && array_key_exists('order', $params)) {
			$order = ' ORDER BY ' . $params['order'];
		}
		
		//limit
		if (is_array($params) && array_key_exists('limit', $params)) {
				$limit = ' LIMIT ' . $params['limit'];
		}
		
		$sql = "SELECT {$expressionString} FROM {$table}{$conditionString}{$order}{$limit}";
		
		if ($this->query($sql, $bind, $class)) {
			if (!count($this->_result)) return false;
			return true;
		}
		return false;
	}
	
	
	
	public function find($table, $params=[], $class=false) {
		if ($this->_read($table, $params, $class)) {
			return $this->result();
		}
		return false;
	}
	
	
	
	public function findFirst($table, $params = [], $class=false) {
		if ($this->_read($table, $params, $class)) {
			return $this->first();
		}
		return false;
	}

	
	public function insert($table, $fields = []) {
		$fieldString = '';
		$valueString = '';
		$values = [];
		
		foreach ($fields as $field => $value) {
			$fieldString .= '`' . $field . '`,';
			$valueString .= "?,";
			$values[] = $value;
		}
		
		$fieldString = rtrim($fieldString, ',');
		$valueString = rtrim($valueString, ',');
		
		$sql = "INSERT INTO {$table} ({$fieldString}) VALUES ({$valueString})";
		//H::dnd($sql);
		
		if (!$this->query($sql, $values)->error()) {
			return true;
		} else {
			$this->errMsg();
			return false;
		}
	}
	
	
	
	public function delete($table, $id) {
		$sql = "DELETE FROM {$table} WHERE id = {$id}";
		//H::d($sql);
		if (!$this->query($sql)->error()) {
			return true;
		} else {
			$this->errMsg();
			return false;
		}
	}
	
	
	public function update($table, $id, $fields = []) {		
		$fieldString = '';
		$values = [];
		
		foreach ($fields as $field => $value) {
			$fieldString .= ' ' . $field . ' = ?,';
			$values[] = $value;
		}
		
		$fieldString = trim($fieldString);
		$fieldString = rtrim($fieldString, ',');
		
		$sql = "UPDATE {$table} SET {$fieldString} WHERE id = {$id}";
		
		if (!$this->query($sql, $values)->error()) {
			return true;
		} else {
			$this->errMsg();
			return false;
		}
	}
	
	
	
	
	public function result() {
		return $this->_result;
	}

	public function first() {
		return $this->_result[0] ?? [];
	}

	public function count() {
		return $this->_count;
	}

	public function lastInsertID() {
		return $this->_lastInsertID;
	}

	public function getColumns($table) {
		return $this->query("SHOW COLUMNS FROM {$table}")->result();
	}

	public function error() {
		return $this->_error;
	}
	
	
	public function errMsg() {
		echo $this->_errMsg;
	}
		
	
}
























