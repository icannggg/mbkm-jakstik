<?php
session_start();
include(__DIR__ . '/../../config/connection.php');

if (!isset($_SESSION['log_admin'])) {
    header("Location: ../../login.php");
}

$result = mysqli_query($conn, "SELECT * FROM program");

    if(isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $deskripsi = $_POST['deskripsi'];
        $gambar = $_FILES['gambar']['name'];
        $source = $_FILES['gambar']['tmp_name'];
        $folder = '../../img/program/'.$gambar;
        
        move_uploaded_file($source,$folder);

        $query = "INSERT INTO program (id,gambar,nama,deskripsi) VALUES ('','$gambar','$nama','$deskripsi')";
        $tambah = mysqli_query($conn, $query);

        if(!$tambah) {
          echo "Artikel Gagal Disimpan";
        } else {
          echo "<script>
          alert('Artikel Berhasil Ditambahkan');
          window.location = 'index.php';
          </script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Program</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="../../img/logo-kampus-merdeka.png" rel="icon">
</head>

<body>
<div class="container-fluid">
        <div class="col-8 mx-auto">
            <br>
            <center><h3 class="fw-bold">TAMBAH PROGRAM</h3></center>
            <br>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1" ><h5>Logo</h6></label> <br>
                    <input type="file" class="form-control-file" id="gambar" name="gambar" accept=".jpg,.png,.jpeg" required>
                </div> <br>
                <div class="form-group">
                    <label for="exampleInputEmail1"><h5>Nama Program</h5></label> <br>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Input Nama Program" required>
                </div> <br>
                <div class="form-group">
                    <label for="exampleInputEmail1"><h5>Deskripsi</h5></label> <br>
                    <textarea name="deskripsi" id="deskripsi" placeholder="Input Deskripsi" cols="140" rows="10" required></textarea>
                </div> <br>

                <center>
                  <input type="submit" class="btn btn-success text-light fw-bold" name="submit" value="Simpan" style="width:140px" ></input>
                </center><hr> 

                <div class="form-group col-lg-2 offset-10 my-3">    
                <a href="index.php" class="btn btn-danger fw-bold" style="width:140px">Kembali</a>             
                </div>
            </form>
        </div>
    </div>
</body>

</html>