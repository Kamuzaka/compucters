<?php
class RegistrationController extends Controller
{
	public function index() {
		$data = [];
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$user = new User($_POST);
			$data['errors'] = $user->validate();
			if (empty($data['errors'])) {
				$user->create();
				$this->render('news',['success' => 'Вы успешно подписались на рассылку!']);
			}
		}
		$this->render('registration', $data);
	}
}