<?php
session_start();
include(__DIR__ . '/../../config/connection.php');

if (!isset($_SESSION['log_admin'])) {
    header("Location: ../../login.php");
    exit();
}

// Ambil data dari tabel program
$sql_program = "SELECT * FROM program";
$result_program = $conn->query($sql_program);

// Ambil data dari tabel peserta
$sql_peserta = "SELECT * FROM peserta";
$result_peserta = $conn->query($sql_peserta);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $id_program = $_POST['id_program'];
    $id_peserta = $_POST['id_peserta'];
    $nama_mhs = $_POST['nama_mhs'];

    // Ambil nama_mitra dan posisi dari tabel peserta
    $sql_peserta_detail = "SELECT nama_mitra, posisi, nama_mhs FROM peserta WHERE id = ?";
    $stmt_peserta = $conn->prepare($sql_peserta_detail);
    $stmt_peserta->bind_param("i", $id_peserta);
    $stmt_peserta->execute();
    $stmt_peserta->bind_result($nama_mitra, $posisi, $nama_mhs);
    $stmt_peserta->fetch();
    $stmt_peserta->close();

    $program = $_POST['program']; // Pastikan data ini ada di form HTML
    $batch = $_POST['batch'];
    $testimoni = $_POST['isi_testimoni'];

    // Prepare statement untuk INSERT
    $stmt = $conn->prepare("INSERT INTO testimoni (id_program, id_peserta, nama_mhs, nama_mitra, posisi, jenis_program, batch, testimoni) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iissssss", $id_program, $id_peserta, $nama_mhs, $nama_mitra, $posisi, $program, $batch, $testimoni);

    // Eksekusi statement
    if ($stmt->execute()) {
        // Redirect kembali ke halaman daftar testimonial dengan pesan sukses
        header("Location: index.php?status=success");
    } else {
        // Redirect kembali ke halaman create dengan pesan error
        header("Location: add-testimoni.php?status=error");
    }

    // Tutup statement
    $stmt->close();
}

// Tutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tambah Testimoni</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <link href="../../img/logo-kampus-merdeka.png" rel="icon">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <center><h3>Tambah Testimoni</h3></center>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" id="create-testimoni-form">
                            <div class="form-group">
                                <label for="id_peserta">Nama Mahasiswa</label>
                                <select class="form-control" id="id_peserta" name="id_peserta" required onchange="updateFormFields()">
                                    <option value="">Pilih Nama Mahasiswa</option>
                                    <?php while ($row = $result_peserta->fetch_assoc()) : ?>
                                        <option value="<?= $row['id']; ?>" data-program="<?= $row['jenis_program']; ?>" data-id_prog="<?= $row['id_program']; ?>" data-batch="<?= $row['batch']; ?>" data-mitra="<?= $row['nama_mitra']; ?>" data-posisi="<?= $row['posisi']; ?>" data-nama="<?= $row['nama_mhs']; ?>"><?= $row['nama_mhs']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <input type="hidden" class="form-control" id="id_program" name="id_program">
                            <input type="hidden" class="form-control" id="nama_mhs" name="nama_mhs">
                            <div class="form-group">
                                <label for="program">Jenis Program</label>
                                <input type="text" class="form-control" id="program" name="program" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama_mitra">Nama Mitra</label>
                                <input type="text" class="form-control" id="nama_mitra" name="nama_mitra" readonly required>
                            </div>
                            <div class="form-group">
                                <label for="posisi">Posisi</label>
                                <input type="text" class="form-control" id="posisi" name="posisi" readonly required>
                            </div>
                            <div class="form-group">
                                <label for="batch">Batch</label>
                                <input type="text" class="form-control" id="batch" name="batch" readonly required>
                            </div>
                            <div class="form-group">
                                <label for="isi_testimoni">Isi Testimoni</label>
                                <textarea class="form-control" id="isi_testimoni" name="isi_testimoni" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                            <a href="index.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function updateFormFields() {
            var select = document.getElementById('id_peserta');
            var selectedOption = select.options[select.selectedIndex];
            document.getElementById('program').value = selectedOption.getAttribute('data-program');
            document.getElementById('nama_mitra').value = selectedOption.getAttribute('data-mitra');
            document.getElementById('posisi').value = selectedOption.getAttribute('data-posisi');
            document.getElementById('batch').value = selectedOption.getAttribute('data-batch');
            document.getElementById('id_program').value = selectedOption.getAttribute('data-id_prog');
            document.getElementById('nama_mhs').value = selectedOption.getAttribute('data-nama');
        }
    </script>
</body>

</html>
