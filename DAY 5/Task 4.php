<?php
$upload_ok = false;
$error_message = '';
$image_path = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $allowed_types = ['image/jpeg', 'image/png'];
    $file_type = $_FILES["image"]["type"];
    $file_tmp = $_FILES["image"]["tmp_name"];
    $file_name = basename($_FILES["image"]["name"]);

    if (in_array($file_type, $allowed_types)) {
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir); 
        }

        $target_file = $target_dir . time() . "_" . $file_name;

        if (move_uploaded_file($file_tmp, $target_file)) {
            $upload_ok = true;
            $image_path = $target_file;
        } else {
            $error_message = "Erorr";
        }
    } else {
        $error_message = "img";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Upload</title>
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4">
        <h4 class="mb-4 text-center">Upload Image (PNG or JPG)</h4>

        <?php if ($error_message): ?>
            <div class="alert alert-danger text-center"><?php echo $error_message; ?></div>
        <?php elseif ($upload_ok): ?>
            <div class="alert alert-success text-center">Done</div>
            <div class="text-center">
                <img src="<?php echo $image_path; ?>" class="img-fluid rounded" style="max-height: 300px;" alt="Uploaded Image">
            </div>
        <?php endif; ?>

        <form action="" method="POST" enctype="multipart/form-data" class="mt-4">
            <div class="mb-3">
                <label for="image" class="form-label">Choose img</label>
                <input type="file" name="image" id="image" accept="image/png, image/jpeg" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Ubload img</button>
        </form>
    </div>
</div>

</body>
</html>