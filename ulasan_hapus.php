<?php

$id =$_GET['id'];
$query = mysqli_query($conn, "DELETE FROM ulasan_buku WHERE id_ulasan = $id");

?>

<script>
    alert('Data berhasil dihapus.')
    location.href = "main.php?page=ulasan";
</script>