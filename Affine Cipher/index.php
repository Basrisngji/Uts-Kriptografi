<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formulir Data Nasabah</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px; /* Menentukan lebar formulir */
    margin: auto; /* Menengahkan formulir */
}

h2 {
    text-align: center;
    color: #333;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 8px;
    color: #555;
}

input {
    padding: 10px;
    margin-bottom: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"] {
    background-color: #4caf50;
    color: #fff;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>

    <div class="container">
        <h2>Data Nasabah</h2>

    <form action="process.php" method="post">
    Nama: <input type="text" name="nama">
    Alamat: <input type="text" name="alamat">
    Password: <input type="password" name="password">
    <h4>Parameter</h4>
    a: <input type="text" name="a">
    b: <input type="text" name="b">
    <input type="submit" value="Simpan">
    <a class="link-underline link-underline-opacity-0" href="data.php">Lihat Data.</a>
</form>

</body>
</html>
