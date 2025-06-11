<!DOCTYPE html>
<html>
<head>
    <title>Web Upload</title>
</head>
<body>

<h2>Unggah File</h2>
<form action="upload.php" method="post" enctype="multipart/form-data">
    Pilih file:
    <input type="file" name="fileToUpload" id="fileToUpload" onchange="previewFile()">
    <input type="submit" value="Unggah" name="submit">
</form>

<br>
<img id="preview" src="#" alt="Preview akan muncul di sini" style="max-width:200px; display:none;"/>

<script>
function previewFile() {
    var preview = document.getElementById('preview');
    var file    = document.getElementById('fileToUpload').files[0];
    var reader  = new FileReader();

    reader.onloadend = function () {
        preview.src = reader.result;
        preview.style.display = 'block';
    }

    if (file && file.type.startsWith("image/")) {
        reader.readAsDataURL(file);
    } else {
        preview.style.display = 'none';
    }
}
</script>

<hr>
<h3>Daftar File yang Telah Diupload</h3>
<ul>
<?php
$files = scandir("uploads");
foreach($files as $file) {
    if ($file !== "." && $file !== "..") {
        echo "<li>$file - 
        <a href='uploads/$file' download>Unduh</a> | 
        <a href='delete.php?file=$file' onclick=\"return confirm('Yakin ingin menghapus?')\">Hapus</a>
        </li>";
    }
}
?>
</ul>

</body>
</html>
