<?php

$tmpFilePath = $_FILES['file']['tmp_name'];

if ($tmpFilePath != "") {
    $newFilePath = "../uploads/emails/" . $_FILES['file']['name'];
    if (move_uploaded_file($tmpFilePath, $newFilePath)) {
        echo json_encode(['filename'=>$_FILES['file']['name'],'fileURL'=>$newFilePath]);
    }
}
?>