<?php

class DBConnection {
	public $conn   = null;

	private static $instance = null;

	function __construct() {
		$config = include('config.php');

		$this->conn = new PDO(
			"mysql:host={$config['DB']['HOST']};dbname={$config['DB']['DATABASE']};charset=UTF8",
			$config['DB']['USER'],
			$config['DB']['PASS']);
	}

	static function get_instance() {
		if (!self::$instance) {
			self::$instance = new DBConnection();
		}

		return self::$instance;
	}
}