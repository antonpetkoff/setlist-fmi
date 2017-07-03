<?php

require('framework/base_model.php');

class Videos extends BaseModel {

	public $table_name = 'videos';

  function upload($name, $url, $description, $course_id) {
    $sql = "INSERT INTO {$this->table_name} (name, url, description, courseId) VALUES(?, ?, ?, ?)";
    $stmt = $this->conn->prepare($sql);
    $result = $stmt->execute(array($name, $url, $description, $course_id));
    return $result;
  }

  function get_with_course($id) {
    $sql = <<<SQL
      SELECT *
      FROM {$this->table_name}
      INNER JOIN courses
      ON courses.id = {$this->table_name}.courseId
      WHERE {$this->table_name}.id = $id;
SQL;

    $query = $this->conn->query($sql) or die("query failed!");
    return $query->fetch(PDO::FETCH_ASSOC);
  }

  function get_all_by_course_id($course_id) {
    $sql = <<<SQL
      SELECT {$this->table_name}.id as videoId, {$this->table_name}.*, courses.*
      FROM {$this->table_name}
      INNER JOIN courses
      ON courses.id = {$this->table_name}.courseId
      WHERE {$this->table_name}.courseId = $course_id;
SQL;

    $query = $this->conn->query($sql) or die("query failed!");
    $result = array();
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      $result[] = $row;
    }

    return $result;
  }

  function filter($name) {
    $sql = <<<SQL
      SELECT {$this->table_name}.id as videoId, {$this->table_name}.*, courses.*
      FROM {$this->table_name}
      INNER JOIN courses
      ON courses.id = {$this->table_name}.courseId
      WHERE {$this->table_name}.name LIKE '%{$name}%';
SQL;

    $query = $this->conn->query($sql) or die("query failed!");
    $result = array();
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
      $result[] = $row;
    }

    return $result;
  }
}
