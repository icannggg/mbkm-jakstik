<?php
include(__DIR__ . '/../../../config/connection.php');
$id =$_GET['id'];

$query = "SELECT gambar FROM msib_mandiri WHERE id='$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($row) {
    // Lokasi file gambar
    $file_path = __DIR__ . '/../../../img/mandiri/' . $row['gambar'];

    // Cek apakah file ada, lalu hapus file
    if (file_exists($file_path)) {
        unlink($file_path);
    }

    // Hapus data dari database
    $query_delete = "DELETE FROM msib_mandiri WHERE id='$id'";
    mysqli_query($conn, $query_delete);

    echo "<script>
            alert('MSIB Mandiri Berhasil Dihapus');
            window.location='index.php';
          </script>";
} else {
    echo "<script>
            alert('Data tidak ditemukan');
            window.location='index.php';
          </script>";
}
?>