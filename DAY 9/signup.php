<?php
include "db.php";
session_start();

$_SESSION['x'] = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {

    $name1 = isset($_POST['name']) ? $_POST['name'] : "";
    $email1 = isset($_POST['email']) ? $_POST['email'] : "";
    $pass1 = isset($_POST['pass']) ? $_POST['pass'] : "";

    $select = "SELECT * FROM admin WHERE email='$email1'";
    $result = mysqli_query($conn, $select);
    $rows = mysqli_num_rows($result);

    if ($rows == 0) {
        $pass1 = password_hash($pass1, PASSWORD_DEFAULT);
        $insert = "INSERT INTO admin (name, email, password)
                   VALUES ('$name1', '$email1', '$pass1')";
        $result2 = mysqli_query($conn, $insert);
    } else {
        include "sessiondestroy.php";
        header("Location: login1.php");
        exit;
    }

    $name = $_FILES["image"]["name"];
    $temp = $_FILES["image"]["tmp_name"];
    $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
    $type = explode("/", $_FILES["image"]["type"])[0];
    $allowed = ["png", "jpg", "jpeg"];

    if (in_array($ext, $allowed) && $type === "image") {
        $imageName = uniqid() . "." . $ext;
        move_uploaded_file($temp, 'upload/' . $imageName);
        $_SESSION['x'] = 1;

        $_SESSION["email"] = $_POST["email"];
        $_SESSION["password"] = $_POST["pass"];
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet">
    <title>Login Page</title>
</head>
<body class="p-3 bg-dark text-white">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 rounded-3 mt-5 p-5 shadow bg-dark">

                <?php if ($_SESSION['x'] == 1): ?>
                    <div class="card mx-auto mb-5" style="width: 100%;">
                        <img src="upload/<?= $imageName ?>" class="card-img-top" style="max-height: 300px; object-fit: cover;">
                        <div class="card-body text-dark">
                            <h5 class="card-title"><?= htmlspecialchars($name1) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($email1) ?></p>
                            <a href="products.php" class="btn btn-primary w-100">Go to Products</a>
                        </div>
                    </div>

                    <div class="col-md-12 mb-5">
                        <div class="alert alert-success text-center" role="alert">
                            Account created successfully!
                        </div>
                    </div>


                <?php endif; ?>

                
                <form method="post" enctype="multipart/form-data">
                    <h3 class="text-center mb-4">Sign Up</h3>

                    <div class="mb-4">
                        <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
                    </div>

                    <div class="mb-4">
                        <input type="email" name="email" class="form-control"  placeholder="Email" required>
                    </div>

                    <div class="mb-4">
                        <input type="password" name="pass" class="form-control"  placeholder="Password" required>
                    </div>

                    <div class="mb-4">
                        <input class="form-control" type="file" name="image" required>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Sign Up</button>
                </form>

            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.js"></script>
</body>
</html>