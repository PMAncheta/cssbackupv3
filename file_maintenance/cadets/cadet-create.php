<?php
session_start();
require 'dbcon.php';

// Enable error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style6.css">

    <title>Cadet Create</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Cadet Add 
                            <a href="cadet.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>

                    

                    <div class="card-body">
                        <form action="cadetconfig.php" method="post" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label>AFPSN</label>
                                <input type="text" name="afpsn" id="afpsn" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>Service ID</label>
                                <input type="text" name="servid" id="servid" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>Major ID</label>
                                <input type="text" name="majid" id="majid" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>Year of Gradation</label>
                                <input type="text" name="yrgr" id="yrgr" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>Original Year of Graduation</label>
                                <input type="text" name="oyrgr" id="oyrgr" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>Last Name</label>
                                <input type="text" name="lname" id="lname" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>First Name</label>
                                <input type="text" name="fname" id="fname" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>Suffix</label>
                                <select name="aname" id="aname" class="form-control" style="text-transform: uppercase;" required>
                                    <option value="select">Select</option>
                                    <option value="jr">jr.</option>
                                    <option value="1st">I</option>
                                    <option value="2nd">II</option>
                                    <option value="3rd">III</option>
                                    <option value="sr">Sr.</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Middle Name</label>
                                <input type="text" name="mname" id="mname" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>Initials</label>
                                <input type="text" name="initls" id="initls" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>Gender</label>
                                <select name="gender" id="gender" class="form-control" style="text-transform: uppercase;" required>
                                    <option value="MALE">Male</option>
                                    <option value="FEMALE">Female</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Birth Date</label>
                                <input type="date" name="bdate" id="bdate" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Birth Place</label>
                                <input type="text" name="bplace" id="bplace" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>Father</label>
                                <input type="text" name="papa" id="papa" class="form-control" style="text-transform: uppercase;" required>
                            </div>
<!--
                            <div class="mb-3">
                                <label>Deceased Father</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="padead" id="padead" value="1">
                                    <label class="form-check-label" for="padead">
                                        Check this box when the Father is dead.
                                    </label>
                                </div>
                            </div>
-->
                            <div class="mb-3">
                                <label>Mother</label>
                                <input type="text" name="mama" id="mama" class="form-control" style="text-transform: uppercase;" required>
                            </div>
<!--
                            <div class="mb-3">
                                <label>Deceased Mother</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="madead" id="padead" value="1">
                                    <label class="form-check-label" for="m adead">
                                        Check this box when the Mother is dead.
                                    </label>
                                </div>
                            </div>
-->
                            <div class="mb-3">
                                <label>Guardian</label>
                                <input type="text" name="guardian" id="guardian" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>Address 1</label>
                                <input type="text" name="addr1" id="addr1" class="form-control" placeholder="house #, st, brg, province" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>Address 2 (Optional)</label>
                                <input type="text" name="addr2" id="addr2" class="form-control" placeholder="house #, st, brg, province" style="text-transform: uppercase;">
                            </div>
                            <div class="mb-3">
                                <label>Zip Code</label>
                                <input type="number" name="zipcode" id="zipcode" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>Region</label>
                                <input type="text" name="region" id="region" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>High School</label>
                                <input type="text" name="highsch" id="highsch" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            
                            <div class="mb-3">
                                <label>Height (in cm)</label>
                                <input type="number" name="height" id="height" class="form-control" step='0.01' required>
                            </div>
                            <!-- 
                            <div class="mb-3">
                                <label>EESCORE</label>
                                <input type="number" name="eescore" id="eescore" class="form-control" step='0.01' required>
                            </div>

                            
                            math
                            engl
                            spma
                            -->

                            <div class="mb-3">
                                <label>COY</label>
                                <input type="text" name="coy" id="coy" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>BATTALION</label>
                                <input type="text" name="battalion" id="battalion" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>BATTALION2</label>
                                <input type="text" name="battalion2" id="battalion2" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>C Status</label>
                                <input type="text" name="cstat" id="cstat" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>Picture</label>
                                <br>
                                <input type="file" name="pix" id="pix" class="form-control-file">
                            </div>
                            <div class="mb-3">
                                <label>Remarks</label>
                                <input type="text" name="remarks" id="remarks" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>Date Admitted</label>
                                <input type="text" name="dateadmitted" id="dateadmitted" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>Date Graduate</label>
                                <input type="text" name="dategrad" id="dategrad" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>Date Commplited</label>
                                <input type="text" name="datecomm" id="datecomm" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>Degree</label>
                                <input type="text" name="degree" id="degree" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>Major In</label>
                                <input type="text" name="majorin" id="majorin" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>Graduate</label>
                                <input type="text" name="graduate" id="graduate" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>Latin Award </label>
                                <input type="text" name="latinaward" id="latinaward" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" id="password" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>COYBAT</label>
                                <input type="text" name="coybat" id="coybat" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <!-- Add a hidden input field for 'active' column with value 1 -->
                            <input type="hidden" name="active" value="1">

                            <div class="mb-3">
                                <button type="submit" name="save_cadet" class="btn btn-primary" value="submit">Save Cadet</button>
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
