<?php

require 'dbcon.php';


if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($conn, $_POST['delete_student']);

    $query = "DELETE FROM courses WHERE course_id='$student_id' ";
    $query_run = mysqli_query($conn, $query);

    if (mysqli_query($conn, $query)){
        $_SESSION['message'] = "Course delete Successfully";
        echo "<script>window.location.href = 'course.php';</script>";
        exit(0);
    } else {
        $_SESSION['message'] = "Course Not deleted ";
        echo "<script>window.location.href = 'course.php';</script>";
        exit(0);
    }
}

// if(isset($_REQUEST['update_student']))
// {
//     $course_id = mysqli_real_escape_string($conn, $_REQUEST['course_id']);
//     $ccode = mysqli_real_escape_string($conn, $_REQUEST['ccode']);
//     $cequi = mysqli_real_escape_string($conn, $_REQUEST['cequi']);
//     $cname = mysqli_real_escape_string($conn, $_REQUEST['cname']);
//     $cdesc = mysqli_real_escape_string($conn, $_REQUEST['cdesc']);
//     $cunits = mysqli_real_escape_string($conn, $_REQUEST['cunits']);
//     $ctype = $_REQUEST['ctype']; // Bypass special character restriction
//     $cadd = mysqli_real_escape_string($conn, $_REQUEST['cadd']);
//     $cadd2 = mysqli_real_escape_string($conn, $_REQUEST['cadd2']);
//     $ctypeold = mysqli_real_escape_string($conn, $_REQUEST['ctypeold']);

//     // Define a regular expression pattern for allowed characters
//     $allowedPattern = '/^[a-zA-Z0-9\s]+$/';

//     // Check if the input contains any disallowed characters for fields except ctype
//     if (!preg_match($allowedPattern, $ccode) ||
//         !preg_match($allowedPattern, $cequi) ||
//         !preg_match($allowedPattern, $cname) ||
//         !preg_match($allowedPattern, $cdesc) ||
//         !preg_match($allowedPattern, $cunits) ||
//         !preg_match($allowedPattern, $cadd) ||
//         !preg_match($allowedPattern, $cadd2) ||
//         !preg_match($allowedPattern, $ctypeold))
//     {
//         $_SESSION['message'] = "Special characters are not allowed in one or more fields";
//         echo "<script>window.location.href = 'course.php';</script>";
//         exit(0);
//     }

//     // Check if the course with the same code already exists
//     $check_query = "SELECT course_id FROM courses WHERE ccode='$ccode' AND course_id != '$course_id'";
//     $check_result = mysqli_query($conn, $check_query);
    
//     if (mysqli_num_rows($check_result) > 0) {
//         $_SESSION['message'] = "Course already exists";
//         echo "<script>window.location.href = 'course.php';</script>";
//         exit(0);
//     }

//     // Update the course information
//     $query = "UPDATE courses SET ccode='$ccode', cequi='$cequi', 
//     cname='$cname', cdesc='$cdesc', cunits='$cunits', ctype='$ctype',
//     cadd='$cadd', cadd2='$cadd2', ctypeold='$ctypeold' WHERE course_id='$course_id' ";
//     $query_run = mysqli_query($conn, $query);

//     if ($query_run){
//         $_SESSION['message'] = "Course updated Successfully";
//         echo "<script>window.location.href = 'course.php';</script>";
//         exit(0);
//     } else {
//         $_SESSION['message'] = "Course Not updated";
//         echo "<script>window.location.href = 'course.php';</script>";
//         exit(0);
//     }
// }

