<?php
class AdminController extends Controller
{
	public function index() {
		$this->render('admin', []);
	}

	public function send() {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			if ($this->validate($_POST)) {

				$mail = new PHPMailer;
				$mail->CharSet = 'UTF-8';

				// Настройки SMTP
				$mail->isSMTP();
				$mail->SMTPAuth = true;
				$mail->SMTPDebug = 0;

				$config = Router::config('mail');

				$mail->Host = $config['host'];
				$mail->Port = $config['port'];
				$mail->Username = $config['username'];
				$mail->Password = $config['password'];

				// От кого
				$mail->setFrom($config['username'], 'нетпандемии.рф');

				// Кому
				$idn = new IDNAConvert(array('idn_version'=>2008));

				$users = new User([]);

				foreach($users->all() as $user) {
					$address = strpos($user['email'], 'xn--') ? $user['email'] : $idn->encode($user['email']);
					$mail->addAddress($address);
				}

				// Тема письма
				$mail->Subject = $_POST['subject'];

				// Тело письма
				$body = $_POST['text'];
				$mail->msgHTML($body);
				if ($mail->send()) {
					$this->render('admin', ['success' => 'Письма успешно отправлены!']);
				} else {
					$this->render('admin', ['error' => 'Ошибка при отправке: ' . $mail->ErrorInfo]);
				}

			} else {
				$this->render('admin', ['error' => 'Заполните поля корректно!']);
			}
		}
		$this->render('admin', []);
	}

	private function validate($data) {
		$subject = trim($data['subject']);
		$text = trim($data['text']);
		return (isset($data['subject']) && isset($data['text']) && !empty($subject) && !empty($text) && mb_strlen($subject) > 2 && mb_strlen($text) > 2);
	}
}