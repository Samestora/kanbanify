<?php 


class Cards extends Model {
	
	public function __construct() {
		$table = 'cards';
		parent::__construct($table);
	}
	
	public function findByListId($listID) {
		$resultsQuery = $this->find(['expressions' => "*", 'conditions' => "list_id = ?", 'bind' => [$listID]]);
		return $resultsQuery;
	}
	
	
	public function findDescription($cardID) {
		$resultsQuery = $this->findFirst(['expressions' => "description", 'conditions' => "id = ?", 'bind' => [$cardID]]);
		return $resultsQuery;
	}
}