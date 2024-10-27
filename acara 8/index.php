<?php
// Mengatur koneksi ke MySQL
$servername = "localhost";   // Nama server (biasanya 'localhost')
$username = "root";          // Nama pengguna MySQL (default 'root' untuk XAMPP)
$password = "";              // Kosongkan jika tidak ada password (default XAMPP)
$dbname = "latihan";   // Nama database yang digunakan

// Membuat koneksi ke MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa apakah koneksi berhasil
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Menulis query SQL untuk mengambil semua data dari tabel 'penduduk'
$sql = "SELECT * FROM penduduk";
$result = $conn->query($sql);

// Memeriksa apakah ada data yang ditemukan
if ($result && $result->num_rows > 0) {
    // Membuat tabel untuk menampilkan data
    echo "<table border='1' cellpadding='10' style='border-collapse: collapse;'>";
    echo "<tr>
            <th>Kecamatan</th>
            <th>Luas (km²)</th>
            <th>Jumlah Penduduk</th>
            <th>Longitude</th>
            <th>Latitude</th>
            </tr>";
    
    // Mengambil setiap baris data dan menampilkannya di tabel
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row["Kecamatan"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["Luas"]) . "</td>";
        echo "<td align='right'>" . htmlspecialchars($row["Jumlah_Penduduk"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["Longitude"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["Latitude"]) . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} else {
    // Jika tidak ada data, tampilkan pesan
    echo "Tidak ada hasil yang ditemukan.";
}

// Menutup koneksi setelah selesai
$conn->close();
?>
