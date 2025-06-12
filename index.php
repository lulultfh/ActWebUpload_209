<!DOCTYPE html>
<html>
<head>
    <title>Unggah Gambar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h2>Unggah File</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload" onchange="previewFile()" required><br><br>
        <img id="preview" src="#" alt="Preview" style="max-width:100%; display:none;"/><br>
        <input type="submit" value="Unggah">
    </form>
</div>

<script>
function previewFile() {
    var preview = document.getElementById('preview');
    var file = document.getElementById('fileToUpload').files[0];
    var reader = new FileReader();

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
</body>
</html>
