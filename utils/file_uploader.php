<?php

class FileUploader {

  static function upload($file) {
    $config = include('config.php');

    // TODO: extract validation
    if (!isset($file['error']) || is_array($file['error'])) {
      throw new RuntimeException('Invalid upload form parameters.');
    }

    // Check $file['error'] value
    switch ($file['error']) {
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
    if ($file['size'] > $config['MAX_VIDEO_SIZE']) {
        throw new RuntimeException('Exceeded file size limit.');
    }

    $temp_file = $file['tmp_name'];

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

    return $file_name;
  }
}