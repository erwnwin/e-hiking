<?php
// Koneksi ke database
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "e-hiking";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil semua pengguna
$sql = "SELECT id_user, password FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id_user = $row['id_user'];
        $plain_password = $row['password'];

        // Buat hash password
        $hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);

        // Update password di database
        $update_sql = "UPDATE user SET password='$hashed_password' WHERE id_user='$id_user'";
        if ($conn->query($update_sql) === TRUE) {
            echo "Password untuk user ID $id_user berhasil diupdate.<br>";
        } else {
            echo "Error updating password for user ID $id_user: " . $conn->error . "<br>";
        }
    }
} else {
    echo "Tidak ada pengguna ditemukan.";
}

$conn->close();
