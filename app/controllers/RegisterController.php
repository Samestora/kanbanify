<?php


class RegisterController extends Controller {
	
	public function __construct($controllerName, $action) {
		parent::__construct($controllerName, $action);
		$this->UsersModel = new Users();
	}
	
	public function indexAction() {
		echo 'register / index';
	}
	
	
	public function loginAction() {
		$loginModel = new Login();
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$loginModel->assign($_POST);
			$user = $this->UsersModel->findByUsername($_POST['username']);
			if ($user && ($_POST['password'] == $user->password)) {
				$remember = $loginModel->getRememberMeChecked();
				$user->login($remember);
				Router::redirect('home/index');
			} else {
				$loginModel->addErrorMessage('There is an error with your username or password');
			}
    }
    $this->view->login = $loginModel;
    $this->view->displayErrors = $loginModel->getErrorMessages();
    $this->view->render('register/login');
		
	}
	
	
	
	public function logoutAction() {
		if (Users::currentUser()) {
			Users::currentUser()->logout();
		}
		Router::redirect('register/login');
	}
	
	
	public function registerAction() {
		$newUser = new Users();
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$newUser->assign($_POST);
			$newUser->setConfirm($_POST['confirm']);
			$newUser->validate();
			if ($newUser->validationPassed()) {
				if ($newUser->save()) {
					Router::redirect('register/login');
					H::d($newUser);
					exit;
				}
			}
		}
		$this->view->newUser = $newUser;
		$this->view->displayErrors = $newUser->getErrorMessages();
		$this->view->render('register/register');
	}
	
	
	
}

























