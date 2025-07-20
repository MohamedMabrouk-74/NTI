<?php
$arr = ["lap" =>100 ,"calc"=>400 , "Monito"=>200 ,"Mouse"=>150 ];

$f=array_filter($arr,function($v) { return $v>=1000;});
?>

<!DOCTYPE html>
<html>
    <head >
    <link href="css/bootstrap.css" rel="stylesheet">
    </head>
    <body class="bg-success">
        <div class="container mt-5">
            <ul class="list-group ">
                <?php foreach($f as $k => $x ):  ?>
                <li class="list-group-item d-flex justify-content-between">
                   <span><strong> <?= $k ?> </strong></span> <span class="badge text-bg-primary rounded-pill"> <?= $x  ." EGP"?> </span>
                </li>
                <?php endforeach; ?>
            </ul>

         <table class="table mt-5">
          <thead class="table-dark">
           <tr>
             <th scope="col">name</th>
               <th scope="col">price</th>
                </tr>
               </thead>     
           <tbody >
                        
                                
                <?php foreach ($f as $k=> $info) : ?>
                
                    <tr class="table-light">
                    <td><?= $k ?></td>
                    <td><?= $info ?></td>
                    </tr>
                <?php    endforeach;
                ?>

                        
                        </tbody>
                        </table>


        </div>
        

        <script src="js/bootstrap.bundle.js"></script>
    </body>
</html>