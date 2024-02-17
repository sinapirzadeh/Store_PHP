<?php
namespace img;
class ImageUploder {
    public function file_upload($dir_file, $file_name) {

        $image_dir = "assets/files/{$dir_file}/";
        $image_file = $image_dir . basename($_FILES[$file_name]['name']);
        $result = move_uploaded_file($_FILES["$file_name"]["tmp_name"], $image_file);

        if ($result) return $image_file;
    }
}