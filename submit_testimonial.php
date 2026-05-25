<?php
include 'koneksi.php';
header('Content-Type: application/json');

try {
    db_query_or_fail("CREATE TABLE IF NOT EXISTS career_feedback (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nama VARCHAR(100) NOT NULL,
        role VARCHAR(120) DEFAULT '',
        tipe ENUM('Testimoni','Kritik','Saran') DEFAULT 'Testimoni',
        rating TINYINT DEFAULT 5,
        pesan TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");

    $nama = trim($_POST['nama'] ?? '');
    $role = trim($_POST['role'] ?? '');
    $tipe = trim($_POST['tipe'] ?? 'Testimoni');
    $rating = (int)($_POST['rating'] ?? 5);
    $pesan = trim($_POST['pesan'] ?? '');

    $allowedTypes = ['Testimoni', 'Kritik', 'Saran'];
    if (!in_array($tipe, $allowedTypes, true)) $tipe = 'Testimoni';
    if ($rating < 1 || $rating > 5) $rating = 5;

    if ($nama === '' || $pesan === '') {
        echo json_encode(["status" => "error", "pesan" => "Nama dan isi testimoni wajib diisi!"]);
        exit;
    }

    $stmt = mysqli_prepare($conn, "INSERT INTO career_feedback (nama, role, tipe, rating, pesan) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'sssis', $nama, $role, $tipe, $rating, $pesan);

    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(["status" => "ok", "pesan" => "Terima kasih! Testimoni/kritik/saran kamu sudah terkirim."]);
    } else {
        echo json_encode(["status" => "error", "pesan" => "Gagal menyimpan testimoni: " . mysqli_stmt_error($stmt)]);
    }
} catch (Exception $e) {
    echo json_encode(["status" => "error", "pesan" => "Gagal mengirim testimoni: " . $e->getMessage()]);
}
?>