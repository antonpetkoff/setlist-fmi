<?php

require('framework/base_controller.php');
require('app/models/videos.php');
require('utils/file_uploader.php');

class VideosController extends BaseController {

	function all() {
		if (!$_GET && !$_GET['courseId']) {
			throw new RuntimeException("Bad GET params in add videos.");
		}

		$course_id = $_GET['courseId'];
		$model = new Videos();
		$videos = $model->get_all_by_course_id($course_id);
		$params = array('videos'=>$videos);
		$this->render('videos/all', $params);
	}

	function add() {
		$videos_model = new Videos();

		try {
			if (!$_GET && !$_GET['courseId']) {
				throw new RuntimeException("Bad GET params in add videos.");
			}

			$course_id = $_GET['courseId'];

			if (isset($_POST['submit'])) {
			  $name = $_POST['name'];
			  $description = $_POST['description'];
				$file_name = FileUploader::upload($_FILES['file']);

				if ($videos_model->upload($name, $file_name, $description, $course_id)) {
					header('Location: /index.php?q=site/home');
				} else {
					throw new RuntimeException("Failed to persist video meta data.");
				}
			}

		} catch (RuntimeException $e) {
			echo "Error: " . $e->getMessage();
		}

		$params = array();
		$this->render('videos/add', $params);
	}

	function view($video_id) {
		$config = include('config.php');
		$videos = new Videos();
		$video = $videos->get_with_course($video_id);
		$video['url'] = join('/', array($config['CONTENT_DIR'], $video['url']));
		$view_params = array('video'=>$video);
		$this->render('videos/view', $view_params);
	}

}
