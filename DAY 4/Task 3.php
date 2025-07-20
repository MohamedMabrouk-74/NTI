<?php
$arr = ["name"=>"Mohamed","age" =>22,"Email"=>"mohamedmabrok252@gmail.com","city"=>"Damnhour"];

?>

<!DOCTYPE html>
<html>
    <head >
    <link href="css/bootstrap.css" rel="stylesheet">
    </head>
    <body class="bg-success">
        <div class="container mt-5">
            <ul class="list-group">
                <?php foreach($arr as $k => $x ):  ?>
                <li class="list-group-item">
                   <strong> <?= $k ?> </strong> : <?= $x ?> 
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <script src="js/bootstrap.bundle.js"></script>
    </body>
</html>