if(isset($_REQUEST['update_student']))
{
    $course_id = mysqli_real_escape_string($conn, $_REQUEST['course_id']);
    $ccode = mysqli_real_escape_string($conn, $_REQUEST['ccode']);
    $cequi = mysqli_real_escape_string($conn, $_REQUEST['cequi']);
    $cname = mysqli_real_escape_string($conn, $_REQUEST['cname']);
    $cdesc = mysqli_real_escape_string($conn, $_REQUEST['cdesc']);
    $cunits = mysqli_real_escape_string($conn, $_REQUEST['cunits']);
    $ctype = $_REQUEST['ctype']; // Bypass special character restriction
    $cadd = mysqli_real_escape_string($conn, $_REQUEST['cadd']);
    $cadd2 = mysqli_real_escape_string($conn, $_REQUEST['cadd2']);
    $ctypeold = mysqli_real_escape_string($conn, $_REQUEST['ctypeold']);

    // Define a regular expression pattern for allowed characters
    $allowedPattern = '/^[a-zA-Z0-9\s]+$/';

    // Check if the input contains any disallowed characters for fields except ctype
    if (!preg_match($allowedPattern, $ccode) ||
        !preg_match($allowedPattern, $cequi) ||
        !preg_match($allowedPattern, $cname) ||
        !preg_match($allowedPattern, $cdesc) ||
        !preg_match($allowedPattern, $cunits) ||
        !preg_match($allowedPattern, $cadd) ||
        !preg_match($allowedPattern, $cadd2) ||
        !preg_match($allowedPattern, $ctypeold))
    {
        $_SESSION['message'] = "Special characters are not allowed in one or more fields";
        echo "<script>window.location.href = 'course.php';</script>";
        exit(0);
    }

    // Check if the course with the same code already exists
    $check_query = "SELECT course_id FROM courses WHERE ccode='$ccode' AND course_id != '$course_id'";
    $check_result = mysqli_query($conn, $check_query);
    
    if (mysqli_num_rows($check_result) > 0) {
        $_SESSION['message'] = "Course already exists";
        echo "<script>window.location.href = 'course.php';</script>";
        exit(0);
    }

    // Update the course information
    $query = "UPDATE courses SET ccode='$ccode', cequi='$cequi', 
    cname='$cname', cdesc='$cdesc', cunits='$cunits', ctype='$ctype',
    cadd='$cadd', cadd2='$cadd2', ctypeold='$ctypeold' WHERE course_id='$course_id' ";
    $query_run = mysqli_query($conn, $query);

    if ($query_run){
        $_SESSION['message'] = "Course updated Successfully";
        echo "<script>window.location.href = 'course.php';</script>";
        exit(0);
    } else {
        $_SESSION['message'] = "Course Not updated";
        echo "<script>window.location.href = 'course.php';</script>";
        exit(0);
    }
}

if (isset($_POST['save_student'])) {
    require('dbcon.php'); // Replace with your actual database connection

    $ccode = $_POST['ccode'];
    $cequi = $_POST['cequi'];
    $cname = $_POST['cname'];
    $cdesc = $_POST['cdesc'];
    $cunits = $_POST['cunits'];
    $ctype = $_POST['ctype'];
    $cadd = $_POST['cadd'];
    $cadd2 = $_POST['cadd2'];
    $ctypeold = $_POST['ctypeold'];

    // Check if any required field is left blank
    if (empty($ccode) || empty($cequi) || empty($cname) || empty($cdesc) || empty($cunits) || empty($ctype) || empty($cadd) || empty($cadd2) /*|| empty($ctypeold)*/) {
        $_SESSION['message'] = "Please fill in all the required fields";
        echo "<script>window.location.href = 'course-create.php';</script>";
        exit(0);
    }

    // Check if the course with the same code already exists
    $check_query = "SELECT course_id FROM courses WHERE ccode='$ccode'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        $_SESSION['message'] = "Course already exists";
        echo "<script>window.location.href = 'course-create.php';</script>";
        exit(0);    
    }

    // Insert the new course
    $query = "INSERT INTO courses (ccode,cequi,cname,cdesc,cunits,ctype,cadd,cadd2,ctypeold) 
    VALUES ('$ccode','$cequi','$cname','$cdesc','$cunits','$ctype','$cadd','$cadd2','$ctypeold')";
    
    if (mysqli_query($conn, $query)) {
        $_SESSION['message'] = "Course Created Successfully";
        echo "<script>window.location.href = 'course.php';</script>";
        exit(0);
    } else {
        $_SESSION['message'] = "Course Not Created";
        echo "<script>window.location.href = 'course.php';</script>";
        exit(0);
    }

    mysqli_close($conn); // Close the database connection
}




