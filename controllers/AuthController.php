<?php
class AuthController extends Controller
{
	public function index() {
		$this->render('auth', []);
	}

	public function login() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if ($_POST['login'] == 'admin' && $_POST['password'] == 'admin') {
				$this->redirect('admin');
			}
		}
		$this->render('auth', ['error' => true]);
	}
}