<?php
session_start();
include(__DIR__ . '/../../config/connection.php');
include(__DIR__ . '/../../vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_POST['submit'])) {
    // Ambil file yang diupload
    $file = $_FILES['file']['tmp_name'];

    // Baca file Excel
    $spreadsheet = IOFactory::load($file);
    $sheet = $spreadsheet->getActiveSheet();
    $data = $sheet->toArray();

    // Iterasi melalui data dan masukkan ke database
    foreach ($data as $row) {
        $id_program = $row[0];
        $jenis_program = $row[1];
        $npm = $row[2];
        $nama_mhs = $row[3];
        $prodi = $row[4];
        $nama_mitra = $row[5];
        $posisi = $row[6];
        $batch = $row[7];

        // Sesuaikan dengan jumlah kolom dan tipe data
        $sql = "INSERT INTO peserta (id_program, jenis_program, npm, nama_mhs, prodi, nama_mitra, posisi, batch) 
                VALUES ('$id_program', '$jenis_program', '$npm', '$nama_mhs', '$prodi', '$nama_mitra', '$posisi', '$batch')";
        $conn->query($sql);
    }

    echo "Data berhasil diunggah!";
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Peserta MBKM</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link href="../../img/logo-kampus-merdeka.png" rel="icon">
</head>
<body>
    <div class="container mt-5">
        <div class="mb-3">
            <h2 class="text-center">Tambah Peserta Lolos MBKM</h2>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="file">Pilih file Excel:</label>
                <input type="file" class="form-control-file" id="file" name="file" accept=".xls,.xlsx" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Upload</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
