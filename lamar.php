<?php
session_start();
include 'koneksi.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["status" => "login", "pesan" => "Harus login dulu!"]);
    exit;
}

try {
    ensure_sample_jobs();
    ensure_lamaran_columns();

    $user_id = (int) $_SESSION['user_id'];
    $lowongan_id = (int) ($_POST['lowongan_id'] ?? 0);
    $nama = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $no_hp = trim($_POST['no_hp'] ?? '');
    $kota = trim($_POST['kota'] ?? '');
    $pendidikan = trim($_POST['pendidikan'] ?? '');
    $pengalaman = trim($_POST['pengalaman'] ?? '');
    $gaji = trim($_POST['gaji'] ?? '');
    $cover_letter = trim($_POST['cover_letter'] ?? '');

    if ($lowongan_id <= 0) {
        echo json_encode(["status" => "error", "pesan" => "Lowongan tidak valid!"]);
        exit;
    }
    if ($nama === '' || $email === '') {
        echo json_encode(["status" => "error", "pesan" => "Nama dan email wajib diisi!"]);
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(["status" => "error", "pesan" => "Format email tidak valid!"]);
        exit;
    }
    if (!isset($_FILES['cv_resume']) || $_FILES['cv_resume']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(["status" => "error", "pesan" => "Upload CV / resume terlebih dulu!"]);
        exit;
    }

    $cv = $_FILES['cv_resume'];
    if ($cv['size'] > 5 * 1024 * 1024) {
        echo json_encode(["status" => "error", "pesan" => "Ukuran CV maksimal 5 MB!"]);
        exit;
    }

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $cv['tmp_name']);
    finfo_close($finfo);
    $allowed = [
        'application/pdf' => 'pdf',
        'image/jpeg' => 'jpg',
        'image/png' => 'png',
        'image/webp' => 'webp'
    ];
    if (!isset($allowed[$mime])) {
        echo json_encode(["status" => "error", "pesan" => "Format CV harus PDF, JPG, PNG, atau WEBP!"]);
        exit;
    }

    $letter = null;
    $letterMime = '';
    if (isset($_FILES['cover_letter_file']) && $_FILES['cover_letter_file']['error'] !== UPLOAD_ERR_NO_FILE) {
        if ($_FILES['cover_letter_file']['error'] !== UPLOAD_ERR_OK) {
            echo json_encode(["status" => "error", "pesan" => "Upload file surat lamaran gagal!"]);
            exit;
        }
        $letter = $_FILES['cover_letter_file'];
        if ($letter['size'] > 5 * 1024 * 1024) {
            echo json_encode(["status" => "error", "pesan" => "Ukuran surat lamaran maksimal 5 MB!"]);
            exit;
        }
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $letterMime = finfo_file($finfo, $letter['tmp_name']);
        finfo_close($finfo);
        if (!isset($allowed[$letterMime])) {
            echo json_encode(["status" => "error", "pesan" => "Format surat lamaran harus PDF, JPG, PNG, atau WEBP!"]);
            exit;
        }
    }

    $cek = mysqli_prepare($conn, "SELECT id FROM lowongan WHERE id=? AND status='aktif' LIMIT 1");
    mysqli_stmt_bind_param($cek, 'i', $lowongan_id);
    mysqli_stmt_execute($cek);
    $res = mysqli_stmt_get_result($cek);
    if (mysqli_num_rows($res) === 0) {
        echo json_encode(["status" => "error", "pesan" => "Lowongan tidak ditemukan di database."]);
        exit;
    }

    $uploadDir = __DIR__ . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'resumes';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0775, true);
    }

    $originalName = basename($cv['name']);
    $filename = 'resume_user_' . $user_id . '_job_' . $lowongan_id . '_' . time() . '.' . $allowed[$mime];
    $target = $uploadDir . DIRECTORY_SEPARATOR . $filename;
    if (!move_uploaded_file($cv['tmp_name'], $target)) {
        echo json_encode(["status" => "error", "pesan" => "Gagal menyimpan CV / resume!"]);
        exit;
    }
    $cvPath = 'uploads/resumes/' . $filename;

    $letterPath = '';
    $letterOriginalName = '';
    if ($letter !== null) {
        $letterDir = __DIR__ . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'cover_letters';
        if (!is_dir($letterDir)) {
            mkdir($letterDir, 0775, true);
        }
        $letterOriginalName = basename($letter['name']);
        $letterFilename = 'cover_letter_user_' . $user_id . '_job_' . $lowongan_id . '_' . time() . '.' . $allowed[$letterMime];
        $letterTarget = $letterDir . DIRECTORY_SEPARATOR . $letterFilename;
        if (!move_uploaded_file($letter['tmp_name'], $letterTarget)) {
            echo json_encode(["status" => "error", "pesan" => "Gagal menyimpan surat lamaran!"]);
            exit;
        }
        $letterPath = 'uploads/cover_letters/' . $letterFilename;
    }

    $stmt = mysqli_prepare($conn, "INSERT INTO lamaran (user_id, lowongan_id, nama_lengkap, email, no_hp, kota, pendidikan, pengalaman, gaji_ekspektasi, cover_letter, cv_file, cv_original_name, cover_letter_file, cover_letter_original_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'iissssssssssss', $user_id, $lowongan_id, $nama, $email, $no_hp, $kota, $pendidikan, $pengalaman, $gaji, $cover_letter, $cvPath, $originalName, $letterPath, $letterOriginalName);

    if (mysqli_stmt_execute($stmt)) {
        echo json_encode(["status" => "ok", "pesan" => "Lamaran berhasil dikirim!"]);
    } else {
        echo json_encode(["status" => "error", "pesan" => "Gagal: " . mysqli_stmt_error($stmt)]);
    }
} catch (Exception $e) {
    echo json_encode(["status" => "error", "pesan" => "Gagal mengirim lamaran: " . $e->getMessage()]);
}
?>
