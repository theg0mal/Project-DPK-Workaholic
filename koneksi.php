<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_workaholic";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    http_response_code(500);
    die(json_encode(["status" => "error", "pesan" => "Koneksi gagal: " . mysqli_connect_error()]));
}

mysqli_set_charset($conn, "utf8mb4");

function db_query_or_fail($sql) {
    global $conn;
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        throw new Exception(mysqli_error($conn));
    }
    return $result;
}

function db_column_exists($table, $column) {
    global $conn;
    $tableSafe = mysqli_real_escape_string($conn, $table);
    $columnSafe = mysqli_real_escape_string($conn, $column);
    $res = mysqli_query($conn, "SHOW COLUMNS FROM `$tableSafe` LIKE '$columnSafe'");
    return $res && mysqli_num_rows($res) > 0;
}

function db_add_column_if_missing($table, $column, $definition) {
    if (!db_column_exists($table, $column)) {
        db_query_or_fail("ALTER TABLE `$table` ADD COLUMN `$column` $definition");
    }
}

function ensure_profile_columns() {
    db_add_column_if_missing('users', 'headline', "VARCHAR(200) DEFAULT ''");
    db_add_column_if_missing('users', 'lokasi', "VARCHAR(100) DEFAULT ''");
    db_add_column_if_missing('users', 'tentang', 'TEXT NULL');
    db_add_column_if_missing('users', 'skills', 'TEXT NULL');
    db_add_column_if_missing('users', 'pengalaman_kerja', 'TEXT NULL');
    db_add_column_if_missing('users', 'pendidikan_info', 'TEXT NULL');
    db_add_column_if_missing('users', 'linkedin', "VARCHAR(200) DEFAULT ''");
    db_add_column_if_missing('users', 'portfolio', "VARCHAR(200) DEFAULT ''");
    db_add_column_if_missing('users', 'no_hp', "VARCHAR(20) DEFAULT ''");
    db_add_column_if_missing('users', 'foto_profile', "VARCHAR(255) DEFAULT ''");
}




