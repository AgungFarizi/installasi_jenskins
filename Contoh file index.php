<?php
include 'koneksi.php'; // Sertakan file koneksi

$sql = "SELECT nim, nama, jurusan, ipk FROM mahasiswa";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h2>Data Mahasiswa</h2>
    <table border="1">
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>IPK</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["nim"]. "</td>
                            <td>" . $row["nama"]. "</td>
                            <td>" . $row["jurusan"]. "</td>
                            <td>" . $row["ipk"]. "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Tidak ada data</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
<p>

<!-- Tambahkan di bagian body index.php -->
<p>
    <a href="export_csv.php" style="padding:10px 20px; background-color:#28a745; color:white; text-decoration:none; border-radius:5px;">Ekspor ke CSV</a>
    <a href="export_excel.php" style="padding:10px 20px; background-color:#007bff; color:white; text-decoration:none; border-radius:5px;">Ekspor ke Excel</a>
    <a href="export_pdf.php" style="padding:10px 20px; background-color:#dc3545; color:white; text-decoration:none; border-radius:5px;">Ekspor ke PDF</a>
</p>
</body>
</html>
