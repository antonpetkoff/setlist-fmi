<?php

require('framework/base_controller.php');
require('app/models/courses.php');

class CoursesController extends BaseController {

  function all() {
    $model = new Courses();
    $courses = $model->get_all();
    $params = array('courses' => $courses);
    $this->render('courses/all', $params);
  }

  function add() {
    $model = new Courses();

    if (isset($_POST['submit'])) {
      try {
        $title = $_POST['title'];
        $lecturer = $_POST['lecturer'];
        $description = $_POST['description'];

        if ($model->add($title, $lecturer, $description)) {
          header('Location: /index.php?q=site/home');
        } else {
          throw new RuntimeException("Failed to add course.");
        }
      } catch (RuntimeException $e) {
        echo "Error: " . $e->getMessage();
      }
    }

    $params = array();
    $this->render('courses/add', $params);
  }

  function view($param) {
    $courses_model = new Courses();
    $course = $courses_model->get($param);
    $view_params = array('course' => $course);
    $this->render('courses/view', $view_params);
  }

}
