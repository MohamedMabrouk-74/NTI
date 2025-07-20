<!DOCTYPE html>
<html>
<head>
    <link href="css/bootstrap.css" rel="stylesheet">
</head>
<body class="bg-success">
    <?php
    if ($_SERVER['REMOTE_ADDR'] == "127.0.0.1") {
        header("Location: denied.php");
        exit;
    } else {
        echo '<div class="alert alert-primary" role="alert">';
        echo 'Access OK: valid Host.<br> REMOTE_ADDR: ' . $_SERVER['REMOTE_ADDR'] . '<br> REQUEST_METHOD: ' . $_SERVER['REQUEST_METHOD'];
        echo '</div>';
    }
    ?>
    <script src="js/bootstrap.bundle.js"></script>
</body>
</html>