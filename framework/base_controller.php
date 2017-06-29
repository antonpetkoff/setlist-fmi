<?php

class BaseController {

	function render($view, $params) {
		ob_start();
		require("app/views/$view.php");
		$content = ob_get_contents();
		ob_end_clean();
		require("app/views/layout.php");
	}
}
