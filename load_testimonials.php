<?php
require 'koneksi.php';

$result = $conn->query("SELECT nama, role, tipe, pesan FROM career_feedback WHERE tipe = 'Testimoni' ORDER BY created_at DESC LIMIT 20");

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode(['status' => 'ok', 'data' => $data]);
$conn->close();
