<?php 


class CardChecklistItems extends Model {
	
	public function __construct() {
		$table = 'card_checklist_items';
		parent::__construct($table);
	}
	
	public function findByCardId($cardID) {
		$resultsQuery = $this->find(['expresssions' => "*", 'conditions' => "card_id = ?", 'bind' => [$cardID]]);
		return $resultsQuery;
	}
	
	
}