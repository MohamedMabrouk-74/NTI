<?php 


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $m = $_FILES['image'];
    $count = count($m['name']);

    $allowed = ['png', 'jpg'];
    $maxsize = 4 * 1024 * 1024;
    $y=0;

    $uploads = [];

    for ($i = 0; $i < $count; $i++) {
        $name = $m['name'][$i];
        $tmp = $m['tmp_name'][$i];
        $size = $m['size'][$i];
        $errcode = $m['error'][$i];
        $type = explode('/', $m['type'][$i])[0];
        $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        $errors = [];
        

        if (!in_array($ext, $allowed)) {
            $errors[] = "The extension of this image '$name' is not allowed.";
        }
        if ($size > $maxsize) {
            $errors[] = "$name size is bigger than 4MB.";
        }
        if ($type !== "image") {
            $errors[] = "File '$name' is not recognized as an image.";
        }
        if (!empty($errors)) {
        echo "<div class='alert alert-danger'>";
        echo "<h1> No file uploaded because : </h1>";
        echo "<h3>".$name. "is Denied </h3>";
        foreach ($errors as $x) {
            echo "<p>$x</p>";
        }
        echo "</div>";
        $y=1;
        }
        else{
            $uniqueName = uniqid() . "_" . $name;
            $uploads[] = ["name" => $uniqueName, "tmp" => $tmp];
            }
    }
        if($x==0){
            move_uploaded_file($tmp, "upload/" .$uniqueName);
             echo "<div class='alert alert-success  mt-3 col-3'>Uploaded: " . $uniqueName ."<br>" ;
            echo "<img src='upload/" . $uniqueName . "' class='img-thumbnail mt-3' width='200'>";
            echo "</div>";
        }

}

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
            <div class="col-6 bg-white p-4 shadow rounded text-center">
               <form method="POST" enctype="multipart/form-data" class="p-3">
                <div class="mb-3">
                <label for="formFile" class="form-label">UPLOAD</label>
                <input class="form-control" required type="file" multiple="multiple" name="image[]" id="formFile">
                <button class="btn btn-primary mt-4" >UPLOAD</button>
                </div>

                </form>
            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>
