<?php


class Model {
	protected $_db, $_table, $_modelName, $_validates = true, $_validationErrors=[];
	public $id;
	
	
	public function __construct($table) {
		$this->_db = DB::getInstance();
		$this->_table = $table;
		$this->_modelName = str_replace(' ', '', ucwords(str_replace('_', ' ', $this->_table)));
	}
	
	public function getModelName() {
		return $this->_modelName;
	}
	
	
	public function getLastInsertID() {
		return $this->_db->lastInsertID();
	}
	
	public function getColumns() {
		return $this->_db->getColumns($this->_table);
	}
	
	
	public function find($params=[], $class=false) {
		$resultsQuery = $this->_db->find($this->_table, $params, $class);
		if (!$resultsQuery) return false; // []
		return $resultsQuery;
	}
	
	
	public function findFirst($params=[], $class=false) {
		$resultQuery = $this->_db->findFirst($this->_table, $params, $class);
		if (!$resultQuery) return false;
		return $resultQuery;
	}

	
	public function findById($id) {
		return $this->findFirst(['expressions' => "*", 'conditions' => "id = ?", 'bind' => [$id]]);
	}
	
	
	public function insert($fields) {
		if (empty($fields)) return false;
		return $this->_db->insert($this->_table, $fields);
	}
	
	
	public function update($fields, $id) {
		if (empty($fields)) return false;
		return $this->_db->update($this->_table, $fields, $id);
	}
	
	
	public function delete($id='') {
		if ($id == '') return false;
		return $this->_db->delete($this->_table, $id);
		//soft delete
	}
	
	
	public function assign($params) {
		if (!empty($params)) {
		 foreach ($params as $key => $val) {
			 if (property_exists($this, $key)) {
				 $this->$key = $val;
			 }
		 }
		 return true;
		}
		return false;
	}
	
	
	
	
	public function save() {
		$fields = H::getObjectProperties($this);
		// determine whether to update or insert
		if(property_exists($this, 'id') && $this->id != '') {
			$save = $this->update($fields, $this->id);
			return $save;
		} else {
			unset($fields['id']);
			$save = $this->insert($fields);
			return $save;
		}
  }
	
	
	
	
	
	public function getErrorMessages(){
		return $this->_validationErrors;
	}

	public function validationPassed(){
		return $this->_validates;
	}

	public function addErrorMessage($msg){
		$this->_validates = false;
		$this->_validationErrors[] = $msg;
	}
	
	
	
}