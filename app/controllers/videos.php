<?php

require('framework/base_controller.php');
require('app/models/videos.php');
require('utils/file_uploader.php');

class VideosController extends BaseController {

	function all() {
		$model = new Videos();
		$videos = $model->get_all();
		$params = array('videos'=>$videos);
		$this->render('videos/all', $params);
	}

	function add() {
		$videos_model = new Videos();

		if (isset($_POST['submit'])) {
			try {
			  $name = $_POST['name'];
			  $description = $_POST['description'];
				$file_name = FileUploader::upload($_FILES['file']);

				if ($videos_model->upload($name, $file_name, $description)) {
					header('Location: /index.php?q=site/home');
				} else {
					throw new RuntimeException("Failed to persist video meta data.");
				}
			} catch (RuntimeException $e) {
				echo "Error: " . $e->getMessage();
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
