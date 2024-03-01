<?php

$host = 'localhost';
$usn = 'root';
$pass = '';
$db = 'perpusdig';

$conn = mysqli_connect($host, $usn, $pass, $db);

// if($conn->connect_error){
//     die("koneksi gagal" . $conn->connect_error);
// } else{
//     echo "koneksi berhasil";
// }

mysqli_select_db($conn, $db);

?>
