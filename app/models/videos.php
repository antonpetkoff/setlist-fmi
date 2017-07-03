<?php

require('framework/base_model.php');

class Videos extends BaseModel {

	public $table_name = 'videos';

  function upload($name, $url, $description, $course_id) {
    $sql = "INSERT INTO videos (name, url, description, courseId) VALUES(?, ?, ?, ?)";
    $stmt = $this->conn->prepare($sql);
    $result = $stmt->execute(array($name, $url, $description, $course_id));
    return $result;
  }

}
