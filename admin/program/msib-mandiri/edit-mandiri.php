<?php
session_start();
include(__DIR__ . '/../../../config/connection.php');

if (!isset($_SESSION['log_admin'])) {
    header("Location: ../../../login.php");
    exit();
}

$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id) {
    // Fetch existing data
    $query = "SELECT * FROM msib_mandiri WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    $stmt->close();
} else {
    echo "Invalid ID.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_program = $_POST['id_program'];
    $nama_program = $_POST['nama_program'];
    $nama_mitra = $_POST['nama_mitra'];
    $posisi = $_POST['posisi'];
    $kualifikasi = $_POST['kualifikasi'];
    $periode_mulai = $_POST['periode_mulai'];
    $periode_selesai = $_POST['periode_selesai'];
    $periode_mulai_formatted = date("Y-m", strtotime($periode_mulai));
    $periode_selesai_formatted = date("Y-m", strtotime($periode_selesai));

    // Handle file upload
    $gambar = $_FILES['gambar']['name'];
    $source = $_FILES['gambar']['tmp_name'];
    $folder = '../../../img/mandiri/' . $gambar;

    if (!empty($gambar)) {
        move_uploaded_file($source, $folder);
        $gambar_sql = ", gambar = ?";
        $gambar_param = $gambar;
        $gambar_type = "s";
    } else {
        $gambar_sql = "";
        $gambar_param = null;
        $gambar_type = "";
    }

    // Prepare the SQL query for update
    $query = "UPDATE msib_mandiri SET id_program = ?, nama_program = ?, nama_mitra = ?, posisi = ?, kualifikasi = ?, periode_mulai = ?, periode_selesai = ? $gambar_sql WHERE id = ?";
    $stmt = $conn->prepare($query);

    // Determine the type definitions for bind_param
    if ($gambar_sql) {
        $stmt->bind_param("isssssss", $id_program, $nama_program, $nama_mitra, $posisi, $kualifikasi, $periode_mulai_formatted, $periode_selesai_formatted, $gambar_param, $id);
    } else {
        $stmt->bind_param("issssssi", $id_program, $nama_program, $nama_mitra, $posisi, $kualifikasi, $periode_mulai_formatted, $periode_selesai_formatted, $id);
    }

    if ($stmt->execute()) {
        echo "<script>
            alert('Artikel Berhasil Diperbarui');
            window.location = 'index.php';
          </script>";
    } else {
        echo "Artikel Gagal Diperbarui: " . $stmt->error;
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit MSIB Mandiri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../img/logo-kampus-merdeka.png" rel="icon">
    <script type="text/javascript" src="../../../ckeditor/ckeditor.js"></script>
</head>
                         
<body>
    <div class="container mt-5">
        <div class="col-8 mx-auto">
            <center>
                <h3 class="fw-bold">Edit MSIB Mandiri</h3>
            </center>
            <br>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" id="id_program" name="id_program" value="<?= $data['id_program'] ?>">
                <input type="hidden" id="nama_program" name="nama_program" value="<?= $data['nama_program'] ?>">

                <div class="form-group">
                    <label for="exampleInputEmail1">
                        <h5>Logo</h5>
                    </label> <br>
                    <input type="file" class="form-control-file" id="gambar" name="gambar" accept=".jpg,.png,.jpeg">
                    <small>Biarkan kosong jika tidak ingin mengganti gambar.</small>
                    <?php if ($data['gambar']): ?>
                        <div class="mt-2">
                            <img src="../../../img/mandiri/<?= $data['gambar'] ?>" alt="Current Image" style="max-width: 200px;">
                        </div>
                    <?php endif; ?>
                </div> <br>
                <div class="form-group">
                    <label for="nama_mitra">Nama Mitra</label>
                    <input type="text" class="form-control" id="nama_mitra" name="nama_mitra" value="<?= htmlspecialchars($data['nama_mitra']) ?>" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="posisi">Posisi</label>
                    <input type="text" class="form-control" id="posisi" name="posisi" value="<?= htmlspecialchars($data['posisi']) ?>" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="kualifikasi">Kualifikasi</label>
                    <textarea class="form-control ckeditor" id="kualifikasi" name="kualifikasi" rows="4" required><?= htmlspecialchars($data['kualifikasi']) ?></textarea>
                </div>
                <br>
                <div class="form-group">
                    <label for="periode_mulai">Periode Mulai</label>
                    <input type="month" class="form-control" id="periode_mulai" name="periode_mulai" value="<?= $data['periode_mulai'] ?>" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="periode_selesai">Periode Selesai</label>
                    <input type="month" class="form-control" id="periode_selesai" name="periode_selesai" value="<?= $data['periode_selesai'] ?>" required>
                </div>
                <br>
                <center>
                    <input type="submit" class="btn btn-success text-light fw-bold" value="Simpan" style="width:140px">
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
