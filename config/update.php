<?php
require_once './koneksi.php';


$id = $_GET['id'];

if(empty($id)) {
    exit("Ilegal!!");
}

$user = null;
$sql = "SELECT nama, email FROM users WHERE id = $id";
$result = $koneksi->query($sql);

if($result->num_rows != 1) {
    exit("Data tidak ditemukan");
} else {
    while($row = $result->fetch_assoc()) {
        $user[] = $row;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <style>
        .btn {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-success {
            background-color: green;
            color: white;
        }
        .btn-danger {
            text-decoration: none;
            background-color: red;
            color: white;
        }
    </style>
</head>
<body>
   <h1>Update Data Pengguna</h1>
   <form action="update_user.php" method="POST" enctype="multipart/form-data">
       <input type="hidden" name="id" value="<?php echo $id; ?>">
       <div class="form-group">
            <label for="">Nama Lengkap</label> <br>
            <input type="text" name="nama" id="nama" value="<?php echo $user[0]['nama']; ?>">
       </div>
       <div class="form-group">
            <label for="">Email</label> <br>
            <input type="email" name="email" id="email" value="<?php echo $user[0]['email']; ?>">
       </div>
       <div class="form-group">
            <label for="">Password</label> <br>
            <input type="password" name="password" id="password">
       </div>
       <div class="form-group">
            <label for="">Photo Profil</label> <br>
            <input type="file" name="gambar" id="gambar">
       </div>
       <br>
       <input class="btn btn-success" type="submit" value="Simpan">
       <a class="btn btn-danger" href="./tampil_data.php">Batal</a>
   </form>
</body>
</html>