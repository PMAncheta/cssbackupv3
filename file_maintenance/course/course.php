<?php
session_start();

include 'dbcon.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- FOR CUNITS ONLY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    // Add click event listener to clickable-td elements using event delegation
        // Define maximum lengths for different fields
    var maxFieldLengths = {
        ccode: 4,
        cequi: 6,
        cname: 8,
        cdesc: 40,
        cunits: 50,
        ctype: 50,
        cadd: 2,
        cadd2: 2,
        ctypeold: 2
    };
    
    $("#tableBody").on("dblclick", ".clickable-td", function() {
        var td = $(this);

        // Exclude ctype column from being editable
        if (!td.hasClass("not-editable")) {
            var originalContent = td.text();
            var maxFieldLength = maxFieldLengths[td.data("field")]; // Get max length based on field
            var columnClass = td.data("column-class"); // Get the column class

            // Handle special case for cunits column
            if (td.hasClass("cunits")) {
                // ... (your existing cunits column code)
                var input = $("<input type='number' class='editable-input'>");
                input.val(originalContent);
                input.attr("min", 1); // Set minimum value
                input.attr("max", 999); // Set maximum value
                input.attr("step", 1); // Set step value to 1 (no decimals)

                // Replace the text content with input
                td.html(input);

                // Focus on the input
                input.focus();

                var hasChanges = false;
                var isEmpty = false;

                // Detect changes in input value
                input.on('input', function() {
                    if ($(this).val() !== originalContent) {
                        hasChanges = true;
                    } else {
                        hasChanges = false;
                    }
                    isEmpty = $(this).val().trim() === "";
                });

                // Save the original content when input loses focus
                input.blur(function() {
                    var newContent = $(this).val();
                    var courseId = td.data("course-id");

                    // Check for unchanged input
                    if (!hasChanges) {
                        td.text(originalContent);
                        return;
                    }

                    // Validate new content for numeric values between 1 and 999
                    var numericValue = parseInt(newContent);
                    if (isEmpty || isNaN(numericValue) || numericValue < 1 || numericValue > 999) {
                        alert(isEmpty ? "This field cannot be left blank." : "Please enter a numeric value between 1 and 999.");
                        // Reset to original content
                        td.text(originalContent);
                        return;
                    }

                    // Convert input to uppercase
                    newContent = newContent.toUpperCase();

                    // Update the content in the table cell
                    td.text(newContent);

                    // Perform AJAX request to update the database
                    $.post("update_course.php", {
                        course_id: courseId,
                        field_name: td.attr("data-field"),
                        field_value: newContent
                    }, function(response) {
                        if (response === "success") {
                            // Refresh the page after successful update
                            // location.reload();
                        }
                    });
                });
            } else {
                var input = $("<input type='text' class='editable-input'>");
                input.val(originalContent);
                input.attr("maxlength", maxFieldLength);

                // Replace the text content with input
                td.html(input);

                // Focus on the input and select its content
                input.focus().select();

                var hasChanges = false;
                var isEmpty = false;

                // Detect changes in input value
                input.on('input', function() {
                    if ($(this).val() !== originalContent) {
                        hasChanges = true;
                    } else {
                        hasChanges = false;
                    }
                    isEmpty = $(this).val().trim() === "";
                });

                // Save the original content when input loses focus
                input.blur(function() {
                    var newContent = $(this).val();
                    var courseId = td.data("course-id");

                    // Check for unchanged input
                    if (!hasChanges) {
                        td.text(originalContent);
                        return;
                    }

                    if (isEmpty) {
                        alert("This field cannot be left blank.");
                        // Reset to original content
                        td.text(originalContent);
                        return;
                    }

                    // Convert input to uppercase
                        newContent = newContent.toUpperCase();

                        // Input validation using regular expression
                        var regex = /^[A-Z0-9\s\-]+$/; // Allow numbers and uppercase letters
                        if (!regex.test(newContent)) {
                            alert("Invalid input. Please enter uppercase letters and numbers.");
                            // Reset to original content
                            td.text(originalContent);
                            return;
                        }

                    // Update the content in the table cell
                    td.text(newContent);

                    // Perform AJAX request to update the database
                    $.post("update_course.php", {
                        course_id: courseId,
                        field_name: td.attr("data-field"),
                        field_value: newContent
                    }, function(response) {
                        if (response === "success") {
                            // Refresh the page after successful update
                            // location.reload();
                        } else {
                            alert("An error occurred while updating the course.");
                        }
                    });
                });
            }
        } 
    });
});
</script>
<script>
    $(document).ready(function() {
        // Add click event listener to clickable-td elements using event delegation
        $("#tableBody").on("dblclick", ".clickable-td", function() {
            var td = $(this);

            // Exclude ctype column from being editable
            if (!td.hasClass("not-editable")) {
                // Ask for confirmation
                if (confirm("Are you sure you want to edit this field?")) {
                    var originalContent = td.text();
                    var maxFieldLength = td.data("max-length");
                    var columnClass = td.data("column-class"); // Get the column class

                    var input = $("<input type='text' class='editable-input'>");
                    input.val(originalContent);
                    input.attr("maxlength", maxFieldLength);

                    // Replace the text content with input
                    td.html(input);

                    // Focus on the input and select its content
                    input.focus().select();

                    var hasChanges = false;

                    // Detect changes in input value
                    input.on('input', function() {
                        hasChanges = $(this).val() !== originalContent;
                    });

                    // Save the original content when input loses focus
                    input.blur(function() {
                        var newContent = $(this).val();
                        var courseId = td.data("course-id");

                        // Check for unchanged input
                        if (!hasChanges) {
                            td.text(originalContent);
                            return;
                        }

                        // Check for blank input in specific columns
                        if (newContent.trim() === "" && ["ccode", "cequi", "cname", "desc", "cadd", "cadd2"].includes(columnClass)) {
                            alert("This field cannot be left blank.");
                            // Reset to original content
                            td.text(originalContent);
                            return;
                        }

                        // Convert input to uppercase
                        newContent = newContent.toUpperCase();

                        // Check for duplicate ccode
                        if (columnClass === "ccode") {
                            var existingCcodes = <?php echo json_encode($course); ?>; // An array of existing ccode values
                            if (existingCcodes.includes(newContent)) {
                                alert("Course Already Exist"); // Prompt a message if ccode already exists
                                // Reset to original content
                                td.text(originalContent);
                                return;
                            }
                        }

                        // Convert input to uppercase
                        newContent = newContent.toUpperCase();

                        // Input validation using regular expression
                        var regex = /^[A-Z0-9\s\-]+$/; // Allow numbers and uppercase letters
                        if (!regex.test(newContent)) {
                            alert("Invalid input. Please enter uppercase letters and numbers.");
                            // Reset to original content
                            td.text(originalContent);
                            return;
                        }

                        // Update the content in the table cell
                        td.text(newContent);

                        // Perform AJAX request to update the database
                        $.post("update_course.php", {
                            course_id: courseId,
                            field_name: td.attr("data-field"),
                            field_value: newContent
                        }, function(response) {
                            if (response === "success") {
                                // Refresh the page after successful update
                                // location.reload();
                            } else {
                                alert("An error occurred while updating the course.");
                            }
                        });
                    });
                }
            } 
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Add double-click event listener to the ctype cell
        $("#tableBody").on("dblclick", ".clickable-td.ctype", function() {
            var td = $(this);
            var courseId = td.data("course-id");
            var originalContent = td.text();

            // Create a select element with options
            var select = $("<select class='editable-input'></select>");
            var coursetypes = ["Academic", "Tactics", "Military Aptitude", "Military Conduct", "Physical Education"];
            var coursetypeCodes = ["AC", "T", "MA", "MC", "PE"];

            // Generate options for the select element
            for (var i = 0; i < coursetypes.length; i++) {
                var option = $("<option></option>").attr("value", coursetypeCodes[i]).text(coursetypes[i]);
                select.append(option);
            }

            // Set the original value as selected
            select.val(originalContent);

            // Replace the text content with the select element
            td.html(select);

            // Listen for change event on select element
            select.change(function() {
                var selectedOption = $(this).find(":selected");
                var newContent = selectedOption.val();

                // Perform AJAX request to update the database
                $.post("update_course.php", {
                    course_id: courseId,
                    field_name: td.attr("data-field"),
                    field_value: newContent
                }, function(response) {
                    if (response === "success") {
                        // Update the content in the table cell
                        td.text(coursetypeCodes[coursetypes.indexOf(selectedOption.text())]);
                    } else {
                        alert("An error occurred while updating the course.");
                    }
                });
            });

            // Listen for blur event on select element (user clicks away)
            select.blur(function() {
                // Update the content in the table cell with coursetype code
                td.text(coursetypeCodes[coursetypes.indexOf(select.val())]);
            });
            
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    function searchTable(input) {
        $.get("search.php", { input: input }, function(data) {
            $("#tableBody").html(data);
        });
    }

    $("#searchInput").on("input", function() {
        var inputValue = $(this).val().toUpperCase();
        searchTable(inputValue);
    });
});
</script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/style5.css">
    <link rel="stylesheet" href="css/style6.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Course</title>
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
               <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7f/Philippine_Military_Academy_%28PMA%29.svg/1200px-Philippine_Military_Academy_%28PMA%29.svg.png" alt="">
            </div>

            <span class="logo_name">CIS</span>
        </div>

        <div class="sue">
            <ul>
                <li class="main-link">
                    <a href="/cssbackupv2/user_panel.php" class="link-text">
                        <i class="uil uil-estate"></i>Dashboard</a>
                </li>
                <li class="main-link">
                    <i class="uil uil-folder"></i>
                    File Maintenance
                    <i class="uil uil-arrow-right rotate"></i>
                    <ul class="sublink"></li>
                        <li><a href="/cssbackupv2/file_maintenance/cadets/cadet.php">Cadets</a></li>
                        <li><a href="/cssbackupv2/file_maintenance/department/department.php">Department</a></li>
                        <li><a href="/cssbackupv2/file_maintenance/faculty/faculty.php">Faculty</a></li>
                        <li><a href="/cssbackupv2/file_maintenance/course/course.php">Course</a></li>
                    </ul>
                </li>
                <li class="main-link">
                    <i class="uil uil-facebook"></i>
                    Main Link 2
                    <ul class="sublink">
                        <li>Sublink 1
                            <ul class="subbuttonlink">
                                <li>Subbuttonlink 1</li>
                                <li>Subbuttonlink 2</li>
                                <li>Subbuttonlink 3</li>
                            </ul>
                        </li>
                        <li>Sublink 2</li>
                        <li>Sublink 3</li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>

    <section class="dashboard">
        <div class="top">
            <button>
                <i class="uil uil-bars sidebar-toggle"></i>
            </button>

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" id="searchInput" placeholder="Search here..." oninput="searchTable()" style="text-transform: uppercase;">
            </div>


            <!--<img src="images/profile.jpg" alt="">-->
            <div class="norms">
                <div class="loki" onclick="menuToggle();">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSVWQTWRsXnQBqP30w3bP2Il7Y9nnybYopPVg&usqp=CAU" width="50" height="50">
                </div>
                    <div class="logout">
                    <!-- Name of the profile
                        <h3>Famous<br><span>Tinapay Enjoyer</span></h3> -->
                    <ul>
                        <li><a href="logout.php">
                            <i class="uil uil-signout">Logout</i></a>
                        </li>
                        <li><a href="#">
                                <i class="uil uil-setting"></i>
                                Settings
                            </a>
                        </li>
                        <li>
                            <i class="uil uil-moon"></i>
                            <span class="link-name">
                                Dark Mode
                            </span>
                            <div class="mode-toggle">
                                <span class="switch"></span>
                            </div>
                        </li>
                    </ul>
                </div>    
            </div>
        </div>

        <div class="dash-content">
            <div class="overview">
            
                <div class="container mt-4">
                    <div class="activity">
                    

                        <?php include('message.php'); ?>
                        <?php include('courseconfig.php'); ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>
                                            <i class="uil uil-book-open deplogo"></i>
                                            <span class="text">Course</span>
                                            <a href="course-create.php" class="btn btn-primary float-end">Add Course</a>
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="td">CCODE</th>
                                                    <th class="td">CEQUI</th>
                                                    <th class="td">CNAME</th>
                                                    <th class="td">CDESC</th>
                                                    <th class="td">CUNITS</th>
                                                    <th class="td">CTYPE</th>
                                                    <th class="td">CADD</th>
                                                    <th class="td">CADD2</th>
                                                    <th class="td">CTYPEOLD</th>
                                                    <th class="td"></th>
                                                </tr>
                                            </thead>
                                            <tbody id="tableBody">
                                                <!-- PHP loop starts here -->
                                                <?php 
                                                // Calculate the offset for the database query based on the current page and number of entries per page
                                                $offset = max(0, ($currentPage - 1) * $entriesPerPage);

                                                // Modify the query to include pagination
                                                $query = "SELECT * FROM courses LIMIT $entriesPerPage OFFSET $offset";
                                                $query_run = mysqli_query($conn, $query);

                                                $rowNum = ($currentPage - 1) * $entriesPerPage + 1;
                                                while ($course = mysqli_fetch_assoc($query_run)) {
                                                    $ccode = $course['ccode'];
                                                    $cequi = $course['cequi'];
                                                    $cname = $course['cname'];
                                                    $cdesc = $course['cdesc'];
                                                    $cunits = $course['cunits'];
                                                    $ctype = $course['ctype'];
                                                    $cadd = $course['cadd'];
                                                    $cadd2 = $course['cadd2'];
                                                    $ctypeold = $course['ctypeold'];
                                                
                                                    // Convert the PHP variables to JSON format and encode them
                                                    $courseJson = json_encode([$ccode, $cequi, $cname, $cdesc, $cunits, $ctype, $cadd, $cadd2, $ctypeold]);
                                                    ?>
                                                    <tr class="myList">
                                                        <td class="clickable-td ccode" data-course-id="<?= $course['course_id']; ?>" data-field="ccode" data-max-length="<?= $maxCcodeLength; ?>">
                                                            <?= strtoupper($course['ccode']); ?>
                                                        </td>
                                                        <td class="clickable-td cequi" data-course-id="<?= $course['course_id']; ?>" data-field="cequi" data-max-length="<?= $maxCequiLength; ?>">
                                                            <?= strtoupper($course['cequi']); ?>
                                                        </td>
                                                        <td class="clickable-td cname" data-course-id="<?= $course['course_id']; ?>" data-field="cname" data-max-length="<?= $maxCnameLength; ?>">
                                                            <?= strtoupper($course['cname']); ?>
                                                        </td>
                                                        <td class="clickable-td cdesc" data-course-id="<?= $course['course_id']; ?>" data-field="cdesc" data-max-length="<?= $maxCdescLength; ?>">
                                                            <?= strtoupper($course['cdesc']); ?>
                                                        </td>
                                                        <td class="clickable-td cunits" data-course-id="<?= $course['course_id']; ?>" data-field="cunits" data-max-length="<?= $maxCunitsLength; ?>">
                                                            <?= strtoupper($course['cunits']); ?>
                                                        </td>
                        
                                                        <td class="clickable-td ctype" data-course-id="<?= $course['course_id']; ?>" data-field="ctype" data-column-class="ctype-column">
                                                            <?= strtoupper($course['ctype']); ?>
                                                        </td>

                                                        </td>
                                                        <td class="clickable-td cadd" data-course-id="<?= $course['course_id']; ?>" data-field="cadd" data-max-length="<?= $maxCaddLength; ?>">
                                                            <?= strtoupper($course['cadd']); ?>
                                                        </td>
                                                        <td class="clickable-td cadd2" data-course-id="<?= $course['course_id']; ?>" data-field="cadd2" data-max-length="<?= $maxCadd2Length; ?>">
                                                            <?= strtoupper($course['cadd2']); ?>
                                                        </td>
                                                        <td class="clickable-td ctypeold" data-course-id="<?= $course['course_id']; ?>" data-field="ctypeold" data-max-length="<?= $maxCtypeoldLength; ?>">
                                                            <?= strtoupper($course['ctypeold']); ?>
                                                        </td> 
                                                        <td>
                                                            <div class="inline">
                                                                <!-- <a href="course-edit.php?course_id=<?= $course['course_id']; ?>" class="btn btn-info btn-sm">Edit</a> -->
                                                            </div>
                                                            <div class="inline">
                                                                <form action="course.php" method="POST" class="d-inline">
                                                                    <button type="submit" name="delete_student" value="<?= $course['course_id']; ?>" class="btn btn-danger btn-sm">Withdraw</button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $rowNum++;
                                                }
                                                ?>
                                                <!-- PHP loop ends here -->
                                            </tbody>
                                        </table>

                                        <!-- Pagination -->
                                        <div class="pagination justify-content-center">
                                        <ul class="pagination-list pagination">
                                            <?php
                                            if ($totalPages > 1 && empty($_GET['search'])) {
                                                if ($currentPage > 1) {
                                                    echo '<li class="page-item"><a class="page-link" href="course.php?page=' . ($currentPage - 1) . '">&laquo;</a></li>';
                                                }
                                                for ($i = 1; $i <= $totalPages; $i++) {
                                                    if ($i == $currentPage) {
                                                        echo '<li class="page-item active"><span class="page-link">' . $i . '</span></li>';
                                                    } else {
                                                        echo '<li class="page-item"><a class="page-link" href="course.php?page=' . $i . '">' . $i . '</a></li>';
                                                    }
                                                }
                                                if ($currentPage < $totalPages) {
                                                    echo '<li class="page-item"><a class="page-link" href="course.php?page=' . ($currentPage + 1) . '">&raquo;</a></li>';
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>