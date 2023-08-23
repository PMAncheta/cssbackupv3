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

    <title>Student View</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Cadet View Details 
                            <a href="cadet.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['cadet_id']))
                        {
                            $cadet_id = mysqli_real_escape_string($conn, $_GET['cadet_id']);
                            $query = "SELECT * FROM cadet WHERE cadet_id='$cadet_id' ";
                            $query_run = mysqli_query($conn, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $cadet = mysqli_fetch_array($query_run);
                                ?>
                                
                                    <div class="mb-3">
                                        <label>AFPSN</label>
                                        <p class="form-control">
                                            <?= strtoupper($cadet['afpsn']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>SERVID</label>
                                        <p class="form-control">
                                            <?= strtoupper($cadet['servid']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>MAJID</label>
                                        <p class="form-control">
                                            <?= strtoupper($cadet['majid']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>YRGR</label>
                                        <p class="form-control">
                                            <?= strtoupper($cadet['yrgr']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>OYRGR</label>
                                        <p class="form-control">
                                            <?= strtoupper($cadet['oyrgr']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>LNAME</label>
                                        <p class="form-control">
                                            <?= strtoupper($cadet['lname']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>FNAME</label>
                                        <p class="form-control">
                                            <?= strtoupper($cadet['fname']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>ANAME</label>
                                        <p class="form-control">
                                            <?= strtoupper($cadet['aname']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>MNAME</label>
                                        <p class="form-control">
                                            <?= strtoupper($cadet['mname']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>INITLS</label>
                                        <p class="form-control">
                                            <?= strtoupper($cadet['initls']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>GENDER</label>
                                        <p class="form-control">
                                            <?= strtoupper($cadet['gender']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>BDATE</label>
                                        <p class="form-control">
                                            <?= date("Y-m-d", strtotime($cadet['bdate'])); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>BPLACE</label>
                                        <p class="form-control">
                                            <?= strtoupper($cadet['bplace']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>PAPA</label>
                                        <p class="form-control">
                                            <?= strtoupper($cadet['papa']); ?>
                                        </p>
                                    </div>
                                    <div>
                                        <label>PADEAD</label>
                                        <p class="form-control">
                                            <?=($cadet['padead'] == '1') ? 'Father is dead' : 'Father is alive';?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>MAMA</label>
                                        <p class="form-control">
                                            <?= strtoupper($cadet['mama']); ?>
                                        </p>
                                    </div>
                                    <div>
                                        <label>MADEAD</label>
                                        <p class="form-control">
                                            <?=($cadet['madead'] == '1') ? 'Mother is dead' : 'Mother is alive';?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>GUARDIAN</label>
                                        <p class="form-control">
                                            <?= strtoupper($cadet['guardian']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>ADDR1</label>
                                        <p class="form-control">
                                            <?= strtoupper($cadet['addr1']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>ADDR2</label>
                                        <p class="form-control">
                                            <?= strtoupper($cadet['addr2']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>zipcode</label>
                                        <p class="form-control">
                                            <?= strtoupper($cadet['zipcode']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>REGION</label>
                                        <p class="form-control">
                                            <?= strtoupper($cadet['region']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>HIGHSCH</label>
                                        <p class="form-control">
                                            <?= strtoupper($cadet['highsch']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>HEIGHT</label>
                                        <p class="form-control">
                                            <?= $cadet['height']; ?>
                                        </p>
                                    </div>
                                    <!-- 
                                    <div class="mb-3">
                                        <label>EESCORE</label>
                                        <p class="form-control">
                                            <?= $cadet['eescore']; ?>
                                        </p>
                                    </div>
                                    
                                    not yet created (math engl spma) -->

                                    <div class="mb-3">
                                        <label>COY</label>
                                        <p class="form-control">
                                            <?= strtoupper($cadet['coy']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>BATTALION</label>
                                        <p class="form-control">
                                            <?= strtoupper($cadet['battalion']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>BATTALION2</label>
                                        <p class="form-control">
                                            <?= strtoupper($cadet['battalion2']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>CSTAT</label>
                                        <p class="form-control">
                                            <?= strtoupper($cadet['cstat']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>REMARKS</label>
                                        <p class="form-control">
                                            <?= strtoupper($cadet['remarks']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>PIX</label>
                                        <br>
                                        <?php
                                        if (!empty($cadet['pix'])) {
                                            echo '<img src="data:image/jpeg;base64,' . base64_encode($cadet['pix']) . '" alt="Student Image" class="img-thumbnail" style="max-width: 500px;">';
                                        } else {
                                            echo 'No image available.';
                                        }
                                        ?>
                                    </div>
                                    <div class="mb-3">
                                        <label>DATEADMITTED</label>
                                        <p class="form-control">
                                            <?= strtoupper($cadet['dateadmitted']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>DATEGRAD</label>
                                        <p class="form-control">
                                            <?= strtoupper($cadet['dategrad']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>DATECOMM</label>
                                        <p class="form-control">
                                            <?= strtoupper($cadet['datecomm']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>DEGREE</label>
                                        <p class="form-control">
                                            <?= strtoupper($cadet['degree']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>MAJORIN</label>
                                        <p class="form-control">
                                            <?= strtoupper($cadet['majorin']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>GRADUATE</label>
                                        <p class="form-control">
                                            <?= strtoupper($cadet['graduate']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>LATINAWARD</label>
                                        <p class="form-control">
                                            <?= strtoupper($cadet['latinaward']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>PASSWORD</label>
                                        <p class="form-control">
                                            <?= strtoupper($cadet['password']); ?>
                                        </p>
                                    </div>
                                    <div class="mb-3">
                                        <label>COYBAT</label>
                                        <p class="form-control">
                                            <?= strtoupper($cadet['coybat']); ?>
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