function ensure_saved_jobs_table() {
    db_query_or_fail("CREATE TABLE IF NOT EXISTS saved_jobs (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        lowongan_id INT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        UNIQUE KEY uniq_saved_job (user_id, lowongan_id),
        INDEX idx_saved_user (user_id),
        INDEX idx_saved_lowongan (lowongan_id),
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
        FOREIGN KEY (lowongan_id) REFERENCES lowongan(id) ON DELETE CASCADE
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
}
function ensure_lamaran_columns() {
    db_add_column_if_missing('lamaran', 'cv_file', "VARCHAR(255) DEFAULT ''");
    db_add_column_if_missing('lamaran', 'cv_original_name', "VARCHAR(255) DEFAULT ''");
    db_add_column_if_missing('lamaran', 'cover_letter_file', "VARCHAR(255) DEFAULT ''");
    db_add_column_if_missing('lamaran', 'cover_letter_original_name', "VARCHAR(255) DEFAULT ''");
}
function ensure_company_columns() {
    db_add_column_if_missing('perusahaan', 'cari_kandidat', 'TEXT NULL');
    db_add_column_if_missing('perusahaan', 'tagline', "VARCHAR(200) DEFAULT ''");
    db_add_column_if_missing('perusahaan', 'logo', "VARCHAR(255) DEFAULT ''");
}

function company_initials($name) {
    $words = preg_split('/\s+/', trim($name));
    $letters = '';
    foreach ($words as $word) {
        if ($word !== '') {
            $letters .= strtoupper(substr($word, 0, 1));
        }
        if (strlen($letters) >= 2) break;
    }
    return $letters ?: 'CO';
}
function ensure_sample_jobs() {
    global $conn;

    $companies = [
        1 => ['Tokopedia', 'hr.tokopedia@workaholic.local', 'Teknologi', 'Jakarta Selatan', 'https://tokopedia.com'],
        2 => ['Gojek', 'hr.gojek@workaholic.local', 'Teknologi', 'Jakarta Pusat', 'https://gojek.com'],
        3 => ['Bank BCA', 'hr.bca@workaholic.local', 'Keuangan', 'Jakarta Barat', 'https://bca.co.id'],
        4 => ['KumparanNews', 'hr.kumparan@workaholic.local', 'Media', 'Jakarta Timur', 'https://kumparan.com'],
        5 => ['Shopee Indonesia', 'hr.shopee@workaholic.local', 'E-commerce', 'Jakarta Selatan', 'https://shopee.co.id'],
        6 => ['Ruangguru', 'hr.ruangguru@workaholic.local', 'Pendidikan', 'Bandung', 'https://ruangguru.com'],
        7 => ['RS Siloam', 'hr.siloam@workaholic.local', 'Kesehatan', 'Surabaya', 'https://siloamhospitals.com'],
        8 => ['Pertamina', 'hr.pertamina@workaholic.local', 'Energi', 'Jakarta Pusat', 'https://pertamina.com'],
        9 => ['Wardah Cosmetics', 'hr.wardah@workaholic.local', 'Kecantikan', 'Tangerang', 'https://wardahbeauty.com'],
        10 => ['Traveloka', 'hr.traveloka@workaholic.local', 'Travel', 'Jakarta Selatan', 'https://traveloka.com'],
        11 => ['Prudential Indonesia', 'hr.prudential@workaholic.local', 'Asuransi', 'Jakarta Pusat', 'https://prudential.co.id'],
        12 => ['Kompas Gramedia', 'hr.kg@workaholic.local', 'Media', 'Jakarta Pusat', 'https://kompasgramedia.com'],
    ];

    foreach ($companies as $id => $c) {
        $nama = mysqli_real_escape_string($conn, $c[0]);
        $email = mysqli_real_escape_string($conn, $c[1]);
        $industri = mysqli_real_escape_string($conn, $c[2]);
        $kota = mysqli_real_escape_string($conn, $c[3]);
        $website = mysqli_real_escape_string($conn, $c[4]);
        $password = password_hash('password123', PASSWORD_DEFAULT);
        mysqli_query($conn, "INSERT IGNORE INTO perusahaan (id, nama_perusahaan, email, password, industri, deskripsi, kota, website) VALUES ($id, '$nama', '$email', '$password', '$industri', 'Perusahaan contoh untuk demo Workaholic.', '$kota', '$website')");
    }

    $jobs = [
        1 => [1, 'Frontend Developer', 'Jakarta Selatan', 'Full-time', 'Hybrid', '1-3 Tahun', 8000000, 14000000, 'Membangun dan menyempurnakan antarmuka pengguna.', 'HTML, CSS, JavaScript, React.js'],
        2 => [2, 'UI/UX Designer', 'Jakarta Pusat', 'Full-time', 'Remote', '3-5 Tahun', 12000000, 20000000, 'Merancang pengalaman pengguna untuk produk digital.', 'Portfolio kuat dan mahir Figma'],
        3 => [3, 'Data Analyst', 'Jakarta Barat', 'Full-time', 'On-site', '1-3 Tahun', 7000000, 11000000, 'Menganalisis data transaksi dan insight bisnis.', 'SQL, Python/R, Tableau/Power BI'],
        4 => [4, 'Content Writer', 'Jakarta Timur', 'Part-time', 'Remote', 'Fresh Graduate', 3000000, 5000000, 'Menulis artikel informatif dan engaging.', 'Komunikasi, jurnalistik, SEO dasar'],
        5 => [5, 'Backend Engineer (Node.js)', 'Jakarta Selatan', 'Full-time', 'Hybrid', '3-5 Tahun', 15000000, 25000000, 'Membangun layanan backend skala besar.', 'Node.js, TypeScript, microservices'],
        6 => [6, 'Guru Matematika SMA', 'Bandung', 'Full-time', 'On-site', '1-3 Tahun', 5000000, 8000000, 'Mengajar Matematika untuk kelas 10-12.', 'S1 Pendidikan Matematika dan pengalaman mengajar'],
        7 => [7, 'Perawat Klinis', 'Surabaya', 'Full-time', 'On-site', 'Fresh Graduate', 4000000, 7000000, 'Bergabung di unit rawat inap rumah sakit.', 'D3/S1 Keperawatan dan STR aktif'],
        8 => [8, 'Legal Officer', 'Jakarta Pusat', 'Full-time', 'On-site', '1-3 Tahun', 9000000, 14000000, 'Mendukung kontrak dan analisis regulasi.', 'S1 Hukum dan paham kontrak'],
        9 => [9, 'Social Media Specialist', 'Tangerang', 'Full-time', 'Hybrid', '1-3 Tahun', 5000000, 9000000, 'Mengelola strategi konten media sosial.', 'Copywriting dan analitik sosial media'],
        10 => [10, 'Mobile Developer (Flutter)', 'Jakarta Selatan', 'Full-time', 'Remote', '3-5 Tahun', 13000000, 22000000, 'Membangun aplikasi mobile perjalanan.', 'Flutter, Dart, REST API'],
        11 => [11, 'Aktuaris Junior', 'Jakarta Pusat', 'Full-time', 'On-site', 'Fresh Graduate', 8000000, 13000000, 'Analisis risiko dan pelaporan keuangan.', 'Matematika, Statistika, Aktuaria'],
        12 => [12, 'Graphic Designer', 'Jakarta Pusat', 'Full-time', 'On-site', '1-3 Tahun', 5000000, 8000000, 'Mengerjakan kebutuhan visual media.', 'Adobe Illustrator, Photoshop, portfolio desain'],
    ];

    foreach ($jobs as $id => $j) {
        $perusahaanId = (int)$j[0];
        $judul = mysqli_real_escape_string($conn, $j[1]);
        $lokasi = mysqli_real_escape_string($conn, $j[2]);
        $tipe = mysqli_real_escape_string($conn, $j[3]);
        $mode = mysqli_real_escape_string($conn, $j[4]);
        $pengalaman = mysqli_real_escape_string($conn, $j[5]);
        $gajiMin = (int)$j[6];
        $gajiMax = (int)$j[7];
        $deskripsi = mysqli_real_escape_string($conn, $j[8]);
        $kualifikasi = mysqli_real_escape_string($conn, $j[9]);
        mysqli_query($conn, "INSERT IGNORE INTO lowongan (id, perusahaan_id, judul, lokasi, tipe, mode_kerja, pengalaman, gaji_min, gaji_max, deskripsi, kualifikasi, status) VALUES ($id, $perusahaanId, '$judul', '$lokasi', '$tipe', '$mode', '$pengalaman', $gajiMin, $gajiMax, '$deskripsi', '$kualifikasi', 'aktif')");
    }
}
?>

