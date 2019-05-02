<?php 


class CardComments extends Model {
	
	public function __construct() {
		$table = 'card_comments';
		parent::__construct($table);
	}
	
	public function findByCardId($cardID) {
		$resultsQuery = $this->find(['expresssions' => "*", 'conditions' => "card_id = ?", 'bind' => [$cardID]]);
		return $resultsQuery;
	}
	
	
}