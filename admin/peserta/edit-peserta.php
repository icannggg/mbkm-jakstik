<?php
session_start();
include(__DIR__ . '/../../config/connection.php');

if (!isset($_SESSION['log_admin'])) {
    header("Location: ../../login.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM peserta WHERE id = '$id'");
    $x = mysqli_fetch_assoc($result);
} else {
    header("Location: index.php");
    exit;
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $npm = $_POST['npm'];
    $nama_mhs = $_POST['nama_mhs'];
    $prodi = $_POST['prodi'];
    $nama_mitra = $_POST['nama_mitra'];
    $posisi = $_POST['posisi'];
    $batch = $_POST['batch'];

    $query = "UPDATE peserta SET npm='$npm', nama_mhs='$nama_mhs', prodi='$prodi', nama_mitra='$nama_mitra', posisi='$posisi', batch='$batch' WHERE id = '$id'";
    $ubah = mysqli_query($conn, $query);

    if (!$ubah) {
        echo "Peserta Gagal Diperbarui";
    } else {
        echo "<script>
          alert('Peserta Berhasil Diperbarui');
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
    <title>Edit Peserta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="../../img/logo-kampus-merdeka.png" rel="icon">
</head>

<body>
    <div class="container-fluid">
        <div class="col-8 mx-auto">
            <br>
            <center>
                <h3 class="fw-bold">EDIT PESERTA</h3>
            </center>
            <br>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $x['id'] ?>">

                <div class="form-group">
                    <label for="npm">
                        <h5>NPM</h5>
                    </label> <br>
                    <input type="text" class="form-control" id="npm" name="npm" placeholder="Input NPM" value="<?= $x['npm'] ?>" required>
                </div> <br>

                <div class="form-group">
                    <label for="nama_mhs">
                        <h5>Nama Mahasiswa</h5>
                    </label> <br>
                    <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" placeholder="Input Nama Mahasiswa" value="<?= $x['nama_mhs'] ?>" required>
                </div> <br>

                <div class="form-group">
                    <label for="prodi">
                        <h5>Program Studi</h5>
                    </label> <br>
                    <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Input Program Studi" value="<?= $x['prodi'] ?>" required>
                </div> <br>

                <div class="form-group">
                    <label for="nama_mitra">
                        <h5>Nama Mitra</h5>
                    </label> <br>
                    <input type="text" class="form-control" id="nama_mitra" name="nama_mitra" placeholder="Input Nama Mitra" value="<?= $x['nama_mitra'] ?>" required>
                </div> <br>

                <div class="form-group">
                    <label for="posisi">
                        <h5>Posisi</h5>
                    </label> <br>
                    <input type="text" class="form-control" id="posisi" name="posisi" placeholder="Input Posisi" value="<?= $x['posisi'] ?>" required>
                </div> <br>

                <div class="form-group">
                    <label for="batch">
                        <h5>Batch</h5>
                    </label> <br>
                    <input type="text" class="form-control" id="batch" name="batch" placeholder="Input Batch" value="<?= $x['batch'] ?>" required>
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
