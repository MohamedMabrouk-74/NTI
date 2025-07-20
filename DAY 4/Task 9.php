<?php
$arr = [["name"=>"Mohamed","course" =>"JS","grade"=>"90%","status"=>"passed"],
    ["name"=>"Ali","course" =>"React","grade"=>"88%","status"=>"Failed"],
    ["name"=>"Alaa","course" =>"php","grade"=>"82%","status"=>"passed"],
    ["name"=>"Ali","course" =>"Css","grade"=>"98%","status"=>"passed"]
];
$m= 0;
?>

<!DOCTYPE html>
<html>
    <head >
    <link href="css/bootstrap.css" rel="stylesheet">
    </head>
    <body class="bg-success">
        <div class="container">
            <div class="row mt-4">
                <table class="table table-bordered">
    <thead class="table-dark">
        <tr class="text-center">
            <th>Name</th>
            <th>Course</th>
            <th>Grade</th>
            <th>Status</th>
            <th>Details</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($arr as $k => $info): ?>
            <tr class="text-center <?php if($info['grade']>=60){echo"table-primary";} else{echo "table-danger";} ?>">
                <td><?= $info['name'] ?></td>
                <td><?= $info['course'] ?></td>
                <td> <span class="badge <?php if($info['grade']>=60){echo" text-bg-success";} else{echo "text-bg-danger";} ?> rounded"><?= $info['grade'] ?></span></td>
                <td><?= $info['status'] ?></td>
                <td>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal<?= $k ?>">
                        View
                    </button>
                </td>
            </tr>

            <!-- Modal for this student -->
            <div class="modal fade" id="modal<?= $k ?>" tabindex="-1" aria-labelledby="label<?= $k ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="label<?= $k ?>">Student Info</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center "> 
                                
                           <div class="mb-3"> <strong>Name:</strong> <?= $info['name'] ?><br></div>
                           <div class="mb-3"><strong>Sta:</strong> <?= $info['status'] ?></div>
                            <div class="mb-3"><strong>Course:</strong> <?= $info['course'] ?><br></div>
                            <div class="mb-3"><strong>Grade:</strong> <?= $info['grade'] ?><br></div>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </tbody>
</table>

  </div>
</div>
        
        <script src="js/bootstrap.bundle.js"></script>
    </body>
</html>