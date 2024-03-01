<?php
session_start();
require_once "koneksi.php";

$error = '';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = md5($_POST['username']) ?? '';
    $password = MD5($_POST['password']) ?? '';
    $role = $_POST['role'] ?? '';

    if (empty($username) || empty($password)) {
        $error = "Username atau password salah.";
    } else {
        $hashed = MD5($password);
    }

    // check user credential
    $query = "SELECT * FROM user WHERE md5(username) = '$username' and md5(password) = '$password' ";
    $result = mysqli_query($conn, $query);
    //print_r($result);die;
    if (!$result) {
        $error = "ERROR: " . mysqli_error($conn);
    }


    if ($result->num_rows > 0) {
        // Mengambil data user dari hasil query
        $user = $result->fetch_assoc();
        //$_SESSION['id_user'] = $user['id_user'];
        //$_SESSION['role'] = $user['role'];
        $_SESSION = $user;
        //print_r($_SESSION);die;
        if (in_array($user['role'], ['admin', 'petugas', 'peminjam'])) {
            header("Location: main.php");
            exit;
        }
    } else {
        $message = "Username atau password salah.";
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
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-8 col-md-8">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                </div>
                                <form method="POST">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" id="username" placeholder="" class="form-control form-control-user">
                                        </div><br>
                                        <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" placeholder="" class="form-control form-control-user">
                                    </div>
                                    <div class="err"><?php echo $error; ?></div>
                                    <div class="btn my-3 justify-content-between">
                                        <button type="submit" name="submit" class="btn btn-primary">submit</button>
                                        <a href="regis.php" type="submit" name="" class="btn btn-primary">regis</a>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>