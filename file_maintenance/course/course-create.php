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

    <title>Course Create</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Course
                            <a href="course.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>

                    <?php
                    $error_message = ""; // Initialize the error message variable

                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Check if any field is left blank
                        if (empty($_POST["ccode"]) || empty($_POST["cequi"]) || empty($_POST["cname"]) || empty($_POST["cdesc"]) || empty($_POST["cunits"]) || empty($_POST["ctype"]) || empty($_POST["cadd"]) || empty($_POST["cadd2"]) || empty($_POST["ctypeold"])) {
                            $error_message = "Please fill in all the required fields.";
                        }

                        // If no errors, proceed with form processing
                        if (empty($error_message)) {
                            // Your existing code to process the form data here
                            // ...
                            $ccode = $_POST["ccode"];
                            $cequi = $_POST["cequi"];
                            $cname = $_POST["cname"];
                            $cdesc = $_POST["cdesc"];
                            $cunits = $_POST["cunits"];
                            $ctype = $_POST["ctype"];
                            $cadd = $_POST["cadd"];
                            $cadd2 = $_POST["cadd2"];
                            $ctypeold = $_POST["ctypeold"];

                            $conn = mysqli_connect("localhost", "root", "", "cgs");
                            $query = "INSERT INTO courses (ccode, cequi, cname, cdesc, cunits, ctype, cadd, cadd2, ctypeold) VALUES ('$ccode', '$cequi', '$cname', '$cdesc', '$cunits', '$ctype', '$cadd', '$cadd2', '$ctypeold')";
                            mysqli_query($conn, $query);
                            mysqli_close($conn);

                            // After successful processing, you can redirect or show a success message
                            echo "Form submitted successfully!";
                        }
                    }
                    ?>

                    <div class="card-body">
                        <?php
                        if (!empty($error_message)) {
                            echo '<div class="alert alert-danger">' . $error_message . '</div>';
                        }
                        ?>
                        <form action="course.php" method="post">

                            <div class="mb-3">
                                <label>CCODE</label>
                                <input type="text" name="ccode" id="ccode" class="form-control" style="text-transform: uppercase;">
                                <div id="ccode-error" class="text-danger"></div>
                            </div>

                            <div class="mb-3">
                                <label>CEQUI</label>
                                <input type="text" name="cequi" id="cequi" class="form-control">
                                <div id="cequi-error" class="text-danger"></div>
                            </div>
                            
                            <div class="mb-3">
                                <label>CNAME</label>
                                <input type="text" name="cname" id="cname" class="form-control">
                                <div id="cname-error" class="text-danger"></div>
                            </div>

                            <div class="mb-3">
                                <label>CDESC</label>
                                <input type="text" name="cdesc" id="cdesc" class="form-control">
                                <div id="cdesc-error" class="text-danger"></div>
                            </div>

                            <!-- Other input fields ... -->
                            <div class="mb-3">
                                <label>CUNITS</label>
                                <input type="number" name="cunits" id="cunits" class="form-control" min="1" max="999" oninput="validateCUnits()">
                                <div id="cunits-error" class="text-danger"></div>
                            </div>

                            <div class="mb-3">
                            <label for="ctype">CTYPE</label>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="ctypeDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                    Select Course Type
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="ctypeDropdown">
                                    <?php
                                    $query = "SELECT ctype, coursetypedesc FROM coursetype";
                                    $result = mysqli_query($conn, $query);

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo '<li><a class="dropdown-item ctype-option" href="#" data-ctype="' . $row['ctype'] . '" data-coursetypedesc="' . $row['coursetypedesc'] . '">' . $row['coursetypedesc'] . '</a></li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                            <input type="hidden" name="ctype" id="ctypeHidden">
                        </div>
                            <div class="mb-3">
                                <label>CADD</label>
                                <input type="text" name="cadd" id="cadd" class="form-control">
                                <div id="cadd-error" class="text-danger"></div>
                            </div>
                            <div class="mb-3">
                                <label>CADD2</label>
                                <input type="text" name="cadd2" id="cadd2" class="form-control">
                                <div id="cadd2-error" class="text-danger"></div>
                            </div>
                            <div class="mb-3">
                                <label>CTYPEOLD</label>
                                <input type="text" name="ctypeold" id="ctypeold" class="form-control">
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="save_student" class="btn btn-primary" value="submit">Save Course</button>
                            </div>

                        </form>


                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // JavaScript to handle dropdown selection
    const ctypeDropdown = document.getElementById('ctypeDropdown');
    const ctypeHidden = document.getElementById('ctypeHidden');

    document.querySelectorAll('.ctype-option').forEach(option => {
        option.addEventListener('click', function() {
            ctypeDropdown.innerText = this.dataset.coursetypedesc;
            ctypeHidden.value = this.dataset.ctype;
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var fields = document.querySelectorAll('input[type="text"], textarea');
        
        for (var i = 0; i < fields.length; i++) {
            fields[i].addEventListener('blur', function() {
                var inputValue = this.value.trim();
                var errorElement = document.getElementById(this.id + '-error');
                
                if (inputValue === '') {
                    errorElement.textContent = 'This field cannot be left blank.';
                } else {
                    var specialCharactersPattern = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
                    if (specialCharactersPattern.test(inputValue)) {
                        var numbersOnlyPattern = /^[0-9]+$/;
                        if (!numbersOnlyPattern.test(inputValue)) {
                            alert("Special characters, and symbols are not allowed in this field. Please enter a valid value.");
                            this.value = '';
                            errorElement.textContent = 'Special characters, and symbols are not allowed.';
                        } else {
                            errorElement.textContent = '';
                        }
                    } else {
                        errorElement.textContent = '';
                    }
                }
            });
        }
        
        document.querySelector('form').addEventListener('submit', function(event) {
            var isValid = true;
            var errorElements = document.querySelectorAll('.error-message');
            
            for (var i = 0; i < errorElements.length; i++) {
                if (errorElements[i].textContent !== '') {
                    isValid = false;
                    break;
                }
            }
            
            if (!isValid) {
                event.preventDefault();
            }
        });
    });
</script>
<!-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        var fields = document.querySelectorAll('input[type="text"], textarea');
        
        for (var i = 0; i < fields.length; i++) {
            fields[i].addEventListener('blur', function() {
                var inputValue = this.value.trim();
                var errorElement = document.getElementById(this.id + '-error');
                
                if (inputValue === '') {
                    errorElement.textContent = 'This field cannot be left blank.';
                } else {
                    var specialCharactersPattern = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?\d]+/;
                    if (specialCharactersPattern.test(inputValue)) {
                        alert("Special characters, symbols, and numbers are not allowed in this field. Please enter a valid value.");
                        this.value = '';
                        errorElement.textContent = 'Special characters, symbols, and numbers are not allowed.';
                    } else {
                        errorElement.textContent = '';
                    }
                }
            });
        }
        
        document.querySelector('form').addEventListener('submit', function(event) {
            var isValid = true;
            var errorElements = document.querySelectorAll('.error-message');
            
            for (var i = 0; i < errorElements.length; i++) {
                if (errorElements[i].textContent !== '') {
                    isValid = false;
                    break;
                }
            }
            
            if (!isValid) {
                event.preventDefault();
            }
        });
    });
