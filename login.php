<?php
session_start();
include("../volunteer_network/common/db.php");
$email = $password = "";
$email_error = $password_error = "";
$error = "";
if (isset($_POST["submit"])) {
    extract($_POST);
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION["email"] = $email;
        $_SESSION["name"] = $row["name"];
        $_SESSION["id"] = $row["id"];

        echo "<script>window.location.href='index.php'</script>";
    } else {
        $error = "Incorrect Email or Password Please Try Again";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Network</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="resources/style.css" />
</head>

<body class="bg-light">
    <div class="custom-nav-bg p-2 text-center text-white">
        <h3>Volunteer network</h3>
    </div>
    <div class="container-fluid">
        <div class="row mt-5 mb-5 g-1">
            <div class="col-md-4">

            </div>
            <div class="col-md-4">
                <div class="bg-white shadow rounded">
                    <div class="custom-nav-bg p-2 text-white text-center">
                        <h4>Login</h4>
                    </div>
                    <div class="p-2">
                        <p class="text-danger p-1 text-center"><?= $error ?></p>
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input value="<?= $email ?>" type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
                                <div id="email" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input value="<?= $password ?>" type="password" name="password" class="form-control" id="password" required>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Remember me</label>
                            </div>
                            <p>Not registered yet? <a href="register.php">Register now</a></p>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>
</body>

</html>