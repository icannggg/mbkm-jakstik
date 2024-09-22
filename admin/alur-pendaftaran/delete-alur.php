<?php
include(__DIR__ . '/../../config/connection.php');
$id =$_GET['id'];

$query="DELETE from alur where id='$id'";
mysqli_query($conn, $query);
echo "<script>
        alert('Alur Pendaftaran Berhasil Dihapus');
        window.location='index.php'
    </script>";
?>