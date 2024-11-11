<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomor_kapal = $_POST['nomor_kapal'];
    $password = $_POST['password'];

    // Prevent SQL Injection
    $nomor_kapal = mysqli_real_escape_string($conn, $nomor_kapal);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM users WHERE nomor_kapal = '$nomor_kapal' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        // Login successful
        $row = mysqli_fetch_assoc($result);
        session_start();
        $_SESSION['id_users'] = $row['id_users'];
        $_SESSION['nama_nelayan'] = $row['nama_nelayan'];
        header("Location: index1.php"); // Redirect to the main page after successful login
    } else {
        // Login failed
        $error_message = "Nomor Kapal atau Password salah.";
    }
}

?>
<html>
<head>
    <title>WEB PENDATAAN HASIL TANGKAP IKAN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <body>
<?php if (isset($error_message)): ?>
                                        <p style="color: red;"><?php echo $error_message; ?></p>
                                    <?php endif; ?>
        <thead>
            <br>
            <div style="color:;white" class="judul">
                <u style="color:white;"><h1 style="color:white; margin-left: 80px;">PENDATAAN HASIL TANGKAP IKAN</h1></u>
                <h3 style=" margin-top:-20px;  color:white; margin-left: 80px; margin-right: 30px;">Pendataan hasil tangkap ikan menjadi kunci utama 
                    dalam mengelola sumber daya perikanan, memastikan keberlanjutan ekosistem laut, dan 
                    memberikan informasi penting bagi pengambil kebijakan di bidang perikanan. <br> &#11162;&#11162;&#11162;   <button class="btn btn-warning" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button></h3>
                </div>

                <div class="container-navbar">
                    <ul class="ul-navbar">
                        <li class="li-navbar">
                            <div id="id01" class="modal">


                                <form style="background-color:#DEEEFF;" class="modal-content" action="index.php" method="post">
                                    <div class="imgcontainer">
                                      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                                      <img src="nelayan yaw.png" alt="Avatar" class="avatar">   
                                  </div>

                                  <div class="container">
                                    
                                    <!-- <form action="login1.php" method="post"> -->
                                        <label for="Nomor Kapal"><b>Nomor Kapal</b></label>
                                        <input type="text" placeholder="Masukan Nomor Kapal" name="nomor_kapal" required>


                                        <label for="password">Password:</label>
                                        <input type="password" name="password" required>

                                        <button type="submit">Login</button>
                                        <label>
                                            <input type="checkbox" checked="checked" name="remember"> Remember me
                                        </label>
                                    </div>

                                    <div class="container" style="background-color:#DEEEFF;">
                                        <button style="background-color: red;" type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                                        <span class="psw"><a class="btn btn-success" style="color:white;" href="login.php">Create Account?</a></span>
                                    </div>
                                </form>
                            </div>

                        </div>
                        <div class="container-content" >
                            <img src="ikan-removebg-preview.png" width="99%" height="100%"/>
                        </div>
                        <div class="container-footer" >
                        </div>
                    </body>
                    </html>
                    <html>
                    <head>
