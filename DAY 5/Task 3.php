<!DOCTYPE html>
<html>

<head>
    <link href="css/bootstrap.css" rel="stylesheet">
    <title>login page</title>
</head>

<body class=" p-3 bg-warning-subtle ">
    <div class="container">
        <div class=" row d-flex justify-content-center">
            <div class="col-6 bg-white rounded-4">
                
                <form action="task3-2.php" method="post" >
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="text-center">USER</h1>
                            <label for="validationServer01" class="form-label">Fullname</label>
                            <input type="text" name="name" class="form-control is-valid" id="validationServer01"
                                required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="validationServer01" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control is-valid" id="validationServer01" 
                                required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label for="validationServer01" class="form-label">Age</label>
                            <input type="number" name="age" class="form-control is-valid" id="validationServer01" 
                                required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-md-12 ">
                            <label for="validationServer03" class="form-label">City</label>
                            <input type="text" name="city" class="form-control is-valid" id="validationServer03"
                                aria-describedby="validationServer03Feedback" required>
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>



                        <div class="col-12">
                            <button class="btn btn-primary w-100 mb-3 mt-3" type="submit">Submit form</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>