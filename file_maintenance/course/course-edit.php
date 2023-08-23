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
                        <h4>Course Edit 
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
                                <form action="course.php" method="POST">
                                    <input type="hidden" name="course_id" value="<?= $student['course_id']; ?>">

                                    <div class="mb-3">
                                        <label>CCODE</label>
                                        <input type="text" name="ccode" value="<?=$student['ccode'];?>" class="form-control" style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>CEQUI</label>
                                        <input type="text" name="cequi" value="<?=$student['cequi'];?>" class="form-control" style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>CNAME</label>
                                        <input type="text" name="cname" value="<?=$student['cname'];?>" class="form-control" style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>CDESC</label>
                                        <input type="text" name="cdesc" value="<?=$student['cdesc'];?>" class="form-control" style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>CUNITS</label>
                                        <input type="number" name="cunits" value="<?=$student['cunits'];?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                            <label for="ctype">CTYPE</label>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="ctypeDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    Select Course Type
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="ctypeDropdown">
                                    <?php
                                    $query = "SELECT ctype, coursetypedesc FROM coursetype";
                                    $result = mysqli_query($conn, $query);

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<li><a class="dropdown-item ctype-option" href="#" data-ctype="' . $row['ctype'] . '" data-coursetypedesc="' . $row['coursetypedesc'] . '">' . $row['coursetypedesc'] . '</a></li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                            <input type="hidden" name="ctype" id="ctypeHidden">
                        </div>

                                    <div class="mb-3">
                                        <label>CADD</label>
                                        <input type="text" name="cadd" value="<?=$student['cadd'];?>" class="form-control" style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>CADD2</label>
                                        <input type="text" name="cadd2" value="<?=$student['cadd2'];?>" class="form-control" style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>CTYPEOLD</label>
                                        <input type="text" name="ctypeold" value="<?=$student['ctypeold'];?>" class="form-control" style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_student" class="btn btn-primary" value="submit">
                                            Update Course
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
    <script>
    // JavaScript to handle dropdown selection
    const ctypeDropdown = document.getElementById('ctypeDropdown');
    const ctypeHidden = document.getElementById('ctypeHidden');

    document.querySelectorAll('.ctype-option').forEach(option => {
        option.addEventListener('click', function() {
            ctypeDropdown.innerText = this.dataset.coursetypedesc;
            ctypeHidden.value = this.dataset.ctype;
        });
    });
</script>
</body>
</html>