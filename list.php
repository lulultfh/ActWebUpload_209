<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List File</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      background-color: #EEEFE0;
      font-family: sans-serif;
    }

    .container {
      background-color: #D1D8BE;
      padding: 30px;
      border-radius: 20px;
      max-width: 800px;
      margin: 50px auto;
      text-align: center;
    }

    .file-card {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background-color: #A7C1A8;
      border-radius: 10px;
      padding: 10px 20px;
      margin: 10px auto;
      width: 100%;
      max-width: 700px;
    }

    .file-card img,
    .file-card .placeholder {
      width: 60px;
      height: 60px;
      object-fit: cover;
      border-radius: 6px;
      margin-right: 15px;
    }

    .file-info {
      flex-grow: 1;
      text-align: left;
    }

    .filename {
      font-size: 14px;
      margin: 0;
      word-break: break-word;
    }

    .actions {
      display: flex;
      gap: 15px;
    }

    .actions a {
      font-size: 18px;
      text-decoration: none;
    }

    .actions .fa-download {
      color: #007bff;
    }

    .actions .fa-trash-alt {
      color: #dc3545;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Daftar File yang Diupload</h2>

  <?php
  $files = scandir("uploads");
  $image_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'bmp'];

  $hasFiles = false;
  foreach ($files as $file) {
    if ($file !== "." && $file !== "..") {
      $hasFiles = true;
      $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
      $isImage = in_array($ext, $image_extensions);

      echo "<div class='file-card'>";

      if ($isImage) {
        echo "<img src='uploads/$file' alt='$file'>";
      } else {
        echo "<div class='placeholder' style='width:60px; height:60px; background:#ccc; line-height:60px; text-align:center;'>File</div>";
      }

      echo "<div class='file-info'>
              <p class='filename'>$file</p>
            </div>

            <div class='actions'>
              <a href='uploads/$file' download title='Unduh'>
                <i class='fas fa-download'></i>
              </a>
              <a href='delete.php?file=$file' title='Hapus' onclick=\"return confirm('Yakin ingin menghapus?')\">
                <i class='fas fa-trash-alt'></i>
              </a>
            </div>";

      echo "</div>";
    }
  }

  if (!$hasFiles) {
    echo "<p>Tidak ada file yang diupload</p>";
  }
  ?>

  <br><br>
  <a href="index.php">
    <button style="padding: 10px 20px; background-color: #819A91; color: white; border: none; border-radius: 8px; cursor: pointer;">⬅ Kembali Unggah File</button>
  </a>
</div>

</body>
</html>
