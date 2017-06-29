<?php

require('framework/base_controller.php');

class SiteController extends BaseController {

	function home() {
		if (array_key_exists('visits', $_SESSION)) {
			$_SESSION['visits'] += 1;
		} else {
			$_SESSION['visits'] = 1;
		}
		$params = array('visits'=>$_SESSION['visits']);
		$this->render('site/home', $params);
	}

}
