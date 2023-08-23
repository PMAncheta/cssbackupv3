<?php
if (isset($_POST['course_id'], $_POST['field_name'], $_POST['field_value'])) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cgs";

    // Create a connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $allowed_fields = ['ccode', 'cequi', 'cname', 'cdesc', 'cadd', 'cadd2', 'ctypeold', 'ctype'];
    $course_id = mysqli_real_escape_string($conn, $_POST['course_id']);
    $field_name = mysqli_real_escape_string($conn, $_POST['field_name']);
    $field_value = mysqli_real_escape_string($conn, $_POST['field_value']);

    if (in_array($field_name, $allowed_fields)) {
        // Perform the database update
        $update_query = "UPDATE courses SET $field_name = '$field_value' WHERE course_id = '$course_id'";
        $update_result = mysqli_query($conn, $update_query);

        // You can return a response indicating success or failure
        if ($update_result) {
            echo "success";
        } else {
            echo "error";
        }
    } else {
        echo "error";
    }
}
?>