</script> -->
<!-- <script>
    function validateInput(inputId) {
        var input = document.getElementById(inputId);
        var inputValue = input.value;

        if (inputId === 'ccode') {
            // Check for special characters, symbols, and numbers
            var specialCharactersPattern = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?\d]+/;
            if (specialCharactersPattern.test(inputValue)) {
                alert("Special characters, symbols, and numbers are not allowed in this field. Please enter a valid value.");
                input.value = '';
            }
        } 
        if (inputId === 'cequi') {
            // Check for special characters, symbols, and numbers
            var specialCharactersPattern = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?\d]+/;
            if (specialCharactersPattern.test(inputValue)) {
                alert("Special characters, symbols, and numbers are not allowed in this field. Please enter a valid value.");
                input.value = '';
            }
        }
        if (inputId === 'cname') {
            // Check for special characters, symbols, and numbers
            var specialCharactersPattern = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?\d]+/;
            if (specialCharactersPattern.test(inputValue)) {
                alert("Special characters, symbols, and numbers are not allowed in this field. Please enter a valid value.");
                input.value = '';
            }
        }
        if (inputId === 'cdesc') {
            // Check for special characters, symbols, and numbers
            var specialCharactersPattern = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?\d]+/;
            if (specialCharactersPattern.test(inputValue)) {
                alert("Special characters, symbols, and numbers are not allowed in this field. Please enter a valid value.");
                input.value = '';
            }
        }
        if (inputId === 'cadd') {
            // Check for special characters, symbols, and numbers
            var specialCharactersPattern = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?\d]+/;
            if (specialCharactersPattern.test(inputValue)) {
                alert("Special characters, symbols, and numbers are not allowed in this field. Please enter a valid value.");
                input.value = '';
            }
        }
        if (inputId === 'cadd2') {
            // Check for special characters, symbols, and numbers
            var specialCharactersPattern = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?\d]+/;
            if (specialCharactersPattern.test(inputValue)) {
                alert("Special characters, symbols, and numbers are not allowed in this field. Please enter a valid value.");
                input.value = '';
            }
        }
        if (inputId === 'ctypeold') {
            // Check for special characters, symbols, and numbers
            var specialCharactersPattern = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?\d]+/;
            if (specialCharactersPattern.test(inputValue)) {
                alert("Special characters, symbols, and numbers are not allowed in this field. Please enter a valid value.");
                input.value = '';
            }
        }
    }

    // Attach the validateInput function to the input fields
    document.getElementById('ccode').addEventListener('blur', function() { validateInput('ccode'); });
    document.getElementById('cequi').addEventListener('blur', function() { validateInput('cequi'); });
    document.getElementById('cname').addEventListener('blur', function() { validateInput('cname'); });
    document.getElementById('cdesc').addEventListener('blur', function() { validateInput('cdesc'); });
    document.getElementById('cadd').addEventListener('blur', function() { validateInput('cadd'); });
    document.getElementById('cadd2').addEventListener('blur', function() { validateInput('cadd2'); });
    document.getElementById('ctypeold').addEventListener('blur', function() { validateInput('ctypeold'); });
