<?php
// Hubungkan ke file koneksi database
require_once './koneksi.php';

// Buat query untuk mengambil data nama dan email dari tabel users
// Mengurutkan berdasarkan id secara descending (data terbaru di atas)
$sql = "SELECT id, nama, email, tanggal_registrasi FROM users ORDER BY id ASC";
$result = mysqli_query($koneksi, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendaftar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>Data Pengguna Terdaftar</h1>

    <?php
    // Cek apakah query menghasilkan baris data
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<thead>
            <tr>
                <th>ID</th>
                <th>Nama Lengkap</th>
                <th>Alamat Email</th>
                <th>Tanggal Registrasi</th>
                <th>Action</th>
            </tr>
        </thead>";
        echo "<tbody>";
        // Lakukan perulangan untuk setiap baris data
        while($row = mysqli_fetch_assoc($result)) {
            // Tampilkan data di dalam baris tabel
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["nama"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["tanggal_registrasi"]) . "</td>";
            echo '<td> <a href="./update.php?id=' . $row["id"] . '">Update</a></td>';
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    } else {
        // Tampilkan pesan jika tidak ada data sama sekali
        echo "<p>Belum ada data yang terdaftar.</p>";
    }

    // Tutup koneksi ke database
    mysqli_close($koneksi);
    ?>

    <br>
    <a href="./index.php">Kembali ke Form Registrasi</a>
</body>
</html>