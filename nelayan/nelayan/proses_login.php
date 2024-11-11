<?php
// Memasukkan file koneksi
include "koneksi.php";

// Mengambil nilai dari formulir atau variabel lainnya
$nama_nelayan = $_POST['nama_nelayan'];
$nomor_kapal = $_POST['nomor_kapal'];
$password = $_POST['password'];

// Melakukan koneksi ke database
$conn = new mysqli($servername, $username, $password_db, $database);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Menyusun query SQL untuk menambahkan data (tanpa menambahkan nilai ke id_users)
$sql = "INSERT INTO users (nama_nelayan, nomor_kapal, password) VALUES ('$nama_nelayan', '$nomor_kapal', '$password')";

// Menjalankan query
if ($conn->query($sql) === TRUE) {
    echo "Data berhasil ditambahkan";

    // Mengarahkan kembali ke halaman index.php
    header("Location: index.php");
    exit(); // Pastikan untuk keluar setelah mengarahkan pengguna
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi ke database
$conn->close();
?>
