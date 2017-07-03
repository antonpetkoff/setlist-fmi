<?php

require('framework/base_controller.php');

class SiteController extends BaseController {

	function home() {
		$params = array();
		$this->render('site/home', $params);
	}

}
