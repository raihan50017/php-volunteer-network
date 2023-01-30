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
            <div class="col-md-3">

            </div>
            <div class="col-md-6">
                <div class="bg-white shadow rounded">
                    <div class="custom-nav-bg p-2 text-white text-center">
                        <h4>Registration</h4>
                    </div>
                    <div class="p-2">
                        <?php

                        include("../volunteer_network/common/db.php");

                        if (isset($_POST["submit"])) {
                            extract($_POST);

                            $sql = "INSERT INTO users(name, email, phone, password, image) VALUES('$name', '$email', '$phone', '$password','default.png')";

                            if (mysqli_query($conn, $sql)) {
                                echo "<p clacc='p-2 bg-success text-white fs-5 fw-bold position-absolute'>Registration complete</p>";
                            }
                        }
                        ?>
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" required>
                                <div id="email" class="form-text">We'll never share your email with anyone else.</div>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="tel" name="phone" class="form-control" id="phone" placeholder="01xxxxxxxxx" pattern="[0-9]{11}" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password</label>
                                <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" required>
                            </div>
                            <p>Already registered? <a href="login.php">Login now</a></p>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div>
</body>

</html>