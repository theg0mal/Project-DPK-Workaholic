<?php
session_start();
require 'koneksi.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['status' => 'login', 'pesan' => 'Daftar atau login dulu untuk mengirim testimoni.']);
    exit;
}

$tipe   = $_POST['tipe'] ?? 'Testimoni';
$rating = intval($_POST['rating'] ?? 5);
$pesan  = trim($_POST['pesan'] ?? '');

try {
    ensure_profile_columns();

    $userId = (int) $_SESSION['user_id'];
    $nama = trim($_SESSION['user_nama'] ?? '');
    $role = '-';

    $stmtUser = mysqli_prepare($conn, "SELECT nama, headline FROM users WHERE id=? LIMIT 1");
    mysqli_stmt_bind_param($stmtUser, 'i', $userId);
    mysqli_stmt_execute($stmtUser);
    $userRes = mysqli_stmt_get_result($stmtUser);
    $user = mysqli_fetch_assoc($userRes);
    if ($user) {
        $nama = trim($user['nama'] ?? '') !== '' ? trim($user['nama']) : $nama;
        $role = trim($user['headline'] ?? '') !== '' ? trim($user['headline']) : '-';
    }

    if (!$nama || !$pesan) {
        echo json_encode(['status' => 'error', 'pesan' => 'Isi testimoni wajib diisi!']);
        exit;
    }

    $allowed_tipe = ['Testimoni', 'Kritik', 'Saran'];
    if (!in_array($tipe, $allowed_tipe)) $tipe = 'Testimoni';
    if ($rating < 1 || $rating > 5) $rating = 5;

    $stmt = $conn->prepare("INSERT INTO career_feedback (nama, role, tipe, rating, pesan) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssis", $nama, $role, $tipe, $rating, $pesan);

    if ($stmt->execute()) {
        echo json_encode(['status' => 'ok', 'pesan' => 'Testimoni berhasil dikirim! Terima kasih']);
    } else {
        echo json_encode(['status' => 'error', 'pesan' => 'Gagal menyimpan testimoni.']);
    }
    $stmt->close();
} catch (Exception $e) {
    echo json_encode(['status' => 'error', 'pesan' => 'Gagal menyimpan testimoni: ' . $e->getMessage()]);
}
$conn->close();
?>