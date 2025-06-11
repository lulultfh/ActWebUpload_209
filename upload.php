<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Ukuran file terlalu besar.";
    exit;
}

if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    header("Location: index.php");
    exit;
} else {
    echo "Gagal mengunggah file.";
}
?>
