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

    <title>Faculty Edit</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Faculty Edit 
                            <a href="faculty.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['Faculty']))
                        {
                            $faculty_id = mysqli_real_escape_string($conn, $_GET['faculty_id']);
                            $query = "SELECT * FROM faculty WHERE faculty_id='$faculty_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                <form action="facultyconfig.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="faculty_id" value="<?= $student['faculty_id']; ?>">

                                    <form action="faculty.php" method="POST">
                                    <input type="hidden" name="faculty_id" value="<?= $student['faculty_id']; ?>">

                                    <div class="mb-3">
                                        <label>SERIALNR</label>
                                        <input type="text" name="serialnr" value="<?=$student['serialnr'];?>" class="form-control">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label>LNAME</label>
                                        <input type="text" name="lname" value="<?=$student['lname'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>FNAME</label>
                                        <input type="text" name="fname" value="<?=$student['fname'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>MI</label>
                                        <input type="text" name="mi" value="<?=$student['mi'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>ANAME</label>
                                        <input type="text" name="aname" value="<?=$student['aname'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>GENDER</label>
                                        <input type="text" name="gender" value="<?=$student['gender'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>DEPTCODE</label>
                                        <input type="text" name="deptcode" value="<?=$student['deptcode'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>IGROUP</label>
                                        <input type="text" name="igroup" value="<?=$student['igroup'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>ITYPE</label>
                                        <input type="text" name="itype" value="<?=$student['itype'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>RANK</label>
                                        <input type="text" name="rank" value="<?=$student['rank'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>BROFSERV</label>
                                        <input type="text" name="brofserv" value="<?=$student['brofserv'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>STATUS</label>
                                        <input type="text" name="status" value="<?=$student['status'];?>" class="form-control">
                                    </div>
                                   
                                    <!-- Existing Image -->
                                    <div class="mb-3">
                                        <label>Existing Image</label>
                                        <br>
                                        <?php
                                        $imageData = '';
                                        if ($student['pix']) {
                                            $imageData = base64_encode($student['pix']);
                                            echo '<img src="data:image/jpeg;base64,' . $imageData . '" style="max-width: 500px;">';
                                        } else {
                                            echo 'No image available';
                                        }
                                        ?>
                                    </div>
                                    <!-- Upload New Image -->
                                    <div class="mb-3">
                                        <label>Upload New Image</label>
                                        <input type="file" name="pix" class="form-control-file">
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label>UNAME</label>
                                        <input type="text" name="uname" value="<?=$student['uname'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>PWD</label>
                                        <input type="text" name="pwd" value="<?=$student['pwd'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>LVL</label>
                                        <input type="number" name="lvl" value="<?=$student['lvl'];?>" class="form-control">
                                    </div>
                                    

                                    <div class="mb-3">
                                        <button type="submit" name="update_faculty" class="btn btn-primary" value="submit">
                                            Update Faculty
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