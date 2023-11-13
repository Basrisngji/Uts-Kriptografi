<?php

// Fungsi untuk mengenkripsi teks dengan Affine Cipher
function affineEncrypt($text, $a, $b) {
    $result = "";
    $text = strtoupper($text);

    for ($i = 0; $i < strlen($text); $i++) {
        if ($text[$i] != ' ') {
            $result .= chr((($a * (ord($text[$i]) - 65) + $b) % 26) + 65);
        } else {
            $result .= ' ';
        }
    }

    return $result;
}

// Fungsi untuk membersihkan input
function cleanInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Periksa apakah formulir telah dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Ambil nilai kunci Affine Cipher dari formulir
    $a = cleanInput($_POST["a"]);
    $b = cleanInput($_POST["b"]);

    // Data yang akan disimpan
    
    $nama = cleanInput($_POST["nama"]);
    $alamat = cleanInput($_POST["alamat"]);
    $password = cleanInput($_POST["password"]);

    // Enkripsi password sebelum disimpan ke database
    $encryptedPassword = affineEncrypt($password, $a, $b);

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

    // Simpan data ke database
    $sql = "INSERT INTO user (nama, alamat, password) VALUES ('$nama', '$alamat', '$encryptedPassword')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan ke database.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Tutup koneksi ke database
    $conn->close();
}
?>
