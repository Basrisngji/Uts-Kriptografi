<?php
// Koneksi ke database (gantilah dengan informasi koneksi Anda)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "affine_cipher";

$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Ambil data dari database
$sql = "SELECT id, nama, alamat, password FROM user";
$result = $conn->query($sql);

// Tangani permintaan penghapusan
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["hapus"])) {
    $id_to_delete = $_GET["hapus"];
    $sql_delete = "DELETE FROM user WHERE id = $id_to_delete";

    if ($conn->query($sql_delete) === TRUE) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Error: " . $sql_delete . "<br>" . $conn->error;
    }
}

// Tutup koneksi ke database
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Table</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
            position: relative;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4caf50;
            color: white;
        }

        .hapus-btn{
            background-color: #f44336;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 5px;
            transition: background-color 0.3s ease;
        }
        .kembali-btn {
            background-color: #2f32d3;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 5px;
            transition: background-color 0.3s ease;
        }

        .hapus-btn:hover,
        .kembali-btn:hover {
            background-color: #2f32d3;
        }

        
    </style>
</head>
<body>

<h2>Data Table</h2>

<table>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Password</th>
        <th>Aksi</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        // Output data dari setiap baris
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["nama"] . "</td>";
            echo "<td>" . $row["alamat"] . "</td>";
            echo "<td>" . $row["password"] . "</td>";
            echo "<td>
                    <button class='hapus-btn' onclick='hapusData(" . $row["id"] . ")'>Hapus</button>
                   
                  </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Tidak ada data.</td></tr>";
    }
    ?>
</table>
<button class='kembali-btn' onclick='window.history.back()'>Kembali</button>

<script>
    function hapusData(id) {
        if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
            window.location.href = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?hapus=" + id;
        }
    }
</script>

</body>
</html>
