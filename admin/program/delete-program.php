<?php
include(__DIR__ . '/../../config/connection.php');
$id =$_GET['id'];

$query="DELETE from program where id='$id'";
mysqli_query($conn, $query);
echo "<script>
        alert('Program Berhasil Dihapus');
        window.location='index.php'
    </script>";
?>