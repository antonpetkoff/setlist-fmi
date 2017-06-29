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
		$config = include('config.php');

		if (isset($_POST['submit'])) {
		  $file_name = $_FILES['file']['name'];
		  $temp = $_FILES['file']['tmp_name'];
		  $url =  join('/', array(getcwd(), $config['CONTENT_DIR'], $file_name));

		  move_uploaded_file($temp, $url);
		  echo "Uploaded file: " . $file_name;

		  $name = $_POST['name'];
			$videos = new Videos();
		  // TODO: store file_name with sha1
			$result = $videos->upload($name, $file_name);

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
		$config = include('config.php');
		$videos = new Videos();
		$video = $videos->get($video_id);
		$video['url'] = join('/', array($config['CONTENT_DIR'], $video['url']));
		$view_params = array('video'=>$video);
		$this->render('videos/view', $view_params);
	}

}
