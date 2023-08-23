<?php
session_start();
require 'dbcon.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style6.css">

    <title>Student Create</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Student Add 
                            <a href="department.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>

                    

                    <div class="card-body">
                        <form action="department.php" method="post">

                            <div class="mb-3">
                                <label>DEPTCODE</label>
                                <input type="text" name="deptcode" id="deptcode" class="form-control" style="text-transform: uppercase;">
                            </div>
                           
                            <div class="mb-3">
                                <label>DEPTNAME</label>
                                <input type="text" name="deptname" id="deptname" class="form-control" style="text-transform: uppercase;">
                            </div>
                            <div class="mb-3">
                                <label>DEPTHEAD</label>
                                <input type="text" name="depthead" id="depthead" class="form-control" style="text-transform: uppercase;">
                            </div>
                            <div class="mb-3">
                                <label>DEPTGROUP</label>
                                <input type="text" name="deptgroup" id="deptgroup" class="form-control" style="text-transform: uppercase;">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_student" class="btn btn-primary" value="submit">Save Student</button>
                            </div>

                            
                        </form>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
