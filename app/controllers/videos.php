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
			try {
				if (!isset($_FILES['file']['error']) || is_array($_FILES['file']['error'])) {
			    throw new RuntimeException('Invalid upload form parameters.');
				}

				// Check $_FILES['file']['error'] value
				switch ($_FILES['file']['error']) {
					case UPLOAD_ERR_OK:
					  break;
					case UPLOAD_ERR_NO_FILE:
					  throw new RuntimeException('No file sent.');
					case UPLOAD_ERR_INI_SIZE:
					case UPLOAD_ERR_FORM_SIZE:
					  throw new RuntimeException('Exceeded file size limit.');
					default:
					  throw new RuntimeException('Unknown errors.');
				}

				// Check file size
				if ($_FILES['file']['size'] > $config['MAX_VIDEO_SIZE']) {
				    throw new RuntimeException('Exceeded file size limit.');
				}

			  $temp_file = $_FILES['file']['tmp_name'];

				// Check MIME Type
				$allowed_formats = array(
	        'mp4' => 'video/mp4',
	        'webm' => 'video/webm',
	        'ogg' => 'video/ogg',
		    );
				$file_info = new finfo(FILEINFO_MIME_TYPE);
				$extension = array_search($file_info->file($temp_file), $allowed_formats, true);

				if ($extension === false) {
			    throw new RuntimeException('Invalid file format.');
				}

				// Name file uniquely
			  $file_name = sprintf('%s.%s', sha1_file($temp_file), $extension);
			  $url =  join('/', array(getcwd(), $config['CONTENT_DIR'], $file_name));

				if (!move_uploaded_file($temp_file, $url)) {
				    throw new RuntimeException('Failed to move uploaded file.');
				}

			  echo "Uploaded file: " . $file_name;

			  // Persist uploaded video file name in DB
			  $name = $_POST['name'];
				$videos = new Videos();
				$result = $videos->upload($name, $file_name);

				if ($result) {
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
