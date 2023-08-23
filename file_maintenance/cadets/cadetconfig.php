<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'dbcon.php';


if(isset($_POST['delete_cadet']))
{
    $cadet_id = mysqli_real_escape_string($conn, $_POST['delete_cadet']);

    $query = "DELETE FROM cadet WHERE id='$cadet_id' ";
    $query_run = mysqli_query($conn, $query);

    if (mysqli_query($conn, $query)){
        $_SESSION['message'] = "Cadet delete Successfully";
        echo "<script>window.location.href = 'cadet.php';</script>";
        exit(0);
    } else {
        $_SESSION['message'] = "Cadet Not deleted ";
        echo "<script>window.location.href = 'cadet.php';</script>";
        exit(0);
    }
}

// Define the maximum lengths for each input field based on your database schema
$max_afpsn_length = 5;
$max_servid_length = 1;
$max_majid_length = 2;
$max_yrgr_length = 4;
$max_oyrgr_length = 4;
$max_lname_length = 16;
$max_fname_length = 25;
$max_aname_length = 4;
$max_mname_length = 16;
$max_initls_length = 8;
$max_gender_length = 1;
$max_bplace_length = 30;
$max_papa_length = 30;
$max_mama_length = 30;
$max_guardian_length = 30;
$max_addr1_length = 60;
$max_addr2_length = 40;
$max_zipcode_length = 4;
$max_region_length = 4;
$max_highsch_length = 30;
//$max_height_length = 18;
//$max_eescore_length = 30;
//$max_math_length = 30;
//$max_engl_length = 30;
//$max_spma_length = 30;
$max_coy_length = 1;
$max_battalion_length = 1;
$max_battalion2_length = 1;
$max_cstat_length = 1;
$max_remarks_length = 30;
$max_dateadmitted_length = 20;
$max_dategrad_length = 20;
$max_datecomm_length = 20;
$max_degree_length = 20;
$max_majorin_length = 30;
$max_graduate_length = 1;
$max_latinaward_length = 20;
$max_password_length = 10;
$max_coybat_length = 10;

if (isset($_REQUEST['deactivate_cadet'])) {
    $cadet_id = mysqli_real_escape_string($conn, $_REQUEST['cadet_id']);

    // Set the 'active' and 'not_active' columns accordingly
    $query = "UPDATE cadet SET active = 0, not_active = 1 WHERE cadet_id = '$cadet_id'";

    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = "Cadet deactivated Successfully";
    } else {
        $_SESSION['message'] = "Failed to deactivate cadet";
    }
    echo "<script>window.location.href = 'cadet.php';</script>";
    exit(0);
}

if (isset($_POST['activate_cadet'])) {
    $cadet_id = mysqli_real_escape_string($conn, $_POST['cadet_id']);

    // Set the 'active' and 'not_active' columns accordingly
    $query = "UPDATE cadet SET active = 1, not_active = 0 WHERE cadet_id = '$cadet_id'";

    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = "Cadet activated Successfully";
    } else {
        $_SESSION['message'] = "Failed to activate cadet";
    }
    echo "<script>window.location.href = 'cadet.php';</script>";
    exit(0);
}

