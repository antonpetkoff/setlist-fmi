<?php

require('framework/base_controller.php');
require('app/models/users.php');

class UsersController extends BaseController {

	function register() {
		$errors = array();
		if ($_POST) {
			$email = $_POST['email'];
			$password = $_POST['password'];
			$password_confirm = $_POST['confirm'];
			
			if (!$email) {
				$errors[] = 'Email is required';
			}
			
			if (!$password) {
				$errors[] = 'Password is required';
			}
			
			if ($password != $password_confirm) {
				$errors[] = 'Password mismatch';
			}
			
			$model = new Users();
			$result = $model->register($email, $password);
			if ($result) {
				$_SESSION['user_email'] = $email;
				header('Location: /index.php?q=site/home');
			} else {
				$errors[] = 'Error while trying to register. Please try again.';
			}
		}

		$params = array('errors'=>$errors);
		$this->render('users/register', $params);
	}
	
	function login() {
		$errors = array();
		if ($_POST) {
			$email = $_POST['email'];
			$password = $_POST['password'];
			
			if (!$email) {
				$errors[] = 'Email is required';
			}
			
			if (!$password) {
				$errors[] = 'Password is required';
			}
			
			$model = new Users();
			$result = $model->login($email, $password);
			if ($result) {
				$_SESSION['user_email'] = $email;
				header('Location: /index.php?q=site/home');
			} else {
				$errors[] = 'Error while trying to login. Please try again.';
			}
		}

		$params = array('errors'=>$errors);
		$this->render('users/login', $params);
	}
	
	function logout() {
		session_destroy();
		header('Location: /index.php?q=site/home');
	}

}
