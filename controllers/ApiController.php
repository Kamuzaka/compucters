<?php

class ApiController
{
	private $method;
	private $data;

	public function __construct()
	{
		header("Access-Control-Allow-Orgin: *");
		header("Access-Control-Allow-Methods: *");
		header("Content-Type: application/json");
		$this->method = $_SERVER['REQUEST_METHOD'];
		$this->data = ($this->method == 'POST') ? $_POST : $_GET;
	}

	/**
	 * API функция отправки письма на указанный адрес
	 */
	public function mail() {
		// @todo авторизация по токену перед отправкой
		if (isset($this->data['email_to']) && isset($this->data['text']) && isset($this->data['subject'])) {

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
			$address = strpos($this->data['email_to'], 'xn--') ? $this->data['email_to'] : $idn->encode($this->data['email_to']);
			$mail->addAddress($address);

			// Тема письма
			$mail->Subject = $this->data['subject'];

			// Тело письма
			$body = $this->data['text'];
			$mail->msgHTML($body);
			if ($mail->send()) {
				$this->response(['msg' => 'Письмо отправлено'], 200);
			} else {
				$this->response(['msg' => $mail->ErrorInfo], 500);
			}
		} else {
			$this->response(['msg' => 'Отсутствуют обязательные параметры'], 400);
		}
	}

	protected function response($data, $status = 500) {
		header("HTTP/1.1 " . $status . " " . $this->requestStatus($status));
		$data['status'] = ($status == 200) ? 'success' : 'error';
		echo json_encode($data);
	}

	private function requestStatus($code) {
		$status = array(
			200 => 'OK',
			400 => 'Bad Request',
			401 => 'Unauthorized',
			404 => 'Not Found',
			405 => 'Method Not Allowed',
			500 => 'Internal Server Error',
		);
		return ($status[$code]) ? $status[$code] : $status[500];
	}

}