/*if(isset($_POST['save_student']))
{
    $ccode = $_POST['ccode'];
    $cequi = $_POST['cequi'];
    $cname = $_POST['cname'];
    $cdesc = $_POST['cdesc'];
    $cunits = $_POST['cunits'];
    $ctype = $_POST['ctype'];
    $cadd = $_POST['cadd'];
    $cadd2 = $_POST['cadd2'];
    $ctypeold = $_POST['ctypeold'];

    // Define a regular expression pattern for allowed characters
    $allowedPattern = '/^[a-zA-Z0-9\s]+$/';

    // Check if the input contains any disallowed characters for fields except ctype
    if (!preg_match($allowedPattern, $ccode) ||
        !preg_match($allowedPattern, $cequi) ||
        !preg_match($allowedPattern, $cname) ||
        !preg_match($allowedPattern, $cdesc) ||
        !preg_match($allowedPattern, $cunits) ||
        !preg_match($allowedPattern, $cadd) ||
        !preg_match($allowedPattern, $cadd2) ||
        !preg_match($allowedPattern, $ctypeold))
    {
        $_SESSION['message'] = "Special characters are not allowed in one or more fields";
        echo "<script>window.location.href = 'course.php';</script>";
        exit(0);
    }

    // Check if the course with the same code already exists
    $check_query = "SELECT course_id FROM courses WHERE ccode='$ccode'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        $_SESSION['message'] = "Course already exists";
        echo "<script>window.location.href = 'course.php';</script>";
        exit(0);
    }

    // Insert the new course
    $query = "INSERT INTO courses (ccode,cequi,cname,cdesc,cunits,ctype,cadd,cadd2,ctypeold) 
    VALUES ('$ccode','$cequi','$cname','$cdesc','$cunits','$ctype','$cadd','$cadd2','$ctypeold')";
    
    if (mysqli_query($conn, $query)){
        $_SESSION['message'] = "Course Created Successfully";
        echo "<script>window.location.href = 'course.php';</script>";
        exit(0);
    } else {
        $_SESSION['message'] = "Course Not Created";
        echo "<script>window.location.href = 'course.php';</script>";
        exit(0);
    }
}
*/

//PAGINATION//

if (!isset($_SESSION['user_name'])) {
    echo "<script>window.location.href = 'login_form.php';</script>";
    exit; // Added exit here to prevent further execution
}

// Determine the total number of entries in the "course" table
$countQuery = "SELECT COUNT(*) as total FROM courses";
$countResult = mysqli_query($conn, $countQuery);
$countRow = mysqli_fetch_assoc($countResult);
$totalEntries = $countRow['total'];

// Define the number of entries to display per page and calculate the total number of pages
$entriesPerPage = 10;
$totalPages = ceil($totalEntries / $entriesPerPage);

// Get the current page number from the query string or set it to the first page if not provided
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
    $currentPage = intval($_GET['page']);
} else {
    $currentPage = 1;
}

// Ensure that the current page is within valid limits
if ($currentPage < 1) {
    $currentPage = 1;
} elseif ($currentPage > $totalPages) {
    $currentPage = $totalPages;
}

// Calculate the offset for the database query based on the current page and number of entries per page
$offset = ($currentPage - 1) * $entriesPerPage;

// Modify your existing query to include the LIMIT and OFFSET clauses
$query = "SELECT * FROM courses LIMIT $entriesPerPage OFFSET $offset";
$query_run = mysqli_query($conn, $query);

// ...

// ?>

 <?php
// include 'dbcon.php';
// $searchErr = '';
// $employee_details='';
// if(isset($_POST['save']))
// {
//     if(!empty($_POST['search']))
//     {
//         $search = $_POST['search'];
//         $stmt = $con->prepare("select * from employee_info where department like '%$search%' or name like '%$search%'");
//         $stmt->execute();
//         $employee_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
//         //print_r($employee_details);
         
//     }
//     else
//     {
//         $searchErr = "Please enter the information";
//     }
    
// }
 
// ?>