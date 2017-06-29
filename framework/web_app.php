<?php

class WebApp {

	function process_request() {
		$query = null;
		$param = null;
		
		if (array_key_exists('q', $_GET)) {
			$query = $_GET['q'];
		}

		if ($query) {
			$query_arr = explode('/', $query);
			$controller = $query_arr[0];
			$action = $query_arr[1];
			if (sizeof($query_arr) > 2) {
				$param = $query_arr[2];
			}
		} else {
			$controller = 'site';
			$action = 'home';
		}
		
		session_start();
		
		$controller_file = "app/controllers/$controller.php";
		
		if (file_exists($controller_file)) {
			require($controller_file);
		} else {
			die('page not found');
		}
		
		$controller_name = ucfirst($controller)."Controller";
		
		$instance = new $controller_name();
		$instance->$action($param);
	}

}