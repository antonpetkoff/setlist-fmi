<?php

require('framework/base_model.php');

class Videos extends BaseModel {

	public $table_name = 'videos';

  function upload($name, $url) {
    $sql = "INSERT INTO videos (name, url) VALUES(?, ?)";
    $stmt = $this->conn->prepare($sql);
    $result = $stmt->execute(array($name, $url));
    return $result;
  }

}
