<?php
include "config/connection.php";

$berita = mysqli_query($conn, "SELECT * FROM berita");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MBKM Jakstik</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/logo-kampus-merdeka.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style>
        .card-body {
            height: 100%;
            padding: 20px;
        }

        .card {
            display: flex;
            flex-direction: column;
            height: 100%;
            min-height: 300px;
            /* Ubah nilai ini sesuai kebutuhan */
        }

        .fixed-image {
            /* width: 100%;
            height: 100%; */
            object-fit: cover;
        }

        .footer {
            background-color: #343a40;
            color: #ffffff;
            padding: 40px 0;
        }

        .footer a {
            color: #ffffff;
        }

        .footer a:hover {
            color: #f0ad4e;
        }

        .footer .social-media i {
            font-size: 24px;
            margin-right: 10px;
        }

        .footer .footer-bottom {
            padding-top: 20px;
            border-top: 1px solid #4b4b4b;
            text-align: center;
        }

        .footer .footer-bottom p {
            margin: 0;
        }

        .card-article {
            margin: 20px 0;
        }

        .card-article img {
            height: 300px;
            /* Ubah nilai ini sesuai kebutuhan */
            object-fit: cover;
        }

        .card-article .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .card-article .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card-date {
            font-size: 0.9rem;
            color: #888;
            margin-bottom: 10px;
        }

        .card-text {
            max-height: 100px;
            /* Sesuaikan nilai ini sesuai kebutuhan */
            overflow: hidden;
        }
    </style>
</head>

<body>
    <!-- Spinner Start -->
    <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div> -->
    <!-- Spinner End -->

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a href="index.php" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0" style="color: #d1b538;"><img src="img/logo-kampus-merdeka.png" width="50px" height="50px" alt=""> MBKM Jakstik</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.php" class="nav-item nav-link">Beranda</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Program</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="msib.php" class="dropdown-item">MSIB</a>
                        <a href="https://kampusmerdeka.kemdikbud.go.id/program/mengajar" class="dropdown-item" target="_blank">Kampus Mengajar</a>
                        <a href="https://praktisimengajar.kampusmerdeka.kemdikbud.go.id/" class="dropdown-item" target="_blank">Praktisi Mengajar</a>
                        <a href="https://pmm.kampusmerdeka.kemdikbud.go.id/pages/info/program/pmm_4/" class="dropdown-item" target="_blank">Pertukaran Mahasiswa Merdeka</a>
                        <a href="https://iisma.kemdikbud.go.id/" class="dropdown-item" target="_blank">IISMA</a>
                        <a href="https://wirausahamerdeka.kampusmerdeka.kemdikbud.go.id/info/" class="dropdown-item" target="_blank">Wirausaha Merdeka</a>
                        <a href="https://grow.google/intl/id_id/bangkit/?tab=machine-learning" class="dropdown-item" target="_blank">Bangkit</a>
                    </div>
                </div>
                <a href="alur.php" class="nav-item nav-link">Alur Pendaftaran</a>
                <a href="peserta.php" class="nav-item nav-link">Peserta</a>
                <a href="berita.php" class="nav-item nav-link active">Berita</a>
                <a href="https://kampusmerdeka.kemdikbud.go.id/register" class="nav-item nav-link" target="_blank">Daftar</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->

    <!-- Header Start -->
    <div class="container-fluid py-5 mb-5 page-header">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="display-3 text-white animated slideInDown">Berita</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Beranda</a></li>
                            <li class="breadcrumb-item"><a class="text-white active" aria-current="page">Berita</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Article Cards Start -->
    <div class="container">
        <div class="row">
            <?php
            if (!function_exists('limit_words')) {
                function limit_words($text, $limit)
                {
                    $words = explode(' ', $text);
                    if (count($words) > $limit) {
                        return implode(' ', array_slice($words, 0, $limit)) . '...';
                    } else {
                        return $text;
                    }
                }
            }

            while ($row = mysqli_fetch_assoc($berita)) :
                $limited_text = limit_words($row["isi"], 30);
            ?>
                <div class="col-md-12 card-article mb-4">
                    <div class="card h-100">
                        <div class="row no-gutters">
                            <div class="col-md-3">
                                <img src="img/<?= $row["gambar"] ?>" class="card-img fixed-image" alt="...">
                            </div>
                            <div class="col-md-9">
                                <div class="card-body">
                                    <div class="card-date"><?= $row["tanggal_posting"] ?></div>
                                    <h5 class="card-title"><?= $row["judul"] ?></h5>
                                    <p class="card-text"><?= $limited_text ?></p>
                                    <a href="detail-berita.php?id=<?= $row["id"] ?>" class="btn btn-primary">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
    <!-- Article Cards End -->

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4">
                    <h4 class="text-uppercase" style="color: #d1b538;">Tentang Kami</h4>
                    <p>Politeknik Tinggi Manajemen Informatika dan Komputer Jakarta STI&K</p>
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d991.8882641593783!2d106.78373242918508!3d-6.251126199999983!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f10a903f7f05%3A0x1e3c83822188e5a9!2sSTMIK%20Jakarta%20STI%26K!5e0!3m2!1sid!2sid!4v1722002090504!5m2!1sid!2sid" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
                        </iframe>
                    </div>
                    <p>
                        <strong>Alamat:</strong> Jl. BRI Radio Dalam No.17, RT.14/RW.3, Gandaria Utara, Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12140
                    </p>
                    <div class="social-media">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-md-6 mb-4"> <br><br>
                    <h4 class="text-uppercase text-center" style="color: #d1b538;">Hubungi Kami</h4>
                    <p class="text-center"><i class="fas fa-phone-alt"></i> (021) 739 7973</p>
                    <p class="text-center"><i class="fas fa-envelope"></i> informasi@jak-stik.ac.id</p>
                    <p class="text-center"><i class="fas fa-envelope"></i> ppmb@jak-stik.ac.id</p>
                    <h5 class="text-uppercase text-center" style="color: #d1b538;">Waktu Buka</h5>
                    <p class="text-center">Senin - Jumat: 10:00 - 19:00 WIB</p>
                    <p class="text-center">Sabtu: 10:00 - 15:00 WIB</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; MBKM Jakstik 2024</p>
            </div>
        </div>
    </footer>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>