</script> -->
<!-- <script>
    document.querySelector('form').addEventListener('submit', function(event) {
        var ccode = document.getElementById('ccode');
        var cequi = document.getElementById('cequi');
        var cname = document.getElementById('cname');
        var cdesc = document.getElementById('cdesc');
        var cadd = document.getElementById('cadd');
        var cadd2 = document.getElementById('cadd2');
        /*var ctypeold = document.getElementById('ctypeold');*/
        // Add more fields here...

        var fields = [ccode, cequi, cname, cdesc, cadd, cadd2, ctypeold]; // Add more fields here...

        var isValid = true;

        for (var i = 0; i < fields.length; i++) {
            if (fields[i].value.trim() === '') {
                document.getElementById(fields[i].id + '-error').textContent = 'This field cannot be left blank.';
                isValid = false;
            } else {
                document.getElementById(fields[i].id + '-error').textContent = '';
            }
        }

        if (!isValid) {
            event.preventDefault(); // Prevent form submission if any field is invalid
        }
    });
</script> -->
<script>
function validateCUnits() {
    var cunitsInput = document.getElementById("cunits");
    var cunitsError = document.getElementById("cunits-error");
    var inputValue = parseInt(cunitsInput.value);

    if (isNaN(inputValue) || inputValue < 1 || inputValue > 999) {
        cunitsError.textContent = "Please enter a numeric value between 1 and 999.";
        cunitsInput.classList.add("is-invalid");
    } else {
        cunitsError.textContent = "";
        cunitsInput.classList.remove("is-invalid");
    }
}
</script>

</body>
</html>
