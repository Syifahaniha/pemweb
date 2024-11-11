<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_data"])) {
    // Ambil nilai dari formulir
    $id_users = $_POST['id_users'];
    $jenis_ikan = $_POST['jenis_ikan'];
    $jumlah_ikan = $_POST['jumlah_ikan'];
    $berat_ikan = $_POST['berat_ikan'];
    $tanggal_tangkap = $_POST['tanggal_tangkap'];
     // Tanggal saat ini

    // Simpan ke dalam tabel hasil_tangkap
    $sql_insert = "INSERT INTO hasil_tangkap (jenis_ikan, jumlah_ikan, berat_ikan, tanggal_tangkap,id_users) 
                   VALUES ('$jenis_ikan', $jumlah_ikan, $berat_ikan, '$tanggal_tangkap', '$id_users')";
    mysqli_query($conn, $sql_insert);
}

// Tutup koneksi ke database jika sudah selesai menggunakan
mysqli_close($conn);
header("Location: index1.php"); // Redirect back to the form
?>
