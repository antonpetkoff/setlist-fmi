<?php

require('framework/base_controller.php');
require('app/models/courses.php');

class CoursesController extends BaseController {

	function all() {
		$model = new Courses();
		$courses = $model->get_all();
		$params = array('courses'=>$courses);
		$this->render('courses/all', $params);
	}

	function add() {
		$content_dir = join('/', array(getcwd(), 'content/'));

		if (isset($_POST['submit'])) {
		  $file_name = $_FILES['file']['name'];
		  $temp = $_FILES['file']['tmp_name'];
		  $url = $content_dir . $file_name;

		  move_uploaded_file($temp, $url);
		  echo "Uploaded file: " . $url;

		  // TODO: store in DB
		}

		$params = array();
		$this->render('courses/add', $params);
	}

	function view($param) {
		$courses_model = new Courses();
		$course = $courses_model->get($param);
		$view_params = array('course'=>$course);
		$this->render('courses/view', $view_params);
	}

}
