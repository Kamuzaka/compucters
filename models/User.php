<?php
class User
{
	private $fields;

	public function __construct($data)
	{
		$this->fields = $data;
		$this->db = (new Database())->getConnection();
	}

	public function create() {

		// конвертация кирилического email
		$idn = new IDNAConvert(array('idn_version'=>2008));
		$this->fields['email'] = strpos($this->fields['email'], 'xn--') ? $this->fields['email'] : $idn->encode($this->fields['email']);

		$this->fields['password'] = password_hash($this->fields['password'], PASSWORD_BCRYPT);

		try {
			$stmt = $this->db->prepare("INSERT INTO user SET name = ?, sex = ?, email = ?, password = ?, age = ?, region = ?, phone = ?, diseases = ?");
			$stmt->execute([
				$this->fields['name'],
				$this->fields['sex'],
				$this->fields['email'],
				$this->fields['password'],
				$this->fields['age'],
				$this->fields['region'],
				$this->fields['phone'],
				$this->fields['diseases']
			]);
		} catch (PDOException $ex) {
			Helper::debug($ex->getMessage());
		}
	}

	public function validate() {
		$errors = [];
		if (!isset($this->fields['name']) || empty(trim($this->fields['name'])) || mb_strlen($this->fields['name']) < 4) {
			$errors['name'] = 'Укажите ФИО!';
		}
		if (!isset($this->fields['phone']) || empty(trim($this->fields['phone'])) || !preg_match('/^[0-9 +-]{1,20}$/', $this->fields['phone'])) {
			$errors['phone'] = 'Укажите корректный номер телефона!';
		}
		if (!isset($this->fields['password']) || empty(trim($this->fields['password']))
			|| !isset($this->fields['password_repeat']) || empty(trim($this->fields['password_repeat']))
			|| $this->fields['password'] != $this->fields['password_repeat']
		) {
			$errors['password_repeat'] = 'Пароли не совпадают!';
		}
		return $errors;
	}
}