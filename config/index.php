<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/styles.css">
    <style>
                /* Mengatur dasar halaman */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Kotak container untuk form */
        .login-container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        /* Judul "Login" */
        #FormRegistrasi h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        /* Grup untuk label dan input */
        .input-group {
            margin-bottom: 15px;
        }

        /* Pengaturan label */
        .input-group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        /* Pengaturan kolom input */
        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box; /* Agar padding tidak menambah lebar */
        }

        /* Tombol Login */
        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #007bff;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }

        #tengah {
            justify-content: center; /* Menengahkan secara horizontal */
            display: flex;
            align-items: center;   /* Menengahkan secara vertikal */
        }

/* Efek saat kursor di atas tombol */
button:hover {
    background-color: #0056b3;
}
    </style>
</head>
<body>
    
<div class="login-container">
    <form id="FormRegistrasi" action="proses_registrasi.php" method="post" onsubmit="return validateForm()">
        <h2>Login</h2>
         <div class="input-group">
                <label for="nama">Username</label>
                <input type="text" id="nama" name="nama" required>
        </div>
         <div class="input-group">
            <label for="email">Masukkan Email Anda : </label>
            <input type="email" id="email" name="email">
        </div>
        <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
        </div>
       

        <input type="submit" style="background-color: #007bff; color: white; border: none; border-radius: 5px; padding: 10px 15px; cursor: pointer;" value="Daftar">
    </form>

    <a href="./tampil_data.php" id="tengah">Lihat Data Pendaftaran</a>
    <script src="script.js"></script>
</div>



    <?php
        // echo "<h1>Hello, World!</h1>";
        // $nama = "Oktora Rizka";
        // $umur = 19;
        // $alamat = "Jl. Pramuka";
        // echo "<h3>Nama: $nama dan Umur: $umur tahun, Alamat: $alamat</h3>";

        // if (isset($_POST['nama']) && isset($_POST['email']) && isset($_POST['password'])) {
        //     $nama_dari_form = htmlspecialchars($_POST['nama']);
        //     $email_dari_form = htmlspecialchars($_POST['email']);
        //     $password_dari_form = htmlspecialchars($_POST['password']);

        //     echo "<h3>Nama: $nama_dari_form</h3>";
        //     echo "<h3>Email: $email_dari_form</h3>";
        // }



    ?>
</body>
</html>