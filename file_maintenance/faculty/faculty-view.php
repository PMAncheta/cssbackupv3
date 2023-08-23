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

    <title>Faculty View</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Faculty View Details 
                            <a href="faculty.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['faculty_id']))
                        {
                            $faculty_id = mysqli_real_escape_string($conn, $_GET['faculty_id']);
                            $query = "SELECT * FROM faculty WHERE faculty_id='$faculty_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $faculty = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>SERIALNR</label>
                                        <p class="form-control">
                                            <?= strtoupper($faculty['serialnr']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>LNAME</label>
                                        <p class="form-control">
                                            <?= strtoupper($faculty['lname']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>FNAME</label>
                                        <p class="form-control">
                                            <?= strtoupper($faculty['fname']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>MI</label>
                                        <p class="form-control">
                                            <?= strtoupper($faculty['mi']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>ANAME</label>
                                        <p class="form-control">
                                            <?= strtoupper($faculty['aname']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>GENDER</label>
                                        <p class="form-control">
                                            <?= strtoupper($faculty['gender']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>DEPTCODE</label>
                                        <p class="form-control">
                                            <?= strtoupper($faculty['deptcode']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>IGROUP</label>
                                        <p class="form-control">
                                            <?= strtoupper($faculty['igroup']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>ITYPE</label>
                                        <p class="form-control">
                                            <?= strtoupper($faculty['itype']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>RANK</label>
                                        <p class="form-control">
                                            <?= strtoupper($faculty['rank']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>BROFSERV</label>
                                        <p class="form-control">
                                            <?= strtoupper($faculty['brofserv']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>STATUS</label>
                                        <p class="form-control">
                                            <?= strtoupper($faculty['status']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>PIX</label>
                                        <br>
                                        <?php
                                        if (!empty($faculty['pix'])) {
                                            echo '<img src="data:image/jpeg;base64,' . base64_encode($faculty['pix']) . '" alt="Student Image" class="img-thumbnail" style="max-width: 500px;">';
                                        } else {
                                            echo 'No image available.';
                                        }
                                        ?>
                                    </div>
                                    <div class="mb-3">
                                        <label>UNAME</label>
                                        <p class="form-control">
                                            <?= strtoupper($faculty['uname']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>PWD</label>
                                        <p class="form-control">
                                            <?= strtoupper($faculty['pwd']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>LVL</label>
                                        <p class="form-control">
                                            <?= strtoupper($faculty['lvl']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>ACTIVE</label>
                                        <p class="form-control">
                                            <?= strtoupper($faculty['active']); ?>
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