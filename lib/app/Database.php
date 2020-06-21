<?php
class Database
{
	public $dbh;

	public function __construct() {
		try {
			$config = Router::config('db');

			$this->dbh = new PDO('mysql:host=' . $config['host'] . ';dbname=' . $config['database'], $config['user'], $config['password']);
			$this->dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		} catch (Exception $e) {
			print "Error!: " . $e->getMessage();
			die();
		}
	}

	public function getConnection() {
		return $this->dbh;
	}
}