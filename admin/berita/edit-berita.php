<?php
session_start();
include(__DIR__ . '/../../config/connection.php');

if (!isset($_SESSION['log_admin'])) {
    header("Location: ../../login.php");
    exit();
}

$errors = array();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM berita WHERE id = '$id'");
    $berita = mysqli_fetch_assoc($result);

    if (!$berita) {
        echo '<script>alert("Berita tidak ditemukan."); window.location.href = "index.php";</script>';
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}

if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $isi = $_POST['isi'];
    $penulis = "Admin MBKM Jakstik";
    $tanggal_posting = date("Y-m-d H:i:s");

    $gambar_new_name = $berita['gambar']; // Default to the old image

    // Handle image upload
    if (!empty($_FILES['gambar']['name'])) {
        $gambar = $_FILES['gambar'];
        $gambar_name = $gambar['name'];
        $gambar_tmp = $gambar['tmp_name'];
        $gambar_size = $gambar['size'];
        $gambar_error = $gambar['error'];

        $gambar_ext = explode('.', $gambar_name);
        $gambar_actual_ext = strtolower(end($gambar_ext));

        $allowed = array('jpg', 'jpeg', 'png');

        if (in_array($gambar_actual_ext, $allowed)) {
            if ($gambar_error === 0) {
                if ($gambar_size < 1000000) { // 1MB
                    $gambar_new_name = uniqid('', true) . "." . $gambar_actual_ext;
                    $gambar_destination = '../../img/' . $gambar_new_name;
                    move_uploaded_file($gambar_tmp, $gambar_destination);
                } else {
                    $errors[] = "Ukuran gambar terlalu besar. Maksimal 1MB.";
                }
            } else {
                $errors[] = "Terjadi kesalahan upload gambar.";
            }
        } else {
            $errors[] = "Format gambar tidak didukung. Hanya JPG, JPEG, atau PNG yang diperbolehkan.";
        }
    }

    if (empty($errors)) {
        $sql = "UPDATE berita SET judul='$judul', gambar='$gambar_new_name', isi='$isi', penulis='$penulis', tanggal_posting='$tanggal_posting' WHERE id = '$id'";
        if ($conn->query($sql) === TRUE) {
            echo '<script>alert("Berita berhasil diperbarui."); window.location.href = "index.php";</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Edit Berita</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="../../img/logo-kampus-merdeka.png" rel="icon">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <script type="text/javascript" src="../../ckeditor/ckeditor.js"></script>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Edit Berita</a>
    </nav>

    <!-- Content -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <?php if (!empty($errors)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php foreach ($errors as $error) : ?>
                            <p><?php echo $error; ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="<?= $berita['judul'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control-file" id="gambar" name="gambar" accept=".jpg,.jpeg,.png">
                        <p>Gambar Saat Ini:</p>
                        <img src="../../img/<?= $berita['gambar'] ?>" alt="Gambar Berita" width="150">
                    </div>
                    <div class="form-group">
                        <label for="isi">Isi Berita</label>
                        <textarea class="form-control ckeditor" id="isi" name="isi" rows="5" required><?= $berita['isi'] ?></textarea>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Update Berita</button>
                    <a href="index.php" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
