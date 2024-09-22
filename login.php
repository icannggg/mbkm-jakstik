<?php
session_start();
include "config/connection.php";

// jika tombol login ditekan
if (isset($_POST['login'])){
    // tangkap data dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    // cek apakah username ada
    if(mysqli_num_rows($result) === 1){
        
        // cek password
        $row = mysqli_fetch_assoc($result);
        if($password == $row["password"]){

            // cek role nya
            if($row['role'] == "ADMIN"){
                $_SESSION ['log_admin'] = true;
                header("Location: admin/index.php");
                exit;
            }
        }
    }
    $error = true;
}
if (isset($error)) {
    echo "<script>
        alert('Username atau Password Salah!!!');
        </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />


    <!-- <link rel="stylesheet" href="css/login.css">-->

   
    <link rel="icon" href="img/logo-kampus-merdeka.png" type="image/x-icon" /> 

    <title>Masuk</title>
  </head>
  <body style="background-color: #ede0a4;">
 

     <div class="card shadow" style="top:100px;left:550px; height:420px; width:400px">
                <h2 class="card-header text-light text-center fw-bold p-4" style = "font-size:35px; background-color: #d1b538;">ADMIN</h2>
                    <div class="card-body">
                    <form method="post" action="">
                    <label for="username"><b>Nama Pengguna</b></label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Nama Pengguna">
                    <br>
                    <label for="password"><b>Kata Sandi</b></label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Kata Sandi">
                <hr>

                &emsp; 
                <button type="submit" name="login" class="btn btn-primary" style= "width:140px; background-color: #d1b538;"> Masuk</button>
               &emsp;&emsp;
               <a href="index.php" class="btn btn-light border" style="width:140px">Kembali</a>          
                
                
            </form>
                
    </div>
                
         


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </body>
</html>