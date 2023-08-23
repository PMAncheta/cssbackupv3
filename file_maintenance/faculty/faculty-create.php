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
                        <h4>Faculty Add
                            <a href="faculty.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>

                    

                    <div class="card-body">
                        <form action="facultyconfig.php" method="post" enctype="multipart/form-data">

                        <div class="mb-3">
                                <label>Serial Number</label>
                                <input type="text" name="serialnr" id="serialnr" placeholder="C#" class="form-control" style="text-transform: uppercase;" required>
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
                                <label>Middle Initial</label>
                                <input type="text" name="mi" id="mi" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>Suffix</label>
                                <input type="text" name="aname" id="aname" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>Gender</label>
                                <select name="gender" id="gender" class="form-control" style="text-transform: uppercase;" required>
                                    <option value="MALE">Male</option>
                                    <option value="FEMALE">Female</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label>Department Group</label>
                                <input type="text" name="deptcode" id="deptcode" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>I Group</label>
                                <input type="text" name="igroup" id="igroup" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>I Type</label>
                                <input type="text" name="itype" id="itype" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>Rank</label>
                                <input type="text" name="ranks" id="ranks" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>BROF Service</label>
                                <input type="text" name="brofserv" id="brofserv" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>Status</label>
                                <input type="text" name="status" id="status" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>insert image:</label>
                                 <input type="file" name="image" id="pix" accept=".jpg, .jpeg, .png">
                            </div>
                            <div class="mb-3">
                                <label>User Name</label>
                                <input type="text" name="uname" id="uname" class="form-control" style="text-transform: uppercase;" required>
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="pwd" id="pwd" class="form-control"  required>
                            </div>
                            <div class="mb-3">
                                <label>Level</label>
                                <input type="number" name="lvl" id="lvl" class="form-control" required>
                           <!-- </div>
                            <!-- Add a hidden input field for 'active' column with value 1 -->
                            <input type="hidden" name="active" value="1">
                            

                            <div class="mb-3">
                                <button type="submit" name="save_faculty" class="btn btn-primary" value="submit">Save Faculty</button>
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
