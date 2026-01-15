<?php
$conn = new mysqli("localhost", "root", "", "pss10");

$nama = "dody";
$email = "dody@pss10.com";
$password = password_hash("123456", PASSWORD_DEFAULT);
$role = "superadmin";


$stmt = $conn->prepare("INSERT INTO users (nama, email, password, role) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nama, $email, $password, $role);
$stmt->execute();

echo "User berhasil ditambahkan";
?>
