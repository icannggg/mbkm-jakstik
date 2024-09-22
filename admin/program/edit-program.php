<?php
session_start();
include(__DIR__ . '/../../config/connection.php');

if (!isset($_SESSION['log_admin'])) {
    header("Location: ../../login.php");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM program WHERE id = '$id'");
    $x = mysqli_fetch_assoc($result);
} else {
    header("Location: index.php");
    exit;
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];
    $gambarlama = $_POST['gambarlama'];
    $gambar = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder = '../../img/program/' . $gambar;

    if ($gambar) {
        move_uploaded_file($source, $folder);
    } else {
        $gambar = $gambarlama;
    }

    $query = "UPDATE program SET gambar='$gambar', nama='$nama', deskripsi='$deskripsi' WHERE id = '$id'";
    $ubah = mysqli_query($conn, $query);

    if (!$ubah) {
        echo "Program Gagal Diperbarui";
    } else {
        echo "<script>
          alert('Program Berhasil Diperbarui');
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
    <title>Edit Program</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="../../img/logo-kampus-merdeka.png" rel="icon">
</head>

<body>
    <div class="container-fluid">
        <div class="col-8 mx-auto">
            <br>
            <center>
                <h3 class="fw-bold">EDIT PROGRAM</h3>
            </center>
            <br>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $x['id'] ?>">
                <input type="hidden" name="gambarlama" value="<?= $x['gambar'] ?>">

                <div class="form-group">
                    <img src="../../img/<?= $x['gambar'] ?>" alt="" width="150">
                </div> <br>

                <div class="form-group">
                    <label for="gambar">
                        <h5>Logo</h5>
                    </label> <br>
                    <input type="file" class="form-control-file" id="gambar" name="gambar" accept=".jpg,.png,.jpeg">
                </div> <br>
                <div class="form-group">
                    <label for="nama">
                        <h5>Nama Program</h5>
                    </label> <br>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Input Nama Program" value="<?= $x['nama'] ?>" required>
                </div> <br>
                <div class="form-group">
                    <label for="Deskripsi">
                        <h5>Deskripsi</h5>
                    </label> <br>
                    <textarea name="deskripsi" id="deskripsi" placeholder="Input Deskripsi" cols="140" rows="10" required><?= $x['deskripsi'] ?></textarea>
                </div> <br>

                <center>
                    <input type="submit" class="btn btn-success text-light fw-bold" name="submit" value="Simpan" style="width:140px">
                </center>
                <hr>

                <div class="form-group col-lg-2 offset-10 my-3">
                    <a href="index.php" class="btn btn-danger fw-bold" style="width:140px">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>