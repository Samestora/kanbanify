<?php 


class Lists extends Model {
	
	public function __construct() {
		$table = 'lists';
		parent::__construct($table);
	}
	
	
	public function findByBoardId($boardID) {
		$resultsQuery = $this->find(['expresssions' => "*", 'conditions' => "board_id = ?", 'bind' => [$boardID]]);
		return $resultsQuery;
	}
	
}