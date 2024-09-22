<?php
session_start();
include(__DIR__ . '/../../config/connection.php');

if (!isset($_SESSION['log_admin'])) {
    header("Location: ../../login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT alur.*, program.nama AS program_nama FROM alur JOIN program ON alur.id_program = program.id WHERE alur.id = '$id'");
    $x = mysqli_fetch_assoc($result);
} else {
    header("Location: index.php");
    exit;
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $program_id = $_POST['program_id'];
    $program_name_query = mysqli_query($conn, "SELECT nama FROM program WHERE id = '$program_id'");
    $program_name_row = mysqli_fetch_assoc($program_name_query);
    $program_name = $program_name_row['nama'];
    $gambarlama = $_POST['gambarlama'];
    $gambar = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder = '../../img/alur/' . $gambar;

    if ($gambar) {
        move_uploaded_file($source, $folder);
    } else {
        $gambar = $gambarlama;
    }

    $query = "UPDATE alur SET id_program='$program_id', nama_program='$program_name', gambar='$gambar' WHERE id = '$id'";
    $ubah = mysqli_query($conn, $query);

    if (!$ubah) {
        echo "Alur Pendaftaran Gagal Diperbarui";
    } else {
        echo "<script>
          alert('Alur Pendaftaran Berhasil Diperbarui');
          window.location = 'index.php';
          </script>";
    }
}

$programs = mysqli_query($conn, "SELECT * FROM program");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Alur Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="../../img/logo-kampus-merdeka.png" rel="icon">
</head>

<body>
    <div class="container-fluid">
        <div class="col-8 mx-auto">
            <br>
            <center>
                <h3 class="fw-bold">EDIT ALUR PENDAFTARAN</h3>
            </center>
            <br>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $x['id'] ?>">
                <input type="hidden" name="gambarlama" value="<?= $x['gambar'] ?>">

                <div class="form-group">
                    <label for="program_id">
                        <h5>Nama Program</h5>
                    </label> <br>
                    <select class="form-control" id="program_id" name="program_id" required>
                        <option value="">Pilih Program</option>
                        <?php while ($row = mysqli_fetch_assoc($programs)) : ?>
                            <option value="<?= $row['id']; ?>" <?= $row['id'] == $x['id_program'] ? 'selected' : '' ?>><?= $row['nama']; ?></option>
                        <?php endwhile; ?>
                    </select>
                </div> <br>
                <div class="form-group">
                    <img src="../../img/alur/<?= $x['gambar'] ?>" alt="" width="150">
                </div> <br>

                <div class="form-group">
                    <label for="gambar">
                        <h5>Alur Pendaftaran</h5>
                    </label> <br>
                    <input type="file" class="form-control-file" id="gambar" name="gambar" accept=".jpg,.png,.jpeg">
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
