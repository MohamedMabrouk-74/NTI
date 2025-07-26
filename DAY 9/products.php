<?php
session_start();

include "db.php";

$session=isset($_SESSION["email"]) ?$_SESSION["email"]:"guest";


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image']) ) {
     
$m = $_FILES['image'];
$count = count($m['name']);
$allowed = ['png', 'jpg'];
$maxsize = 4 * 1024 * 1024;
$hasErrors = false;
$uploads = [];

$product=$_POST['product_name']?? null;
$des=$_POST['description']?? null;

for ($i = 0; $i < $count; $i++) {
        $name = $m['name'][$i];
        $tmp = $m['tmp_name'][$i];
        $size = $m['size'][$i];
        $errcode = $m['error'][$i];
        $type = explode('/', $m['type'][$i])[0];
        $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        $errors = [];

        if (!in_array($ext, $allowed)) {
            $errors[] = "Extension '$ext' of file '$name' is not allowed.";
        }
        if ($size > $maxsize) {
            $errors[] = "'$name' exceeds 4MB size limit.";
        }
        if ($type !== "image") {
            $errors[] = "'$name' is not recognized as an image.";
        }

        if (!empty($errors)) {
            echo "<div class='alert alert-danger'>";
            echo "<h1>No file uploaded because:</h1>";
            echo "<h3>'$name' is denied</h3>";
            foreach ($errors as $x) {
                echo "<p>$x</p>";
            }
            echo "</div>";
            $hasErrors = true;
        } else {
            $uniqueName = uniqid() . "_" . $name;
            $uploads[] = ["name" => $uniqueName, "tmp" => $tmp];
        }
    }


}
?>




<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet">
    <title>login page</title>
</head>

<body class="p-4 bg-dark">
    <div class="container">
        <div class="row mt-3 d-flex justify-content-center">
            <div class="col-md-6 p-4 bg-dark">
                <form method="post" enctype="multipart/form-data">
                    <div class="col-md-12 me-2 gap-1 d-flex justify-content-center ">
                        <div class="col-md-6  ">
                            <label class="form-label text-white">Product Name</label>
                            <input type="text" class="form-control " name="product_name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label text-white">Description</label>
                            <input type="text" class="form-control " name="description" required>
                        </div>
                    </div>
                    <div class="mb-3 mt-3  col-md-12 ">
                        <label class="form-label text-white">Product Images</label>
                        <input class="form-control" required type="file" multiple="multiple" name="image[]" id="formFile">
                    <div class="text-center">
                    <button type="submit" class="box col-6 text-center w-50 mb-3 mt-3 btn btn-primary ">Add Product</button>
                    </div>
                </form>


            </div>
        </div>
    </div>


                <div class="container ">
                <div class="row">
                <?php 
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && !$hasErrors) {
                foreach ($uploads as $file) {
                    $old_path="upload/" . $file['name'];
                    move_uploaded_file($file['tmp'],$old_path);
                    $encode=base64_encode($old_path);
                    $insert = "INSERT INTO products (name, description,image)
                    VALUES ('$product', '$des','$encode')";
                    mysqli_query($conn, $insert);


                    $select="SELECT * FROM products";
                    $result=mysqli_query($conn,$select);
                    
                    

                    $decode=base64_decode($encode);
                    



                    echo "<div class='col m-3 card bg-secondary' style='width: 18rem;'>";
                    echo " <img src='upload/" . $file['name'] . "' class=' card-img-top' width='200'>
                    <div class='card-body'>
                    <h5 class='card-title text-white'>$product</h5>
                    <p class='card-text text-white'>$des</p>
                    <p class='card-text text-white'>$decode</p>";
                    echo"<p><span class='text-white'>added by : </span><a class='text-white-50' href='login1.php'>" .$session  ."</a></p>";
                    echo "</div> </div>";

                  }

                   
                    
                    
                    
                 }
                ?>

        </div>
     </div>

    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>