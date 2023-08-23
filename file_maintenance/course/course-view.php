<?php
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

    <title>Course View</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Course View Details 
                            <a href="course.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['course_id']))
                        {
                            $course_id = mysqli_real_escape_string($conn, $_GET['course_id']);
                            $query = "SELECT * FROM courses WHERE course_id='$course_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>CCODE</label>
                                        <p class="form-control">
                                            <?=$student['ccode'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>CEQUI</label>
                                        <p class="form-control">
                                            <?=$student['cequi'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>CNAME</label>
                                        <p class="form-control">
                                            <?=$student['cname'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>CDESC</label>
                                        <p class="form-control">
                                            <?=$student['cdesc'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>CUNITS</label>
                                        <p class="form-control">
                                            <?=$student['cunits'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>CTYPE</label>
                                        <p class="form-control">
                                            <?=$student['ctype'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>CADD</label>
                                        <p class="form-control">
                                            <?=$student['cadd'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>CADD2</label>
                                        <p class="form-control">
                                            <?=$student['cadd2'];?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>CTYPEOLD</label>
                                        <p class="form-control">
                                            <?=$student['ctypeold'];?>
                                        </p>
                                    </div>

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