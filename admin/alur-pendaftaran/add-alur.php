<?php
session_start();
include(__DIR__ . '/../../config/connection.php');

if (!isset($_SESSION['log_admin'])) {
    header("Location: ../../login.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM alur");
$programs = mysqli_query($conn, "SELECT * FROM program");

if (isset($_POST['submit'])) {
    $program_id = $_POST['program_id'];
    $program_name_query = mysqli_query($conn, "SELECT nama FROM program WHERE id = '$program_id'");
    $program_name_row = mysqli_fetch_assoc($program_name_query);
    $nama_program = $program_name_row['nama'];

    $gambar = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder = '../../img/alur/' . $gambar;

    move_uploaded_file($source, $folder);

    $query = "INSERT INTO alur (id_program, nama_program, gambar) VALUES ('$program_id', '$nama_program', '$gambar')";
    $tambah = mysqli_query($conn, $query);

    if (!$tambah) {
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
    <title>Tambah Alur Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="../../img/logo-kampus-merdeka.png" rel="icon">
</head>

<body>
    <div class="container-fluid">
        <div class="col-8 mx-auto">
            <br>
            <center>
                <h3 class="fw-bold">ADD PROGRAM</h3>
            </center>
            <br>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="program_id">
                        <h5>Nama Program</h5>
                    </label> <br>
                    <select class="form-control" id="program_id" name="program_id" required>
                        <option value="">Pilih Program</option>
                        <?php while ($row = mysqli_fetch_assoc($programs)) : ?>
                            <option value="<?= $row['id']; ?>"><?= $row['nama']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div> <br>
                <div class="form-group">
                    <label for="gambar">
                        <h5>Logo</h5>
                    </label> <br>
                    <input type="file" class="form-control-file" id="gambar" name="gambar" accept=".jpg,.png,.jpeg" required>
                </div> <br>

                <center>
                    <input type="submit" class="btn btn-success text-light fw-bold" name="submit" value="Simpan" style="width:140px"></input>
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
