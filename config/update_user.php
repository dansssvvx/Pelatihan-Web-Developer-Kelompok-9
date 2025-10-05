<?php

// import koneksi
require_once './koneksi.php';

// Cek Method, gunakan post
if($_SERVER['REQUEST_METHOD'] != 'POST') {
    echo "<h1>Invalid Request</h1>";
    exit;
}

$id = $_POST['id'];

// Ambil data post, 
$nama = isset($_POST['nama']) ? $_POST['nama'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

// hanya update password jika ada isinya
if(!empty($password)) {
    // hash password sebelum disimpan
    $input['password'] = password_hash($password, PASSWORD_DEFAULT);
}

if(empty($nama) || empty($email) ) {
    echo "Nama dan Email tidak boleh kosong";
    exit;   
}

// input data sisanya
$nama = htmlspecialchars($nama);
$email = htmlspecialchars($email);

// sql query
$query = "UPDATE users SET nama=?, email=?";

if(!empty($password)) {
    $query .= ", password=?";
}

// tambahkan WHERE
$query .= " WHERE id=?";

$stmt = $koneksi->prepare($query);

if(!empty($password)){
    $stmt->bind_param("sssi", $nama, $email, $password, $id); // string, string, string, integer
} else {
    $stmt->bind_param("ssi", $nama, $email, $id); // string, string, integer
}

if($stmt->execute()) {
    $stmt->close();

    // cek apakah ada gambar
    if(isset($_FILES['gambar'])){
        $config = [
           'max_size' => 2000000
        ];
        $file = $_FILES['gambar'];

        $filename = uploadImage($file, $config);
        $query = "UPDATE users SET gambar=? WHERE id=?";

        $stmt = $koneksi->prepare($query);
        $stmt->bind_param("si", $filename, $id);

        $stmt->execute();
        $stmt->close();
    }
    header("Location: ./tampil_data.php");
} else {
    echo "Gagal mengupdate data";
    $stmt->close();
}

function uploadImage($file, $config = []) {
    $filename = null;

    $config = array_merge([

        'max_size' => 2000,
        'path' => 'uploads/',
        'filename' => null,
        'allowed_types' => ['JPG', 'JPEG', 'PNG','jpg', 'jpeg', 'png'],
        'old_file' => null
    ], $config);
    
    // ambil metadata dari gambar/file
    $name = $file['name'];
    $fileSize = $file['size'];
    $tmp = $file['tmp_name'];
    $ext = pathinfo($name, PATHINFO_EXTENSION);

    if(!in_array($ext, $config['allowed_types'])) {
        exit("hanya boleh upload file". join('/', $config['allowed_types']));
    }

    if($fileSize <= 0 || (!empty($config['max_size']) && $fileSize > $config['max_size'])) {
        exit("Ukuran file terlalu besar". round($config['max_size'] / 1000) . "MB");
    }

    if(!empty($config['filename'])) {
        $filename = substr(uniqid(), 8, 0). '.' . $ext;
    } else {
        $filename = $config['filename'] . '.' . $ext;
    }

    $pathdir = str_replace('/', DIRECTORY_SEPARATOR, $config['path']) . DIRECTORY_SEPARATOR . $filename;

    try {
        move_uploaded_file($tmp, $pathdir);
    }catch(\Throwable $th){
        exit($th->getMessage());
    }

    return $filename;
}

?>