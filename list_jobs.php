<?php
include 'koneksi.php';
header('Content-Type: application/json');

try {
    ensure_sample_jobs();
    ensure_company_columns();

    $sql = "SELECT l.*, p.nama_perusahaan, p.industri, p.logo AS perusahaan_logo, p.kota AS perusahaan_kota FROM lowongan l JOIN perusahaan p ON p.id = l.perusahaan_id WHERE l.status='aktif' ORDER BY l.created_at DESC, l.id DESC";
    $res = mysqli_query($conn, $sql);
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
        $category = strtolower($row['industri'] ?: 'lainnya');
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
            'category' => $category,
            'exp' => $row['pengalaman'] ?: 'Terbuka',
            'salary' => $salary,
            'salaryRaw' => $gajiMax > 0 ? round($gajiMax / 1000000) : 0,
            'posted' => date('d M Y', strtotime($row['created_at'])),
            'desc' => $row['deskripsi'] ?: '',
            'qual' => array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n|,/', $row['kualifikasi'] ?: '')))),
        ];
    }
    echo json_encode(["status" => "ok", "data" => $jobs]);
} catch (Exception $e) {
    echo json_encode(["status" => "error", "pesan" => $e->getMessage()]);
}
?>