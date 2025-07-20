<?php
$name=isset($_POST['name'])? $_POST['name'] :"";
$email=isset($_POST['email'])? $_POST['email'] :"";
$age=isset($_POST['age'])? $_POST['age'] :"";
$city=isset($_POST['city']) ? $_POST['city'] :"";
?>

<!DOCTYPE html>
<html>

<head>
    <link href="css/bootstrap.css" rel="stylesheet">
    <title>login page</title>
</head>

<body class=" p-3 bg-warning-subtle ">
    <div class="container">
        <div class=" row  justify-content-center">
            <div class="col-6 bg-white p-4 shadow rounded text-center rounded-4">
                <h2 class="text-center">USER PROFILE</h2>
                <h6 class="text-success mb-3 alert alert-primary">THANK YOU, <?php echo (explode(' ',$name)[0]); ?> </h6>
                <p> <strong>Fullname: </strong> <?php echo $name ?></p>
                <p> <strong>Email: </strong> <?php echo $email ?></p>
                <p> <strong>Age: </strong> <?php echo $age ?></p>
                <p> <strong>City: </strong> <?php echo $city ?></p>
                <a href="task3-1.php" class="btn btn-primary">back to form </a>
            </div>
        </div>
    </div>



    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>