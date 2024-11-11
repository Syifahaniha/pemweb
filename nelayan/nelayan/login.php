<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah User</title>
    
    <!-- Menambahkan Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat"> -->


    
    <style>
        body {
            background-color: #3498db; /* Warna latar belakang biru laut */
            color: #fff; /* Warna teks putih */
            padding: 20px;
        }

        h2 {
            color: #fff; /* Warna teks putih */
        }

        form {
            background-color: #fff; /* Warna latar belakang formulir putih */
            padding: 20px;
            border-radius: 10px; /* Sudut formulir dibulatkan */
            box-shadow: 0px 0px 10px 0px #000; /* Bayangan untuk efek kelembutan */
        }

        input[type="submit"] {
            background-color: #3498db; /* Warna tombol biru laut */
            color: #fff; /* Warna teks tombol putih */
            border: none; /* Menghilangkan batas tombol */
            padding: 10px 20px; /* Padding pada tombol */
            border-radius: 5px; /* Sudut tombol dibulatkan */
            cursor: pointer; /* Kursor berubah menjadi tangan ketika diarahkan ke tombol */
        }

        input[type="submit"]:hover {
            background-color: #2980b9; /* Warna tombol saat dihover */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                
<h1 style="color:#F8F9F9; font-family: 'Papyrus', Fantasy; " class="text-center"><u><strong>Form Tambah Nelayan</strong></u></h1><br>
                <!-- <h2 style="color:#F8F9F9;" class="text-center"><u>Form Tambah Nelayan</u></h2><br> -->
                <form action="proses_login.php" method="post">
                    <!-- ID Users tidak perlu ditampilkan pada formulir -->

                    <div class="form-group">
                        <label style="color:black;" for="nama_nelayan"><strong>Nama Nelayan</strong></label>
                        <input type="text" name="nama_nelayan" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label style="color:black;"for="nomor_kapal"><strong>Nomor Kapal</strong></label>
                        <input type="text" name="nomor_kapal" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label style="color:black;" for="password"><strong>Password</strong></label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <input type="submit" value="Tambah User" class="btn btn-primary btn-block">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Menambahkan Bootstrap JS dan Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
