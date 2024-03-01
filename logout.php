<?php 

session_start();
$_SESSION['username'] = '';
$_SESSION['password'] = '';

header('location: login.php');
// session_destroy();
exit();

?>