if (isset($_REQUEST['update_cadet'])) {
    $cadet_id = mysqli_real_escape_string($conn, $_REQUEST['cadet_id']);
    $afpsn = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['afpsn']));
    $servid = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['servid']));
    $majid = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['majid']));
    $yrgr = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['yrgr']));
    $oyrgr = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['oyrgr']));
    $lname = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['lname']));
    $fname = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['fname']));
    $aname = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['aname']));
    $mname = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['mname']));
    $initls = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['initls']));
    $gender = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['gender']));
    //$bdate = date("Y-m-d", strtotime($_REQUEST['bdate']));
    $bplace = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['bplace']));
    $papa = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['papa']));
    //$padead = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['padead']));
    $mama = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['mama']));
    //$madead = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['madead']));
    $guardian = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['guardian']));
    $addr1 = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['addr1']));
    $addr2 = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['addr2']));
    $zipcode = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['zipcode']));
    $region = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['region']));
    $highsch = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['highsch']));
    //$height = floatval($_POST['height']);
    //$height = mysqli_real_escape_string($conn, $height);
    //$eescore = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['eescore']));
    //$math = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['math']));
    //$engl = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['engl']));
    //$spma = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['spma']));
    $coy = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['coy']));
    $battalion = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['battalion']));
    $battalion2 = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['battalion2']));
    $cstat = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['cstat']));
    $remarks = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['remarks']));
    $dateadmitted = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['dateadmitted']));
    $dategrad = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['dategrad']));
    $datecomm = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['datecomm']));
    $degree = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['degree']));
    $majorin = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['majorin']));
    $graduate = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['graduate']));
    $latinaward = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['latinaward']));
    $password = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['password']));
    $coybat = strtoupper(mysqli_real_escape_string($conn, $_REQUEST['coybat']));

    // Validate input lengths before updating
    $error_fields = array();

    if (strlen($afpsn) > $max_afpsn_length) {
        $error_fields[] = 'AFPSN';
    }
    if (strlen($servid) > $max_servid_length) {
        $error_fields[] = 'SERVID';
    }
    if (strlen($majid) > $max_majid_length) {
        $error_fields[] = 'MAJID';
    }
    if (strlen($yrgr) > $max_yrgr_length) {
        $error_fields[] = 'YRGR';
    }
    if (strlen($oyrgr) > $max_oyrgr_length) {
        $error_fields[] = 'OYRGR';
    }
    if (strlen($lname) > $max_lname_length) {
        $error_fields[] = 'LNAME';
    }
    if (strlen($fname) > $max_fname_length) {
        $error_fields[] = 'FNAME';
    }
    if (strlen($aname) > $max_aname_length) {
        $error_fields[] = 'ANAME';
    }
    if (strlen($mname) > $max_mname_length) {
        $error_fields[] = 'MNAME';
    }
    if (strlen($initls) > $max_initls_length) {
        $error_fields[] = 'INITLS';
    }
    if (strlen($gender) > $max_gender_length) {
        $error_fields[] = 'GENDER';
    }
    if (strlen($bplace) > $max_bplace_length) {
        $error_fields[] = 'BPLACE';
    }
    if (strlen($papa) > $max_papa_length) {
        $error_fields[] = 'PAPA';
    }
    if (strlen($mama) > $max_mama_length) {
        $error_fields[] = 'MAMA';
    }
    if (strlen($guardian) > $max_guardian_length) {
        $error_fields[] = 'GUARDIAN';
    }
    if (strlen($addr1) > $max_addr1_length) {
        $error_fields[] = 'ADDR1';
    }
    if (strlen($addr2) > $max_addr2_length) {
        $error_fields[] = 'ADDR2';
    }
    if (strlen($zipcode) > $max_zipcode_length) {
        $error_fields[] = 'ZIPCODE';
    }
    if (strlen($region) > $max_region_length) {
        $error_fields[] = 'REGION';
    }
    if (strlen($highsch) > $max_highsch_length) {
        $error_fields[] = 'HIGHSCH';
    }
    /*
    if (strlen($height) > $max_height_length) {
        $error_fields[] = 'HEIGHT';
    }
    if (strlen($eescore) > $max_eescore_length) {
        $error_fields[] = 'EESCORE';
    }
    if (strlen($math) > $max_math_length) {
        $error_fields[] = 'MATH';
    }
    if (strlen($engl) > $max_engl_length) {
        $error_fields[] = 'ENGL';
    }
    if (strlen($spma) > $max_spma_length) {
        $error_fields[] = 'SPMA';
    }*/
    if (strlen($coy) > $max_coy_length) {
        $error_fields[] = 'COY';
    }
    if (strlen($battalion) > $max_battalion_length) {
        $error_fields[] = 'BATTALION';
    }
    if (strlen($battalion2) > $max_battalion2_length) {
        $error_fields[] = 'BATTALION2';
    }
    if (strlen($cstat) > $max_cstat_length) {
        $error_fields[] = 'CSTAT';
    }
    if (strlen($remarks) > $max_remarks_length) {
        $error_fields[] = 'REMARKS';
    }
    if (strlen($dateadmitted) > $max_dateadmitted_length) {
        $error_fields[] = 'DATEADMITED';
    }
    if (strlen($dategrad) > $max_dategrad_length) {
        $error_fields[] = 'DATEGRAD';
    }
    if (strlen($datecomm) > $max_datecomm_length) {
        $error_fields[] = 'DATECOMM';
    }
    if (strlen($degree) > $max_degree_length) {
        $error_fields[] = 'DEGREE';
    }
    if (strlen($majorin) > $max_majorin_length) {
        $error_fields[] = 'MAJORIN';
    }
    if (strlen($graduate) > $max_graduate_length) {
        $error_fields[] = 'GRADUATE';
    }
    if (strlen($latinaward) > $max_latinaward_length) {
        $error_fields[] = 'LATINAWARD';
    }
    if (strlen($password) > $max_password_length) {
        $error_fields[] = 'PASSWORD';
    }
    if (strlen($coybat) > $max_coybat_length) {
        $error_fields[] = 'COYBAT';
    }
    if (!empty($error_fields)) {
        $error_fields_str = implode(', ', $error_fields);
        $_SESSION['message'] = "The following fields exceed the maximum allowed length: $error_fields_str";
        echo "<script>window.location.href = 'cadet.php';</script>";
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
        $query = "SELECT pix FROM cadet WHERE cadet_id='$cadet_id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $imageData = $row['pix'];
    }

    $query = "UPDATE cadet SET afpsn='$afpsn', servid='$servid', majid='$majid', yrgr='$yrgr', oyrgr='$oyrgr', lname='$lname', fname='$fname', aname='$aname',
    mname='$mname', initls='$initls', gender='$gender', bdate='$bdate', bplace='$bplace', papa='$papa', padead='$padead', mama='$mama', madead='$madead', 
    guardian='$guardian', addr1='$addr1', addr2='$addr2', zipcode='$zipcode', region='$region', highsch='$highsch', coy='$coy', 
    battalion='$battalion', battalion2='$battalion2', cstat='$cstat', remarks='$remarks', pix='$imageData', dateadmitted='$dateadmitted', dategrad='$dategrad',
    datecomm='$datecomm', degree='$degree', latinaward='$latinaward', password='$password', coybat='$coybat'
    WHERE cadet_id='$cadet_id' ";

    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = "Cadet updated Successfully";
        echo "<script>window.location.href = 'cadet.php';</script>";
        exit(0);
    } else {
        $_SESSION['message'] = "Cadet Not updated";
        echo "<script>window.location.href = 'cadet.php';</script>";
        exit(0);
    }
}
?>

