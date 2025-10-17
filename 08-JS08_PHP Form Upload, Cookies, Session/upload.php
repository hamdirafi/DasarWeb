<!DOCTYPE html>
<html>
<head>
    <title>Upload File</title>
</head>
<body>
    <h2>Upload Gambar</h2>
    <form action="proses_upload.php" method="post" enctype="multipart/form-data">
        Pilih file untuk diupload: 
        <input type="file" name="myfile"><br><br>
        <input type="submit" name="submit" value="Upload">
    </form>
</body>
</html>
