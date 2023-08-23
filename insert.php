<?php
include 'config.php';

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Function to validate the password
function is_valid_password($password, $cpassword) {
    // Use a regular expression to check for the presence of an uppercase, a lowercase, a digit, and a symbol
    $is_valid = preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^A-Za-z0-9]).{8,}$/', $password);
    // Check if passwords match
    $is_match = ($password === $cpassword);
    return ($is_valid && $is_match);
}

// Function to encrypt the password
function encrypt_password($password) {
    return password_hash($password, PASSWORD_BCRYPT);
}

// Taking all 4 values from the form data(input)
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$password = $_REQUEST['pass'];
$cpassword = $_REQUEST['cpass'];
$user_type = isset($_REQUEST['user_type']) ? $_REQUEST['user_type'] : '';

// Check if the passwords match and meet the validation criteria
if (!is_valid_password($password, $cpassword)) {
    echo "Error: Password must contain an uppercase letter, a lowercase letter, a numeric character, and a symbol, and should be at least 8 characters long. Also, the passwords do not match.";
    header('Location: register_form.php');
    exit();
} else {
    // Check if the email already exists in the database
    $checkEmailQuery = "SELECT * FROM user WHERE email = '$email'";
    $checkEmailResult = mysqli_query($conn, $checkEmailQuery);

    if (mysqli_num_rows($checkEmailResult) > 0) {
        // Email already exists, show error message or perform desired action
        echo "Error: Account with this email already exists.";
        header('Location: register_form.php');
        exit();
    } else {
        // Encrypt the password
        $hashed_password = encrypt_password($password);

        // Insert the new user account into the database
        $insertQuery = "INSERT INTO user (name, email, pass, user_type)
                        VALUES ('$name', '$email', '$hashed_password', '$user_type')";

        if (mysqli_query($conn, $insertQuery)) {
            echo "User account created successfully.";
            header('location: login_form.php');
            exit();
        } else {
            echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>
