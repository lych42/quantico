<?php
$imagesDir = 'public/photos/';
$images = [];

if (is_dir($imagesDir)) {
  $files = scandir($imagesDir);

  foreach ($files as $file) {
    if ($file !== '.' && $file !== '..') {
      $images[] = $file;
    }
  }
}

echo json_encode(['images' => $images]);
?>