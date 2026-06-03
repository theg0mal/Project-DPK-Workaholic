<?php
require 'koneksi.php';

$nama   = trim($_POST['nama'] ?? '');
$role   = trim($_POST['role'] ?? '');
$tipe   = $_POST['tipe'] ?? 'Testimoni';
$rating = intval($_POST['rating'] ?? 5);
$pesan  = trim($_POST['pesan'] ?? '');

if (!$nama || !$pesan) {
    echo json_encode(['status' => 'error', 'pesan' => 'Nama dan isi testimoni wajib diisi!']);
    exit;
}

$allowed_tipe = ['Testimoni', 'Kritik', 'Saran'];
if (!in_array($tipe, $allowed_tipe)) $tipe = 'Testimoni';
if ($rating < 1 || $rating > 5) $rating = 5;

$stmt = $conn->prepare("INSERT INTO career_feedback (nama, role, tipe, rating, pesan) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssis", $nama, $role, $tipe, $rating, $pesan);

if ($stmt->execute()) {
    echo json_encode(['status' => 'ok', 'pesan' => 'Testimoni berhasil dikirim! Terima kasih 🙏']);
} else {
    echo json_encode(['status' => 'error', 'pesan' => 'Gagal menyimpan testimoni.']);
}
$stmt->close();
$conn->close();
