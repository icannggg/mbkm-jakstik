<?php
include(__DIR__ . '/../../config/connection.php');
$id =$_GET['id'];

$query="DELETE from berita where id='$id'";
mysqli_query($conn, $query);
echo "<script>
        alert('Berita Berhasil Dihapus');
        window.location='index.php'
    </script>";
?>