<?php
if(isset($_POST['save_cadet']))
{ 
    // save the input database
    $afpsn = strtoupper($_POST['afpsn']);
    $servid = strtoupper($_POST['servid']);
    $majid = strtoupper($_POST['majid']);
    $yrgr = strtoupper($_POST['yrgr']);
    $oyrgr = strtoupper($_POST['oyrgr']);
    $lname = strtoupper($_POST['lname']);
    $fname = strtoupper($_POST['fname']);
    $aname = strtoupper($_POST['aname']);
    $mname = strtoupper($_POST['mname']);
    $initls = strtoupper($_POST['initls']);
    $gender = strtoupper($_POST['gender']);
    $bdate = date("Y-m-d", strtotime($_POST['bdate']));
    $bplace = strtoupper($_POST['bplace']);
    $papa = strtoupper($_POST['papa']);
    //$padead = isset($_POST['padead']) ? 1 : 0;
    $mama = strtoupper($_POST['mama']);
    //$madead = isset($_POST['madead']) ? 1 : 0;
    $guardian = strtoupper($_POST['guardian']);
    $addr1 = strtoupper($_POST['addr1']);
    $addr2 = strtoupper($_POST['addr2']);
    $zipcode = strtoupper($_POST['zipcode']);
    $region = strtoupper($_POST['region']);
    $highsch = strtoupper($_POST['highsch']);
    //$height = floatval($_POST['height']);
    //$eescore = strtoupper($_POST['eescore']);
    //$math = strtoupper($_POST['math']);
    //$engl = strtoupper($_POST['engl']);
    //$spma = strtoupper($_POST['spma']);
    $coy = strtoupper($_POST['coy']);
    $battalion = strtoupper($_POST['battalion']);
    $battalion2 = strtoupper($_POST['battalion2']);
    $cstat = strtoupper($_POST['cstat']);
    $remarks = strtoupper($_POST['remarks']);
    $dateadmitted = strtoupper($_POST['dateadmitted']);
    $dategrad = strtoupper($_POST['dategrad']);
    $datecomm = strtoupper($_POST['datecomm']);
    $degree = strtoupper($_POST['degree']);
    $majorin = strtoupper($_POST['majorin']);
    $graduate = strtoupper($_POST['graduate']);
    $latinaward = strtoupper($_POST['latinaward']);
    $password = strtoupper($_POST['password']);
    $coybat = strtoupper($_POST['coybat']);
    // Get the value of the hidden input field for 'active'
    $active = isset($_POST['active']) ? 1 : 0; // Set to 1 (active) if present, otherwise 0

     // show the error message that the database will not save the extra varchar
    $error_fields = array();

    if (strlen($afpsn) > $max_afpsn_length) {
        $error_fields[] = 'AFPSN';
    }
    if (strlen($servid) > $max_servid_length) {
        $error_fields[] = 'SERVID';
    }
    if (strlen($majid) > $max_majid_length) {
        $error_fields[] = 'MAJID';
    }
    if (strlen($yrgr) > $max_yrgr_length) {
        $error_fields[] = 'YRGR';
    }
    if (strlen($oyrgr) > $max_oyrgr_length) {
        $error_fields[] = 'OYRGR';
    }
    if (strlen($lname) > $max_lname_length) {
        $error_fields[] = 'LNAME';
    }
    if (strlen($fname) > $max_fname_length) {
        $error_fields[] = 'FNAME';
    }
    if (strlen($aname) > $max_aname_length) {
        $error_fields[] = 'ANAME';
    }
    if (strlen($mname) > $max_mname_length) {
        $error_fields[] = 'MNAME';
    }
    if (strlen($initls) > $max_initls_length) {
        $error_fields[] = 'INITLS';
    }
    if (strlen($gender) > $max_gender_length) {
        $error_fields[] = 'GENDER';
    }
    if (strlen($bplace) > $max_bplace_length) {
        $error_fields[] = 'BPLACE';
    }
    if (strlen($papa) > $max_papa_length) {
        $error_fields[] = 'PAPA';
    }
    if (strlen($mama) > $max_mama_length) {
        $error_fields[] = 'MAMA';
    }
    if (strlen($guardian) > $max_guardian_length) {
        $error_fields[] = 'GUARDIAN';
    }
    if (strlen($addr1) > $max_addr1_length) {
        $error_fields[] = 'ADDR1';
    }
    if (strlen($addr2) > $max_addr2_length) {
        $error_fields[] = 'ADDR2';
    }
    if (strlen($zipcode) > $max_zipcode_length) {
        $error_fields[] = 'ZIPCODE';
    }
    if (strlen($region) > $max_region_length) {
        $error_fields[] = 'REGION';
    }
    if (strlen($highsch) > $max_highsch_length) {
        $error_fields[] = 'HIGHSCH';
    }
    /*
    if (strlen($height) > $max_height_length) {
        $error_fields[] = 'HEIGHT';
    }
    if (strlen($eescore) > $max_eescore_length) {
        $error_fields[] = 'EESCORE';
    }
    if (strlen($math) > $max_math_length) {
        $error_fields[] = 'MATH';
    }
    if (strlen($engl) > $max_engl_length) {
        $error_fields[] = 'ENGL';
    }
    if (strlen($spma) > $max_spma_length) {
        $error_fields[] = 'SPMA';
    }*/
    if (strlen($coy) > $max_coy_length) {
        $error_fields[] = 'COY';
    }
    if (strlen($battalion) > $max_battalion_length) {
        $error_fields[] = 'BATTALION';
    }
    if (strlen($battalion2) > $max_battalion2_length) {
        $error_fields[] = 'BATTALION2';
    }
    if (strlen($cstat) > $max_cstat_length) {
        $error_fields[] = 'CSTAT';
    }
    if (strlen($remarks) > $max_remarks_length) {
        $error_fields[] = 'REMARKS';
    }
    if (strlen($dateadmitted) > $max_dateadmitted_length) {
        $error_fields[] = 'DATEADMITED';
    }
    if (strlen($dategrad) > $max_dategrad_length) {
        $error_fields[] = 'DATEGRAD';
    }
    if (strlen($datecomm) > $max_datecomm_length) {
        $error_fields[] = 'DATECOMM';
    }
    if (strlen($degree) > $max_degree_length) {
        $error_fields[] = 'DEGREE';
    }
    if (strlen($majorin) > $max_majorin_length) {
        $error_fields[] = 'MAJORIN';
    }
    if (strlen($graduate) > $max_graduate_length) {
        $error_fields[] = 'GRADUATE';
    }
    if (strlen($latinaward) > $max_latinaward_length) {
        $error_fields[] = 'LATINAWARD';
    }
    if (strlen($password) > $max_password_length) {
        $error_fields[] = 'PASSWORD';
    }
    if (strlen($coybat) > $max_coybat_length) {
        $error_fields[] = 'COYBAT';
    }
    if (!empty($error_fields)) {
        $error_fields_str = implode(', ', $error_fields);
        $_SESSION['message'] = "The following fields exceed the maximum allowed length: $error_fields_str";
        echo "<script>window.location.href = 'cadet-create.php';</script>";
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
        $query = "SELECT pix FROM cadet WHERE cadet_id='$cadet_id'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        $imageData = $row['pix'];
    }

    // height,eescore,math,engl,spma was not include
    $query = "INSERT INTO cadet (afpsn, servid, majid, yrgr, oyrgr, lname, fname, aname, mname, initls, gender, bdate, bplace, papa, padead, mama, madead, guardian, addr1, addr2, zipcode,
    region, highsch, coy, battalion, battalion2, cstat, remarks, pix, dateadmitted, dategrad, datecomm, degree, majorin, graduate, latinaward, password, coybat, active) 
    VALUES ('$afpsn', '$servid', '$majid', '$yrgr', '$oyrgr', '$lname', '$fname', '$aname', '$mname', '$initls', '$gender', '$bdate', '$bplace', '$papa', '$padead', '$mama', '$madead',
    '$guardian', '$addr1','$addr2', '$zipcode', '$region', '$highsch', '$coy', '$battalion', '$battalion2', '$cstat', '$remarks', '$imageData', '$dateadmitted', '$dategrad', 
    '$datecomm', '$degree', '$majorin', '$graduate', '$latinaward', '$password', '$coybat', '$active')";

    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = "Cadet Created Successfully";
        header("Location: cadet.php"); // Redirect using PHP
        exit(0);
    } else {
        $_SESSION['message'] = "Cadet Not Created: " . mysqli_error($conn);
        header("Location: cadet.php"); // Redirect using PHP
        exit(0);
    }
}

//PAGINATION//
if (!isset($_SESSION['user_name'])) {
    echo '<script>window.location.href = "login_form.php";</script>';
}

// Determine the total number of entries in the "cadet" table
$countQuery = "SELECT COUNT(*) as total FROM cadet";
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
$query = "SELECT * FROM cadet LIMIT $entriesPerPage OFFSET $offset";
$query_run = mysqli_query($conn, $query);

?>