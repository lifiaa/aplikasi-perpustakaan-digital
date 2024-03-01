<?PHP 

// LOGIN THO
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM user WHERE username = '$username' or password = '$password' ";
    $sql = mysqli_query($conn, $query);

    if(mysqli_num_rows($result)>0){
        echo "username sudah ada";
    }else{
        if($password == $password){
            $query = "INSERT INTO user VALUES ('', '$role', '$username', '$password', '$email', '$nama_lengkap', '$alamat')";
            mysqli_query($conn, $query);
        } else{
            echo "password salah";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2>LOGIN</h2>
        <form action="main.php" method="POST">
            <div class="form-group">
                <label for="">username</label>
                <input type="text" name="username" id="username" placeholder="">
            </div>
            <div class="form-group">
                <label for="">password</label>
                <input type="password" name="password" id="password" placeholder="">
            </div>
            <button type="submit" name="submit">submit</button>
        </form>
        <a href="regis.php" type="submit" name="">regis</a>
    </div>
</body>

</html>