<?php

require "koneksi.php";

$username = $_POST["username"];
$password = $_POST["password"];

$sql = "SELECT nama, password FROM mahasiswa WHERE username = ?";

$stmt = $conn->prepare($sql);

$stmt->bind_param("s", $username);

$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 1) {

    $data = $result->fetch_assoc();

    if (password_verify($password, $data["password"])) {

    echo "Selamat Datang, " . $data["nama"];
    } else {

        echo "Username atau Password salah!";
    }
} else {

    echo "Username atau Password salah!";
}

$stmt->close();
$conn->close();

