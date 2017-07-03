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

}
