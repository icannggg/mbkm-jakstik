<?php
session_start();
include "../config/connection.php";

if (!isset($_SESSION['log_admin'])) {
    header("Location: ../login.php");
    exit();
}


// Menghitung jumlah total berita
$sql_news = "SELECT COUNT(*) AS total_news FROM berita";
$result_news = $conn->query($sql_news);
$row_news = $result_news->fetch_assoc();
$total_news = $row_news['total_news'];

// Menghitung jumlah total program
$sql_programs = "SELECT COUNT(*) AS total_programs FROM program";
$result_programs = $conn->query($sql_programs);
$row_programs = $result_programs->fetch_assoc();
$total_programs = $row_programs['total_programs'];

// Menghitung jumlah total testimoni
$sql_testimonials = "SELECT COUNT(*) AS total_testimonials FROM testimoni";
$result_testimonials = $conn->query($sql_testimonials);
$row_testimonials = $result_testimonials->fetch_assoc();
$total_testimonials = $row_testimonials['total_testimonials'];

// Menghitung jumlah total program umum
$sql_program_umum = "SELECT COUNT(*) AS total_program_umum FROM program";
$result_program_umum = $conn->query($sql_program_umum);
$row_program_umum = $result_program_umum->fetch_assoc();
$total_program_umum = $row_program_umum['total_program_umum'];

// Menghitung jumlah total MSIB mandiri
$sql_msib_mandiri = "SELECT COUNT(*) AS total_msib_mandiri FROM msib_mandiri";
$result_msib_mandiri = $conn->query($sql_msib_mandiri);
$row_msib_mandiri = $result_msib_mandiri->fetch_assoc();
$total_msib_mandiri = $row_msib_mandiri['total_msib_mandiri'];

// Menghitung jumlah total alur pendaftaran
$sql_alur_pendaftaran = "SELECT COUNT(*) AS total_alur_pendaftaran FROM alur";
$result_alur_pendaftaran = $conn->query($sql_alur_pendaftaran);
$row_alur_pendaftaran = $result_alur_pendaftaran->fetch_assoc();
$total_alur_pendaftaran = $row_alur_pendaftaran['total_alur_pendaftaran'];

// Menghitung jumlah total peserta
$sql_peserta = "SELECT COUNT(*) AS total_peserta FROM peserta";
$result_peserta = $conn->query($sql_peserta);
$row_peserta = $result_peserta->fetch_assoc();
$total_peserta = $row_peserta['total_peserta'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="../img/logo-kampus-merdeka.png" rel="icon">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            display: flex;
            height: 100vh;
            margin: 0;
        }

        .sidebar {
            width: 300px;
            height: 100vh;
            background-color: #d1b538;
            color: white;
            position: fixed;
            display: flex;
            flex-direction: column;
            padding: 20px;
            margin-left: 0;
        }

        .sidebar h2 {
            padding-left: 20px;
            margin-bottom: 30px;
        }

        .sidebar .nav-item {
            list-style: none;
            margin-left: 0;
        }

        .sidebar .nav-link {
            color: white;
            font-size: 1.4em;
            font-weight: 700;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            padding: 10px;
            border-radius: 5px;
            text-decoration: none;
        }

        .sidebar .nav-link:hover {
            background-color: #a38c27;
        }

        .sidebar .nav-link.active {
            background-color: #a38c27;
        }

        .sidebar .nav-link i {
            margin-right: 10px;
        }

        .content {
            margin-left: 290px;
            padding: 20px;
            width: 100%;
        }

        .dropdown-menu {
            background-color: #06BBCC;
        }

        .dropdown-menu .dropdown-item {
            color: white;
        }

        .dropdown-menu .dropdown-item:hover {
            background-color: #A3D8FF;
        }

        .stat-card {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        }

        .stat-card h3 {
            color: #343a40;
            font-size: 1.2em;
            margin-bottom: 15px;
        }

        .stat-card p {
            font-size: 24px;
            color: #d1b538;
            margin: 0;
        }

        .stat-card i {
            font-size: 2.5em;
            margin-bottom: 10px;
            color: #d1b538;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="mb-4">
            <br>
            <h2>MBKM Jakstik</h2>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="#">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#programSubmenu" aria-expanded="false">
                    <i class="fas fa-graduation-cap"></i> Program <i class="fas fa-caret-down ml-auto"></i>
                </a>
                <div id="programSubmenu" class="collapse">
                    <ul class="nav flex-column pl-3">
                        <li class="nav-item">
                            <a class="nav-link" href="program">
                                Program Umum
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="program/msib-mandiri">
                                MSIB Mandiri
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="alur-pendaftaran">
                    <i class="fas fa-route"></i> Alur Pendaftaran
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="peserta">
                    <i class="fas fa-users"></i> Peserta
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="berita">
                    <i class="fas fa-newspaper"></i> Berita
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="testimoni">
                    <i class="fas fa-comment"></i> Testimoni
                </a>
            </li>
            <li class="nav-item mt-auto">
                <a class="nav-link" href="../logout.php">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <div class="content">
        <div class="container mt-5">
            <h2>Dashboard</h2>
            <div class="row">
                <div class="col-md-3">
                    <div class="stat-card">
                        <i class="fas fa-newspaper"></i>
                        <h3>Total Berita</h3>
                        <p><?php echo $total_news; ?></p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <i class="fas fa-graduation-cap"></i>
                        <h3>Total Program</h3>
                        <p><?php echo $total_programs; ?></p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <i class="fas fa-comment"></i>
                        <h3>Total Testimoni</h3>
                        <p><?php echo $total_testimonials; ?></p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <i class="fas fa-graduation-cap"></i>
                        <h3>Program Umum</h3>
                        <p><?php echo $total_program_umum; ?></p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <i class="fas fa-graduation-cap"></i>
                        <h3>MSIB Mandiri</h3>
                        <p><?php echo $total_msib_mandiri; ?></p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <i class="fas fa-route"></i>
                        <h3>Alur Pendaftaran</h3>
                        <p><?php echo $total_alur_pendaftaran; ?></p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card">
                        <i class="fas fa-users"></i>
                        <h3>Peserta</h3>
                        <p><?php echo $total_peserta; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
