<?php 

session_start();
require_once 'koneksi.php';


$pesanSukses = "";
$isEditing = false;
$editId = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_lengkap = $_POST['nama_lengkap'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $email = $_POST['email'] ?? '';
    $alamat = $_POST['alamat'] ?? '';
    $editId = $_POST['id_user'] ?? null;

    if ($editId) {
        $query = "UPDATE user SET nama_lengkap = '$nama_lengkap', username = '$username', password = '$password', email = '$email', alamat = '$alamat' WHERE id = '$editId'";
        $pesanSukses = "Pelanggan berhasil diperbarui.";
    } else {
        $query = "INSERT INTO user (nama_lengkap, username, password, email, alamat) VALUES ('$nama_lengkap', '$username', '$password', '$email', '$alamat')";
        $pesanSukses = "Pelanggan berhasil didaftarkan.";
    }

    $result = $conn->query($query);
    if (!$result) {
        $pesanSukses = "Gagal memproses permintaan.";
    }
}

$members = [];
$query = "SELECT * FROM user";
$result = $conn->query($query);
if ($result) {
    $members = $result->fetch_all(MYSQLI_ASSOC);
    $result->free_result();
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET['action']) && $_GET['action'] == 'edit' && isset($_GET['id'])) {
        $isEditing = true;
        $editId = $_GET['id_user'];
        $editQuery = "SELECT * FROM user WHERE id = $id_user";
        $editResult = $conn->query($editQuery);
        if ($editResult) {
            $editData = $editResult->fetch_assoc();
            if (!$editData) {
                $isEditing = false;
                $pesanSukses = "Data tidak ditemukan.";
            }
        } else {
            $pesanSukses = "Gagal mengambil data untuk pengeditan.";
        }
    }

    if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
        $deleteId = $_GET['id'];
        $deleteQuery = "DELETE FROM tb_member WHERE id = '$deleteId'";
        $deleteResult = $conn->query($deleteQuery);
        if ($deleteResult) {
            $pesanSukses = "Pelanggan berhasil dihapus.";
            header('Location: regis_pelanggan.php');
            exit();
        } else {
            $pesanSukses = "Gagal menghapus pelanggan.";
        }
    }
}






?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regis</title>
    <link rel="stylesheet" href="style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2>Regis</h2>
        <form action="regis.php" method="POST">
            <div class="form-group">
                <label for="">name</label>
                <input type="text" name="nama_lengkap" id="nama_lengkap" placeholder="">
            </div>
            <div class="form-group">
                <label for="">username</label>
                <input type="text" name="username" id="username" placeholder="">
            </div>
            <div class="form-group">
                <label for="">email</label>
                <input type="email" name="email" id="email" placeholder="">
            </div>
            <div class="form-group">
                <label for="">password</label>
                <input type="password" name="password" id="password" placeholder="">
            </div>
            <div class="form-group">
                <label for="">repeat password</label>
                <input type="password" name="password" id="password" placeholder="">
            </div>
            <div class="form-group">
                <label for="">alamat</label>
                <input type="text" name="alamat" id="alamat" placeholder="">
            </div>
           
            <input type="submit" name="submit" value="submit">
        </form>
        <a href="login.php" type="submit" name="">back to login</a>
    </div>
</body>

</html>