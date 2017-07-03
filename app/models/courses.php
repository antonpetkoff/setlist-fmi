<?php

require('framework/base_model.php');

class Courses extends BaseModel {

  public $table_name = 'courses';

  function add($title, $lecturer, $description) {
    $sql = "INSERT INTO courses (title, lecturer, description) VALUES(?, ?, ?)";
    $stmt = $this->conn->prepare($sql);
    $result = $stmt->execute(array($title, $lecturer, $description));
    return $result;
  }

}
