<?php

require 'dbcon.php';

// Define the maximum lengths for each input field based on your database schema
$max_serialnr_length = 6;
$max_lname_length = 15;
$max_fname_length = 30;
$max_mi_length = 3;
$max_aname_length = 4;
$max_gender_length = 1;
$max_deptcode_length = 4;
$max_igroup_length = 7;
$max_itype_length = 4;
$max_ranks_length = 4;
$max_brofserv_length = 5;
$max_status_length = 1;
$max_uname_length = 20;
$max_pwd_length = 20;

if (isset($_REQUEST['deactivate_faculty'])) {
    $faculty_id = mysqli_real_escape_string($conn, $_REQUEST['faculty_id']);

    // Set the 'active' and 'not_active' columns accordingly
    $query = "UPDATE faculty SET active = 0, not_active = 1 WHERE faculty_id = '$faculty_id'";

    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = "Faculty deactivated Successfully";
    } else {
        $_SESSION['message'] = "Failed to deactivate faculty";
    }
    echo "<script>window.location.href = 'faculty.php';</script>";
    exit(0);
}

if (isset($_POST['activate_faculty'])) {
    $faculty_id = mysqli_real_escape_string($conn, $_POST['faculty_id']);

    // Set the 'active' and 'not_active' columns accordingly
    $query = "UPDATE faculty SET active = 1, not_active = 0 WHERE faculty_id = '$faculty_id'";

    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = "Faculty activated Successfully";
    } else {
        $_SESSION['message'] = "Failed to activate faculty";
    }
    echo "<script>window.location.href = 'faculty.php';</script>";
    exit(0);
}

if (isset($_REQUEST['update_faculty']))
{
    $faculty_id = mysqli_real_escape_string($conn, $_REQUEST['faculty_id']);
    $serialnr = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['serialnr']));
    $lname = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['lname']));
    $fname = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['fname']));
    $mi = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['mi']));
    $aname = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['aname']));
    $gender = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['gender']));
    $deptcode = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['deptcode']));
    $igroup = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['igroup']));
    $itype = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['itype']));
    $ranks = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['ranks']));
    $brofserv = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['brofserv']));
    $status = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['status']));
    $uname = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['uname']));
    $pwd = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['pwd']));
    $lvl = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['lvl']));

    // Validate input lengths before updating
    $error_fields = array();

    if (strlen($serialnr) > $max_serialnr_length) {
        $error_fields[] = 'SERIALNR';
    }
    if (strlen($lname) > $max_lname_length) {
        $error_fields[] = 'LNAME';
    }
    if (strlen($fname) > $max_fname_length) {
        $error_fields[] = 'FNAME';
    }
    if (strlen($mi) > $max_mi_length) {
        $error_fields[] = 'MI';
    }
    if (strlen($aname) > $max_aname_length) {
        $error_fields[] = 'ANAME';
    }
    if (strlen($gender) > $max_gender_length) {
        $error_fields[] = 'GENDER';
    }
    if (strlen($deptcode) > $max_deptcode_length) {
        $error_fields[] = 'DEPTCODE';
    }
    if (strlen($igroup) > $max_igroup_length) {
        $error_fields[] = 'IGROUP';
    }
    if (strlen($itype) > $max_itype_length) {
        $error_fields[] = 'ITYPE';
    }
    if (strlen($ranks) > $max_ranks_length) {
        $error_fields[] = 'RANKS';
    }
    if (strlen($brofserv) > $max_brofserv_length) {
        $error_fields[] = 'BROFSERV';
    }
    if (strlen($status) > $max_status_length) {
        $error_fields[] = 'STATUS';
    }
    if (strlen($uname) > $max_uname_length) {
        $error_fields[] = 'UNAME';
    }
    if (strlen($pwd) > $max_pwd_length) {
        $error_fields[] = 'PWD';
    }
    if (!empty($error_fields)) {
        $error_fields_str = implode(', ', $error_fields);
        $_SESSION['message'] = "The following fields exceed the maximum allowed length: $error_fields_str";
        echo "<script>window.location.href = 'faculty.php';</script>";
        exit(0);
    }

    // Handle image upload
    if (isset($_FILES['pix']) && $_FILES['pix']['size'] > 0) {
        $image = $_FILES['pix']['tmp_name'];
        $imageData = addslashes(file_get_contents($image));

        // Generate a unique identifier for the image file
        $uniqueName = uniqid();
        $extension = pathinfo($_FILES['pix']['name'], PATHINFO_EXTENSION);
        $targetDir = "uploads/";
        $targetFile = $targetDir . $uniqueName . "." . $extension;

        // Upload the image to the "uploads" folder with the unique name
        move_uploaded_file($_FILES["pix"]["tmp_name"], $targetFile);
    } else {
        // If no image is uploaded, keep the existing image data in the database
        $query = "SELECT pix FROM faculty WHERE faculty_id='$faculty_id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $imageData = $row['pix'];
    }

    $query = "UPDATE faculty SET serialnr='$serialnr', lname='$lname', fname='$fname', mi='$mi', aname='$aname', 
    gender='$gender', deptcode='$deptcode', igroup='$igroup', itype='$itype', ranks='$ranks', brofserv='$brofserv',
    status='$status', pix='$imageData', uname='$uname', pwd='$pwd', lvl='$lvl'
    WHERE faculty_id='$faculty_id'";

    if (mysqli_query($conn, $query)){
        $_SESSION['message'] = "Student updated Successfully";
        echo "<script>window.location.href = 'faculty.php';</script>";
        exit(0);
    } else {
        $_SESSION['message'] = "Student Not updated";
        echo "<script>window.location.href = 'faculty.php';</script>";
        exit(0);
    }

}
?>

