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
                        <h4>Cadet Edit 
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
                                <form action="cadetconfig.php" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="cadet_id" value="<?= $cadet['cadet_id']; ?>">

                                    <div class="mb-3">
                                        <label>AFPSN</label>
                                        <input type="text" name="afpsn" value="<?=$cadet['afpsn'];?>" class="form-control" style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>SERVID</label>
                                        <input type="text" name="servid" value="<?=$cadet['servid'];?>" class="form-control"style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>MAJID</label>
                                        <input type="text" name="majid" value="<?=$cadet['majid'];?>" class="form-control"style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>YRGR</label>
                                        <input type="text" name="yrgr" value="<?=$cadet['yrgr'];?>" class="form-control"style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>OYRGR</label>
                                        <input type="text" name="oyrgr" value="<?=$cadet['oyrgr'];?>" class="form-control"style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>LNAME</label>
                                        <input type="text" name="lname" value="<?=$cadet['lname'];?>" class="form-control"style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>FNAME</label>
                                        <input type="text" name="fname" value="<?=$cadet['fname'];?>" class="form-control"style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>ANAME</label>
                                        <input type="text" name="aname" value="<?=$cadet['aname'];?>" class="form-control"style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>MNAME</label>
                                        <input type="text" name="mname" value="<?=$cadet['mname'];?>" class="form-control"style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>INITLS</label>
                                        <input type="text" name="initls" value="<?=$cadet['initls'];?>" class="form-control"style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>GENDER</label>
                                        <input type="text" name="gender" value="<?=$cadet['gender'];?>" class="form-control"style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>BDATE</label>
                                        <div id="dateContainer">
                                            <select type="date" class="form-control" name="bdate" value="<?= date("Y-m-d", strtotime($cadet['bdate'])); ?>">
                                                <option value="MALE">Male</option>
                                                <option value="FEMALE">Female</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label>BPLACE</label>
                                        <input type="text" name="bplace" value="<?=$cadet['bplace'];?>" class="form-control"style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>PAPA</label>
                                        <input type="text" name="papa" value="<?=$cadet['papa'];?>" class="form-control"style="text-transform: uppercase;">
                                    </div>
                                    
                                    <!--
                                    <div class="mb-3">
                                        <label>PADEAD</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="padead" id="padead" value="1" <?php echo $cadet['padead'] == '1' ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="padead">
                                                Check this box when the Father is dead.
                                            </label>
                                        </div>
                                    </div>
                                    -->

                                    <div class="mb-3">
                                        <label>MAMA</label>
                                        <input type="text" name="mama" value="<?=$cadet['mama'];?>" class="form-control"style="text-transform: uppercase;">
                                    </div>

                                    <!--
                                    <div class="mb-3">
                                        <label>MADEAD</label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="madead" id="madead" value="1" <?php echo $cadet['madead'] == '1' ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="madead">
                                                Check this box when the Mother is dead.
                                            </label>
                                        </div>
                                    </div>

                                    -->
                                    <div class="mb-3">
                                        <label>GUARDIAn</label>
                                        <input type="text" name="guardian" value="<?=$cadet['guardian'];?>" class="form-control"style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>ADDR1</label>
                                        <input type="text" name="addr1" value="<?=$cadet['addr1'];?>" class="form-control"style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>ADDR2</label>
                                        <input type="text" name="addr2" value="<?=$cadet['addr2'];?>" class="form-control"style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>ZIPCODE</label>
                                        <input type="number" name="zipcode" value="<?=$cadet['zipcode'];?>" class="form-control"style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>REGION</label>
                                        <input type="text" name="region" value="<?=$cadet['region'];?>" class="form-control"style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>HIGHSCH</label>
                                        <input type="text" name="highsch" value="<?=$cadet['highsch'];?>" class="form-control"style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>HEIGHT (in cm)</label>
                                        <input type="number" name="height" value="<?= $cadet['height']; ?>" class="form-control" step="0.01">
                                    </div>
                                    <!-- 
                                    <div class="mb-3">
                                        <label>EESCORE</label>
                                        <input type="number" name="eescore" value="<?= $cadet['eescore']; ?>" class="form-control" step="0.01">
                                    </div>

                                   not yet created (math engl spma) -->

                                    <div class="mb-3">
                                        <label>COY</label>
                                        <input type="text" name="coy" value="<?=$cadet['coy'];?>" class="form-control"style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>BATTALION</label>
                                        <input type="text" name="battalion" value="<?=$cadet['battalion'];?>" class="form-control"style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>BATTALION2</label>
                                        <input type="text" name="battalion2" value="<?=$cadet['battalion2'];?>" class="form-control"style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>CSTAT</label>
                                        <input type="text" name="cstat" value="<?=$cadet['cstat'];?>" class="form-control"style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>REMARKS</label>
                                        <input type="text" name="remarks" value="<?=$cadet['remarks'];?>" class="form-control"style="text-transform: uppercase;">
                                    </div>
                                    <!-- Existing Image -->
                                    <div class="mb-3">
                                        <label>Existing Image</label>
                                        <br>
                                        <?php
                                        $imageData = '';
                                        if ($cadet['pix']) {
                                            $imageData = base64_encode($cadet['pix']);
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
                                        <label>DATEADMITTED</label>
                                        <input type="text" name="dateadmitted" value="<?=$cadet['dateadmitted'];?>" class="form-control"style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>DATEGRAD</label>
                                        <input type="text" name="dategrad" value="<?=$cadet['dategrad'];?>" class="form-control"style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>DATECOMM</label>
                                        <input type="text" name="datecomm" value="<?=$cadet['datecomm'];?>" class="form-control"style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>DEGREE</label>
                                        <input type="text" name="degree" value="<?=$cadet['degree'];?>" class="form-control"style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>MAJORIN</label>
                                        <input type="text" name="majorin" value="<?=$cadet['majorin'];?>" class="form-control"style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>GRADUATE</label>
                                        <input type="text" name="graduate" value="<?=$cadet['graduate'];?>" class="form-control"style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>LATINAWARD</label>
                                        <input type="text" name="latinaward" value="<?=$cadet['latinaward'];?>" class="form-control"style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>PASSWORD</label>
                                        <input type="password" name="password" value="<?=$cadet['password'];?>" class="form-control"style="text-transform: uppercase;">
                                    </div>
                                    <div class="mb-3">
                                        <label>COYBAT</label>
                                        <input type="text" name="coybat" value="<?=$cadet['coybat'];?>" class="form-control"style="text-transform: uppercase;">
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" name="update_cadet" class="btn btn-primary" value="submit">
                                            Update Cadet
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

    <!-- cant put in other file, it will lost the purpose  -->
    <script>
        // Function to convert date string to the format yyyy-mm-dd
        function formatDate(dateString) {
            const dateObj = new Date(dateString);
            const year = dateObj.getFullYear();
            const month = String(dateObj.getMonth() + 1).padStart(2, '0');
            const day = String(dateObj.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        }

        // Function to replace the date text with an editable date input
        function editDate() {
            const dateText = document.getElementById('bdateText');
            const dateValue = dateText.innerText.trim();
            const dateInput = document.createElement('input');
            dateInput.type = 'date';
            dateInput.value = formatDate(dateValue);
            dateText.replaceWith(dateInput);
            dateInput.focus();
            dateInput.addEventListener('blur', updateDate);
        }

        // Function to update the displayed date and replace the input with a new <p> element
        function updateDate() {
            const dateInput = document.querySelector('#dateContainer input');
            const dateValue = dateInput.value;
            const formattedDate = formatDate(dateValue);
            const dateText = document.createElement('p');
            dateText.classList.add('form-control');
            dateText.id = 'bdateText';
            dateText.innerText = formattedDate;
            dateInput.replaceWith(dateText);
            dateText.addEventListener('click', editDate);
        }

        // Event listener to start the date editing when the user clicks on the date
        document.getElementById('bdateText').addEventListener('click', editDate);
    </script>
</body>
</html>