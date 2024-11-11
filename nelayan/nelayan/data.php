<?php
include 'koneksi.php';

// Ambil id_users dari sesi
session_start();
$id_users = $_SESSION['id_users'];

// Ambil data dari database berdasarkan id_users
$sql = "SELECT jenis_ikan, SUM(berat_ikan) as total_berat, tanggal_tangkap FROM hasil_tangkap WHERE id_users = $id_users GROUP BY jenis_ikan, tanggal_tangkap";
$result = mysqli_query($conn, $sql);

// Persiapkan data untuk dikirim ke client
$data = array('labels' => array(), 'values' => array(), 'tanggal_terakhir' => array());

while ($row = mysqli_fetch_assoc($result)) {
    $data['labels'][] = $row['jenis_ikan'];
    $data['values'][] = $row['total_berat'];
    $data['tanggal_terakhir'][] = $row['tanggal_tangkap'];
}

// Kembalikan data dalam format JSON
header('Content-Type: application/json');
echo json_encode($data);

// Tutup koneksi ke database jika sudah selesai menggunakan
mysqli_close($conn);
?>