<?php
if(isset($_POST['save_faculty']))
{
    $serialnr = strtoupper($_POST['serialnr']);
    $lname = strtoupper($_POST['lname']);
    $fname = strtoupper($_POST['fname']);
    $mi = strtoupper($_POST['mi']);
    $aname = strtoupper($_POST['aname']);
    $gender = strtoupper($_POST['gender']);
    $deptcode = strtoupper($_POST['deptcode']);
    $igroup = strtoupper($_POST['igroup']);
    $itype = strtoupper($_POST['itype']);
    $ranks = strtoupper($_POST['ranks']);
    $brofserv = strtoupper($_POST['brofserv']);
    $status = strtoupper($_POST['status']);
    $uname = strtoupper($_POST['uname']);
    $pwd = strtoupper($_POST['pwd']);
    $lvl = strtoupper($_POST['lvl']);

     // Validate input lengths before updating
    $error_fields = array();

    if (strlen($serialnr) > $max_serialnr_length) {
        $error_fields[] = 'SERIALNR';
    }
    if (strlen($lname) > $max_lname_length) {
        $error_fields[] = 'LNAME';
    }
    if (strlen($fname) > $max_fname_length) {
        $error_fields[] = 'FNAME';
    }
    if (strlen($mi) > $max_mi_length) {
        $error_fields[] = 'MI';
    }
    if (strlen($aname) > $max_aname_length) {
        $error_fields[] = 'ANAME';
    }
    if (strlen($gender) > $max_gender_length) {
        $error_fields[] = 'GENDER';
    }
    if (strlen($deptcode) > $max_deptcode_length) {
        $error_fields[] = 'DEPTCODE';
    }
    if (strlen($igroup) > $max_igroup_length) {
        $error_fields[] = 'IGROUP';
    }
    if (strlen($itype) > $max_itype_length) {
        $error_fields[] = 'ITYPE';
    }
    if (strlen($ranks) > $max_ranks_length) {
        $error_fields[] = 'RANKS';
    }
    if (strlen($brofserv) > $max_brofserv_length) {
        $error_fields[] = 'BROFSERV';
    }
    if (strlen($status) > $max_status_length) {
        $error_fields[] = 'STATUS';
    }
    if (strlen($uname) > $max_uname_length) {
        $error_fields[] = 'UNAME';
    }
    if (strlen($pwd) > $max_pwd_length) {
        $error_fields[] = 'PWD';
    }
    if (!empty($error_fields)) {
        $error_fields_str = implode(', ', $error_fields);
        $_SESSION['message'] = "The following fields exceed the maximum allowed length: $error_fields_str";
        echo "<script>window.location.href = 'faculty.php';</script>";
        exit(0);
    }

    // Handle image upload
    if (isset($_FILES['pix']) && $_FILES['pix']['size'] > 0) {
        $image = $_FILES['pix']['tmp_name'];
        $imageData = addslashes(file_get_contents($image));

        // Generate a unique identifier for the image file
        $uniqueName = uniqid();
        $extension = pathinfo($_FILES['pix']['name'], PATHINFO_EXTENSION);
        $targetDir = "uploads/";
        $targetFile = $targetDir . $uniqueName . "." . $extension;

        // Upload the image to the "uploads" folder with the unique name
        move_uploaded_file($_FILES["pix"]["tmp_name"], $targetFile);
    } else {
        // If no image is uploaded, keep the existing image data in the database
        $query = "SELECT pix FROM faculty WHERE faculty_id='$faculty_id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $imageData = $row['pix'];
    }

    $query = "INSERT INTO faculty (serialnr,lname,fname,mi,aname,gender,deptcode,igroup,itype,ranks,brofserv,
    status,pix,uname,pwd,lvl) 
    VALUES ('$serialnr','$lname','$fname','$mi','$aname','$gender','$deptcode','$igroup','$itype','$ranks',
    '$brofserv','$status', '$imageData','$uname','$pwd','$lvl')";
    
    if (mysqli_query($conn, $query)){
        $_SESSION['message'] = "Student Created Successfully";
        echo "<script>window.location.href = 'faculty.php';</script>";
        exit(0);
    } else {
        $_SESSION['message'] = "Student Not Created";
        echo "<script>window.location.href = 'faculty.php';</script>";
        exit(0);
    }
}

//PAGINATION//
if (!isset($_SESSION['user_name'])) {
    echo '<script>window.location.href = "login_form.php";</script>';
}

// Determine the total number of entries in the "faculty" table
$countQuery = "SELECT COUNT(*) as total FROM faculty";
$countResult = mysqli_query($conn, $countQuery);
$countRow = mysqli_fetch_assoc($countResult);
$totalEntries = $countRow['total'];

// Define the number of entries to display per page and calculate the total number of pages
$entriesPerPage = 15;
$totalPages = ceil($totalEntries / $entriesPerPage);

// Get the current page number from the query string or set it to the first page if not provided
if (isset($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}

// Calculate the offset for the database query based on the current page and number of entries per page
$offset = ($currentPage - 1) * $entriesPerPage;

// Modify your existing query to include the LIMIT and OFFSET clauses
$query = "SELECT * FROM faculty LIMIT $entriesPerPage OFFSET $offset";
$query_run = mysqli_query($conn, $query);

?>
