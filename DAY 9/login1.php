<?php
include "db.php";
session_start();

$_SESSION['x']=0;

if($_SERVER['REQUEST_METHOD']=="POST"){


$email=isset($_POST['email'])? $_POST['email'] :"";
$_SESSION["email"]=$email;
$pass=isset($_POST['pass'])? $_POST['pass'] :"";
$_SESSION["password"]=$pass;
$select="SELECT * FROM admin WHERE
 email='$email'";

$result=mysqli_query($conn,$select);
$row=mysqli_num_rows($result);
$fet=mysqli_fetch_assoc($result);
if($row >=1) {

    if(password_verify($pass,$fet['password'])){
        $_SESSION['x']=1;

    }
    else{
        $_SESSION['x']=0;
    }

}else{
    echo "no user found";
}
}
?>


<!DOCTYPE html>
<html>

<head>
    <link href="css/bootstrap.css" rel="stylesheet">
    <title>login page</title>
</head>

<body class=" p-3 bg-dark ">
    <div class="container ">
        <div class=" row d-flex justify-content-center ">
            <div class="col-6  rounded-3 mt-5 p-5 shadow bg-dark">
            <?php if($_SESSION['x']==1): ?>
            <div class="alert alert-success" role="alert">
                 WELCOME, Admin (Admin)
            </div>
            <div class="d-flex gap-1 justify-content-between ">
            <a href="login1.php" name="logout" type="submit" class="btn btn-primary col-3 p-2 text-center">Logout</a>
            <a href="products.php"   type="submit" class="btn btn-primary col-4 p-2 text-center">products</a>
            <a href="signup.php" type="submit" class="btn btn-primary col-4 p-2 text-center">create account</a>  
            </div>
            <?php elseif(!empty($email)||!empty($pass)): ?>
                <div class="alert alert-danger text-center">
                 Wronge Email or password  
                 </div>

                <form method="post">
                  <div class="mb-3">
                     <label for="exampleInputEmail1" class="form-label text-white">Email</label>
                     <input type="email" name="email" class="form-control is-valid " id="exampleInputEmail1" aria-describedby="emailHelp" >
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label text-white">Password</label>
                       <input type="password" name="pass" class="form-control is-valid" id="exampleInputPassword1">
                  </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
                
              </form>

            <?php else: ?>
            <form method="post">
                  <div class="mb-3">
                     <label for="exampleInputEmail1" class="form-label text-white">Email</label>
                     <input type="email" name="email" class="form-control is-valid " id="exampleInputEmail1" aria-describedby="emailHelp" >
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label text-white">Password</label>
                       <input type="password" name="pass" class="form-control is-valid" id="exampleInputPassword1">
                  </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
                
              <?php endif; ?>
            </div>
        </div>
    </div>



    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>