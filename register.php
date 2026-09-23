<?php

require "koneksi.php";

$nama = $_POST["nama"];
$nim = $_POST["nim"];
$email = $_POST["email"];
$username = $_POST["username"];
$password = $_POST["password"];

$password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO mahasiswa (nama, nim, email, username, password)
        VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);

$stmt->bind_param("sssss", $nama, $nim, $email, $username, $password);

if ($stmt->execute()) {
    echo "Register berhasil!";
    echo "<br><br>";
    echo "<a href='login.html'>Login</a>";
} else {
    echo "Register gagal: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>