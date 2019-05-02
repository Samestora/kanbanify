<?php

class BoardsController extends Controller {
	
	public function __construct($controllerName, $action) {
		parent::__construct($controllerName, $action);
		$this->boardsModel = new Boards();
		$this->listsModel = new Lists();
		$this->cardsModel = new Cards();
		$this->cardChecklistItemsModel = new CardChecklistItems();
		$this->cardCommentsModel = new CardComments();
	}
	
	
	
	public function indexAction() {
		$user = Users::currentUser();
		$user_id = $user->id ?? '';
		if ($user_id) {
			$this->view->setLayout('boards_layout');
			$boards = $this->boardsModel->find(['expressions' => "*", 'conditions' => "user_id = ?", 'bind' => [$user_id]]);
			$this->view->user_id = $user_id;
			$this->view->boards = ($boards) ? $boards : [];
			$this->view->render('boards/index');
		} else {
			Router::redirect('restricted/index');
		}
	}

	
	public function boardAction($boardID=1) {
		$this->view->setLayout('board_layout');
		//----------
		//Board
		$board = $this->boardsModel->findById($boardID);
		$this->view->board = $board;
		//----------
		//Lists
		$lists = $this->listsModel->findByBoardId($boardID);
		if ($lists == false) $lists = [];
		//----------
		//Cards
		foreach ($lists as &$list) {
			$list['cards'] = $this->cardsModel->findByListId($list['id']);
			if ($list['cards'] == false) {
				$list['cards'] = [];
			}
		}
		unset($list);
		$this->view->lists = $lists;
		//----------
		//view
		$this->view->render('boards/board');
	}
	
	
	
	
	public function modalAction($boardID='', $cardID='') {
			
			if ($cardID) {
				$checklistItems = $this->cardChecklistItemsModel->findByCardId($cardID);
				if ($checklistItems == false) $checklistItems = [];
				$this->view->checklistItems = $checklistItems;
				$comments = $this->cardCommentsModel->findByCardId($cardID);
				if ($comments == false) $comments = [];
				$this->view->comments = $comments;
				$card = $this->cardsModel->findById($cardID);
				if ($card == false) $description = [];
				$this->view->card = $card;
				
				$this->view->renderModal('boards/partials/modal');
			}
	}
	
	
	public function updateAction($id, $model) {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			//for debugging - //H::d($_POST);   //H::d($this->$model->getModelName());   //H::d($model);
			$result = $this->$model->update($_POST, $id);
			H::d($result);
		}
	}
	
	
	public function addAction($model) {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			//for debugging - //H::d($_POST);   //H::d($this->$model->getModelName());   //H::d($model); //H::d($lastInsertID);
			$result = $this->$model->insert($_POST);
			$lastInsertID = $this->$model->getLastInsertID();
			$resp = ['fields' => $_POST, 'modelName' => $this->$model->getModelName(), 'model' => $model, 'result' => $result, 'lastInsertID' => $lastInsertID];
			echo json_encode($resp);
		}
	}
	
	
	
	public function deleteAction($model) {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			//for debugging - //H::d($_POST);   //H::d($this->$model->getModelName());   //H::d($model);  //H::d($id);
			$id = $_POST['id'] ?? '';
			$result = $this->$model->delete($id);
			H::d($result);
		}
	}
	
}



	





