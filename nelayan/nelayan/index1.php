<?php
session_start(); // Memulai sesi

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['id_users'])) {
    // Jika belum, arahkan ke halaman login
	header('Location: login.php');
	exit();
}

// Ambil nama nelayan dari sesi
$nama_nelayan = $_SESSION['nama_nelayan'];
$id_users = $_SESSION['id_users'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Pendataan Hasil Tangkap Ikan</title>

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Your custom CSS -->
	<style>
		/* Add your custom styles here */
		body {
			background-color: #AED6F1 ;
			padding: 20px;
			position: relative;
		}

		h2 {
			margin-bottom: 20px;
		}

		form {
			margin-bottom: 20px;
		}

		canvas {
			background-color: white;
			margin-top: 20px;
			position: relative;
			z-index: 1; /* Ensure canvas is above the background */

		}
		.navbar {
			margin-bottom: 20px;
			margin-top: -15px;
			margin-right: -15px;
			margin-left: -15px;
		}
	</style>

	<!-- Include Chart.js library -->
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<!-- Tautan ke index.php di pojok kiri atas -->
			<a  class="navbar-brand" href="index.php">Home</a>
			<a style="margin-left: 320px;" class="navbar-brand" href=""><marquee>Selamat Datang Nelayan: <?php echo $nama_nelayan; ?></marquee></a>


			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav ms-auto"> <!-- "ms-auto" untuk menyusun ke kanan -->
					<!-- Tautan ke logout.php di pojok kanan atas -->
					<li class="nav-item">
						<a style="color:white;" class="btn btn-danger nav-link" href="logout.php">Logout</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container" style="background-color: #F2F3F4;">
		<br>
		<h3>Form Input Hasil Tangkap Ikan</h3> 
		<hr>

		<form  action="proses.php" method="post">
			<div class="mb-3">
				<!-- <label for="users" class="form-label">ID Users:</label> -->
				<input type="hidden" class="form-control" name="id_users" value="<?= $id_users ?>">
			</div>

			<div class="mb-3">
				<label for="jenis_ikan" class="form-label">Jenis Ikan:</label>
				<input type="text" class="form-control" name="jenis_ikan" required>
			</div>

			<div class="mb-3">
				<label for="jumlah_ikan" class="form-label">Jumlah Ikan:</label>
				<input type="number" class="form-control" name="jumlah_ikan" required>
			</div>

			<div class="mb-3">
				<label for="berat_ikan" class="form-label">Berat Ikan (kg):</label>
				<input type="number" step="0.01" class="form-control" name="berat_ikan" required>
			</div>

			<div class="mb-3">
				<label for="tanggal_tangkap" class="form-label">Tanggal Tangkap Ikan:</label>
				<input type="date" step="0.01" class="form-control" name="tanggal_tangkap" required>
			</div>

			<button type="submit" class="btn btn-primary" name="submit_data">Simpan Data</button><br><br>
		</form>
	</div>
	<hr><br>

	<!-- Filter berdasarkan tanggal -->
	<div class="mb-3" style="margin-left:250px; margin-right: 250px;">
		<center><strong><label for="tanggal_filter" class="form-label">Filter Berdasarkan Tanggal Tangkap</label></strong></center>
		<div style="margin-left:200px; " class="row">
			<div class="col-md-6"> <!-- Kolom untuk input tanggal -->
				<input style="margin-left: 30px;" type="date" class="form-control" id="tanggal_filter">
			</div>
			<div class="col-md-3"> <!-- Kolom untuk tombol Filter -->
				<button class="btn btn-success" style=" margin-left:10px; margin-top: 0px;" onclick="updateChart()">Filter</button>
			</div>
		</div>
	</div>

	<!-- Tampilkan grafik di sini -->
	<div class="container">
		<canvas id="myChart" width="400" height="200"></canvas>
	</div>
<br>

	<script>
            // Inisialisasi grafik saat halaman dimuat
            var myChart;

            // Fetch data from the server and generate chart
            // Using AJAX to fetch data from the server
            // You may need to modify this part based on your server-side logic
            fetch('data.php')
            .then(response => response.json())
            .then(data => {
        // Simpan data awal untuk penggunaan filter
        window.originalChartData = data;

        var ctx = document.getElementById('myChart').getContext('2d');
        myChart = new Chart(ctx, {
        	type: 'bar',
        	data: {
        		labels: data.labels,
        		datasets: [{
        			label: 'Tonase  Ikan',
        			data: data.values,
        			backgroundColor: [
        			'rgba(255, 99, 132, 0.2)',
        			'rgba(54, 162, 235, 0.2)',
        			'rgba(255, 206, 86, 0.2)',
        			'rgba(88, 214, 141, 0.2)',
        			],
        			borderColor: [
        			'rgba(255, 99, 132, 1)',
        			'rgba(54, 162, 235, 1)',
        			'rgba(255, 206, 86, 1)',
        			'rgba(88, 214, 141, 1)',
        			],
        			borderWidth: 1
        		}]
        	},
        	options: {
        		scales: {
        			x: {
        				type: 'category',
                        labels: data.labels, // Gunakan tanggal_terakhir sebagai label
                        beginAtZero: true
                    },
                    y: {
                    	beginAtZero: true
                    }
                }
            }
        });
    });


            // Fungsi untuk memperbarui grafik berdasarkan tanggal yang dipilih
            function updateChart() {
            	var tanggalFilter = document.getElementById('tanggal_filter').value;

                // Filter data berdasarkan tanggal yang dipilih
                var filteredData = {
                	labels: [],
                	values: [],
                	tanggal_terakhir: []
                };

                for (var i = 0; i < window.originalChartData.labels.length; i++) {
                	var tanggal = window.originalChartData.tanggal_terakhir[i];
                	if (tanggal == tanggalFilter) {
                		filteredData.labels.push(window.originalChartData.labels[i]);
                		filteredData.values.push(window.originalChartData.values[i]);
                		filteredData.tanggal_terakhir.push(window.originalChartData.tanggal_terakhir[i]);
                	}
                }

                // Perbarui grafik dengan data yang difilter
                myChart.data.labels = filteredData.labels;
                myChart.data.datasets[0].data = filteredData.values;
                myChart.update();
            }
        </script>


        <!-- Bootstrap JS (optional) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
