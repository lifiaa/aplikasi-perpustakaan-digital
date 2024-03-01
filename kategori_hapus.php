<?php

$id =$_GET['id'];
$query = mysqli_query($conn, "DELETE FROM kategori_buku WHERE id_kategori = $id");

?>

<script>
    alert('Data berhasil dihapus.')
    location.href = "main.php?page=kategori";
</script>