<?php
include 'koneksi.php';
header('Content-Type: application/json');

try {
    ensure_sample_jobs();
    ensure_company_columns();

    $sql = "SELECT p.id, p.nama_perusahaan, p.email, p.industri, p.deskripsi, p.kota, p.website, p.logo, p.cari_kandidat, p.tagline, COUNT(l.id) AS total_lowongan FROM perusahaan p LEFT JOIN lowongan l ON l.perusahaan_id = p.id AND l.status='aktif' GROUP BY p.id ORDER BY p.created_at DESC, p.id DESC";
    $res = mysqli_query($conn, $sql);
    $companies = [];
    while ($row = mysqli_fetch_assoc($res)) {
        $companies[] = [
            'id' => (int)$row['id'],
            'name' => $row['nama_perusahaan'],
            'email' => $row['email'],
            'industry' => $row['industri'] ?: 'Belum diisi',
            'desc' => $row['deskripsi'] ?: 'Profil perusahaan belum dilengkapi.',
            'city' => $row['kota'] ?: '-',
            'website' => $row['website'] ?: '-',
            'looking' => $row['cari_kandidat'] ?: 'Belum ada preferensi kandidat.',
            'tagline' => $row['tagline'] ?: '',
            'jobs' => (int)$row['total_lowongan'],
            'logo' => company_initials($row['nama_perusahaan']),
            'logoUrl' => $row['logo'] ?: '',
            'logoBg' => '#E8F4FF',
            'logoCol' => '#1B5EA8'
        ];
    }
    echo json_encode(["status" => "ok", "data" => $companies]);
} catch (Exception $e) {
    echo json_encode(["status" => "error", "pesan" => $e->getMessage()]);
}
?>