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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Student Edit</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Department Edit 
                            <a href="department.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['department_id']))
                        {
                            $department_id = mysqli_real_escape_string($conn, $_GET['department_id']);
                            $query = "SELECT * FROM department WHERE department_id='$department_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                <form action="department.php" method="POST">
                                    <input type="hidden" name="department_id" value="<?= $student['department_id']; ?>">

                                    <div class="mb-3">
                                        <label>DEPTCODE</label>
                                        <input type="text" name="deptcode" value="<?=$student['deptcode'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>DEPTNAME</label>
                                        <input type="text" name="deptname" value="<?=$student['deptname'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>DEPTHEAD</label>
                                        <input type="text" name="depthead" value="<?=$student['depthead'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>DEPTGROUP</label>
                                        <input type="text" name="deptgroup" value="<?=$student['deptgroup'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_student" class="btn btn-primary" value="submit">
                                            Update Student
                                        </button>
                                    </div>
                                    

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>