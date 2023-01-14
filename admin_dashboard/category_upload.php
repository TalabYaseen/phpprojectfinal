<?php

$file = $_FILES['file'];

if (is_uploaded_file($file['tmp_name']) && $file['error'] === 0) {
    // The file was uploaded successfully
}

//////       14ABC       .      EXT
// $file_name = uniqid() . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);

$upload_path = '../images/categorypic/' . $file['name'];
if (move_uploaded_file($file['tmp_name'], $upload_path)) {
    echo 'File uploaded successfully';
} else {
    echo 'Error uploading file';
}
?>