<?php
$arr = ["lap" =>100 ,"calc"=>400 , "Monito"=>200 ,"Mouse"=>150 ];

?>

<!DOCTYPE html>
<html>
    <head >
    <link href="css/bootstrap.css" rel="stylesheet">
    </head>
    <body class="bg-success">
        <div class="container mt-5">
            <ul class="list-group ">
                <?php foreach($arr as $k => $x ):  ?>
                <li class="list-group-item d-flex justify-content-between">
                   <span><strong> <?= $k ?> </strong></span> <span class="badge text-bg-primary rounded-pill"> <?= $x  ." EGP"?> </span>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php ksort($arr);
         ?>
        <div class="container mt-5">
            <h1>ksort()</h1>
            <ul class="list-group">
                <?php foreach($arr as $k => $x ):  ?>
                <li class="list-group-item d-flex justify-content-between">
                   <span><strong> <?= $k ?> </strong></span> <span class="badge text-bg-primary rounded-pill"> <?= $x ." EGP" ?> </span>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php 
        
        asort($arr);
        
        ?>
        <div class="container mt-5 mb-5">
            <h1>asort()</h1>
            <ul class="list-group">
                <?php foreach($arr as $k => $x ):  ?>
                <li class="list-group-item d-flex justify-content-between">
                   <span><strong> <?= $k ?> </strong></span> <span class="badge text-bg-primary rounded-pill"> <?= $x ." EGP"  ?> </span>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>


        <script src="js/bootstrap.bundle.js"></script>
    </body>
</html>