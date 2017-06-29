<?php

require('framework/base_controller.php');
require('app/models/videos.php');

class VideosController extends BaseController {

	function all() {
		$model = new Videos();
		$videos = $model->get_all();
		$params = array('videos'=>$videos);
		$this->render('videos/all', $params);
	}

	function add() {
		$content_dir = join('/', array(getcwd(), 'content/'));

		if (isset($_POST['submit'])) {
		  $file_name = $_FILES['file']['name'];
		  $temp = $_FILES['file']['tmp_name'];
		  $url = $content_dir . $file_name;

		  move_uploaded_file($temp, $url);
		  echo "Uploaded file: " . $url;

		  var_dump($_POST);

		  // TODO: store in DB
		  $name = $_POST['name'];
			$videos = new Videos();
			$result = $videos->upload($name, $url);

			if ($result) {
				header('Location: /index.php?q=site/home');
			} else {
				// error
			}
		}

		$params = array();
		$this->render('videos/add', $params);
	}

	function view($video_id) {
		$videos = new Videos();
		$video = $videos->get($video_id);
		$view_params = array('video'=>$video);
		$this->render('videos/view', $view_params);
	}

}
