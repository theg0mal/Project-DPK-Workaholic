<?php
session_start();
include 'koneksi.php';
header('Content-Type: application/json');

if (!isset($_SESSION['user_id'])) {
    echo json_encode(["status" => "login", "pesan" => "Belum login!"]);
    exit;
}

try {
    ensure_saved_jobs_table();
    ensure_company_columns();
    db_add_column_if_missing('lowongan', 'deleted_at', 'DATETIME NULL');

    $userId = (int)$_SESSION['user_id'];
    $stmt = mysqli_prepare($conn, "SELECT sj.created_at AS saved_at, l.*, p.nama_perusahaan, p.industri, p.logo AS perusahaan_logo
        FROM saved_jobs sj
        JOIN lowongan l ON l.id = sj.lowongan_id
        JOIN perusahaan p ON p.id = l.perusahaan_id
        WHERE sj.user_id=? AND l.deleted_at IS NULL
        ORDER BY sj.created_at DESC");
    mysqli_stmt_bind_param($stmt, 'i', $userId);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    $jobs = [];
    while ($row = mysqli_fetch_assoc($res)) {
        $gajiMin = (int)$row['gaji_min'];
        $gajiMax = (int)$row['gaji_max'];
        if ($gajiMin > 0 && $gajiMax > 0) {
            $salary = 'Rp ' . round($gajiMin / 1000000) . '-' . round($gajiMax / 1000000) . ' jt';
        } elseif ($gajiMax > 0) {
            $salary = 's.d. Rp ' . round($gajiMax / 1000000) . ' jt';
        } else {
            $salary = 'Negosiasi';
        }
        $jobs[] = [
            'id' => (int)$row['id'],
            'featured' => false,
            'title' => $row['judul'],
            'company' => $row['nama_perusahaan'],
            'company_id' => (int)$row['perusahaan_id'],
            'logo' => company_initials($row['nama_perusahaan']),
            'logoUrl' => $row['perusahaan_logo'] ?: '',
            'logoBg' => '#E8F4FF',
            'logoCol' => '#1B5EA8',
            'location' => $row['lokasi'],
            'type' => $row['tipe'],
            'mode' => $row['mode_kerja'],
            'category' => strtolower($row['industri'] ?: 'lainnya'),
            'exp' => $row['pengalaman'] ?: 'Terbuka',
            'salary' => $salary,
            'salaryRaw' => $gajiMax > 0 ? round($gajiMax / 1000000) : 0,
            'posted' => date('d M Y', strtotime($row['created_at'])),
            'saved_at' => date('d M Y', strtotime($row['saved_at'])),
            'status' => $row['status'],
            'desc' => $row['deskripsi'] ?: '',
            'qual' => array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n|,/', $row['kualifikasi'] ?: '')))),
        ];
    }

    echo json_encode(["status" => "ok", "data" => $jobs]);
} catch (Exception $e) {
    echo json_encode(["status" => "error", "pesan" => "Gagal memuat lowongan tersimpan: " . $e->getMessage()]);
}
?>