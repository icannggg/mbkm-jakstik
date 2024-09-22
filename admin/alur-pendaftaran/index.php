<?php
session_start();
include(__DIR__ . '/../../config/connection.php');

if (!isset($_SESSION['log_admin'])) {
    header("Location: ../../login.php");
}

$sql = "SELECT alur.id, alur.gambar, program.nama as nama_program 
        FROM alur 
        JOIN program ON alur.id_program = program.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Alur Pendaftaran</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="../../img/logo-kampus-merdeka.png" rel="icon">

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
            background-color: #f8f9fa;
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
            margin-left: 320px;
            padding: 20px;
            width: calc(100% - 320px);
        }

        .table-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .table-container h2 {
            margin-bottom: 20px;
        }

        .table {
            border-collapse: separate;
            border-spacing: 0 10px;
        }

        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }

        .table thead th {
            background-color: #d1b538;
            color: white;
            border: none;
        }

        .table tbody tr {
            background-color: white;
            border-radius: 10px;
            transition: box-shadow 0.3s;
        }

        .table tbody tr:hover {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .table tbody tr td {
            padding: 15px;
            border-top: none;
            border-bottom: none;
        }

        .table tbody tr td img {
            border-radius: 10px;
        }

        .table .btn {
            font-weight: 700;
        }

        .btn-primary {
            background-color: #d1b538;
            border-color: #d1b538;
        }

        .btn-primary:hover {
            background-color: #a38c27;
            border-color: #a38c27;
        }

        .btn-warning, .btn-danger {
            margin: 5px 0;
        }

        .btn {
            padding: 8px 12px;
            border-radius: 5px;
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
                <a class="nav-link" href="../index.php">
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
                            <a class="nav-link" href="../program">
                                Program Umum
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../program/msib-mandiri">
                                MSIB Mandiri
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="index.php">
                    <i class="fas fa-route"></i> Alur Pendaftaran
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../peserta">
                    <i class="fas fa-users"></i> Peserta
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../berita">
                    <i class="fas fa-newspaper"></i> Berita
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../testimoni">
                    <i class="fas fa-comment"></i> Testimoni
                </a>
            </li>
            <li class="nav-item mt-auto">
                <a class="nav-link" href="../../logout.php">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <div class="content">
        <div class="container mt-5">
            <div class="table-container">
                <div class="mb-3 text-center">
                    <h2>Daftar Alur Pendaftaran</h2>
                </div>
                <div class="text-right mb-3">
                    <a href="add-alur.php" class="btn btn-primary font-weight-bold"><i class="fas fa-plus"></i> Add Alur Pendaftaran</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th width=200px>Nama Program</th>
                                <th>Alur Pendaftaran</th>
                                <th width=200px>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($result->num_rows > 0) : ?>
                                <?php $no = 1; ?>
                                <?php while ($row = $result->fetch_assoc()) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $row['nama_program']; ?></td>
                                        <td><img src="../../img/alur/<?= $row["gambar"] ?>" width="400px" height="200px" alt=""></td>
                                        <td>
                                            <a href="edit-alur.php?id=<?= $row['id']; ?>" class="btn btn-warning font-weight-bold"><i class="fas fa-edit"></i> Edit</a>
                                            <a href="delete-alur.php?id=<?= $row['id']; ?>" class="btn btn-danger font-weight-bold"><i class="fas fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="4" class="text-center">No records found</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
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
