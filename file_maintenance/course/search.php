<!-- Add this at the beginning of your PHP script -->
<!-- <form method="GET" action="course.php">
    <input type="text" name="input" placeholder="Search...">
    <button type="submit">Search</button>
</form> -->


<?php
@include 'dbcon.php';

// ... (Other code above)
// Define maximum lengths for different fields
$maxCcodeLength = 4;
$maxCequiLength = 6;
$maxCnameLength = 8;
$maxCdescLength = 40;
$maxCunitsLength = 50;
$maxCtypeLength = 50;
$maxCaddLength = 2;
$maxCadd2Length = 2;
$maxCtypeoldLength = 2;

// Process search input
$input = isset($_GET['input']) ? $_GET['input'] : '';

// Construct the search query
$query = "SELECT * FROM courses";
$countQuery = "SELECT COUNT(*) as total FROM courses";

if (!empty($input)) {
    $escapedInput = mysqli_real_escape_string($conn, $input);
    $query .= " WHERE UPPER(ccode) LIKE '%$escapedInput%' OR UPPER(cequi) LIKE '%$escapedInput%' OR UPPER(cname) LIKE '%$escapedInput%' OR UPPER(cdesc) LIKE '%$escapedInput%' OR UPPER(cunits) LIKE '%$escapedInput%' OR UPPER(ctype) LIKE '%$escapedInput%' OR UPPER(cadd) LIKE '%$escapedInput%' OR UPPER(cadd2) LIKE '%$escapedInput%' OR UPPER(ctypeold) LIKE '%$escapedInput%'";
    $countQuery .= " WHERE UPPER(ccode) LIKE '%$escapedInput%' OR UPPER(cequi) LIKE '%$escapedInput%' OR UPPER(cname) LIKE '%$escapedInput%' OR UPPER(cdesc) LIKE '%$escapedInput%' OR UPPER(cunits) LIKE '%$escapedInput%' OR UPPER(ctype) LIKE '%$escapedInput%' OR UPPER(cadd) LIKE '%$escapedInput%' OR UPPER(cadd2) LIKE '%$escapedInput%' OR UPPER(ctypeold) LIKE '%$escapedInput%'";
}

// ... (Rest of the code)
// Perform the count query to get the total number of entries
$countResult = mysqli_query($conn, $countQuery);
$countRow = mysqli_fetch_assoc($countResult);
$totalEntries = $countRow['total'];


// Define the number of entries to display per page and calculate the total number of pages
$entriesPerPage = 10;
$totalPages = ceil($totalEntries / $entriesPerPage);


// Get the current page number from the query string or set it to the first page if not provided
if (isset($_GET['page'])) {
  $currentPage = $_GET['page'];
} else {
  $currentPage = 1;
}


// Calculate the offset for the database query based on the current page and number of entries per page
$offset = ($currentPage - 1) * $entriesPerPage;


// Modify the query to include pagination
$query .= " LIMIT $entriesPerPage OFFSET $offset";
$query_run = mysqli_query($conn, $query);

// Generate the updated table rows
$tableRows = '';
if (mysqli_num_rows($query_run) == 0) {
    echo '<tr><td colspan="10" class="text-center">No Matching Record Found</td></tr>';
} else 
while ($course = mysqli_fetch_assoc($query_run)) {
    // Generate the row HTML dynamically (same as before)
    $tableRows .= '<tr class="myList">
                    <td class="clickable-td ccode" data-course-id="' . $course['course_id'] . '" data-field="ccode" data-max-length="' . $maxCcodeLength . '">
                        ' . strtoupper($course['ccode']) . '
                    </td>
                    <td class="clickable-td cequi" data-course-id="' . $course['course_id'] . '" data-field="cequi" data-max-length="' . $maxCequiLength . '">
                        ' . strtoupper($course['cequi']) . '
                    </td>
                    <td class="clickable-td cname" data-course-id="' . $course['course_id'] . '" data-field="cname" data-max-length="' . $maxCnameLength . '">
                        ' . strtoupper($course['cname']) . '
                    </td>
                    <td class="clickable-td cdesc" data-course-id="' . $course['course_id'] . '" data-field="cdesc" data-max-length="' . $maxCdescLength . '">
                        ' . strtoupper($course['cdesc']) . '
                    </td>
                    <td class="clickable-td cunits" data-course-id="' . $course['course_id'] . '" data-field="cunits" data-max-length="' . $maxCunitsLength . '">
                        ' . strtoupper($course['cunits']) . '
                    </td>
                    <td class="clickable-td ctype" data-course-id="' . $course['course_id'] . '" data-field="ctype" data-max-length="' . $maxCtypeLength . '" data-ctype-code="' . $course['ctype'] . '">
                        ' . strtoupper($course['ctype']) . '
                    </td>
                    <td class="clickable-td cadd" data-course-id="' . $course['course_id'] . '" data-field="cadd" data-max-length="' . $maxCaddLength . '">
                        ' . strtoupper($course['cadd']) . '
                    </td>
                    <td class="clickable-td cadd2" data-course-id="' . $course['course_id'] . '" data-field="cadd2" data-max-length="' . $maxCadd2Length . '">
                        ' . strtoupper($course['cadd2']) . '
                    </td>
                    <td class="clickable-td ctypeold" data-course-id="' . $course['course_id'] . '" data-field="ctypeold" data-max-length="' . $maxCtypeoldLength . '">
                        ' . strtoupper($course['ctypeold']) . '
                    </td>
                    <td>
                        <!-- <div class="inline">
                            <a href="course-edit.php?course_id=' . $course['course_id'] . '" class="btn btn-info btn-sm">Edit</a>
                        </div> -->
                        <div class="inline">
                            <form action="course.php" method="POST" class="d-inline">
                                <button type="submit" name="delete_student" value="' . $course['course_id'] . '" class="btn btn-danger btn-sm">Withdraw</a>
                            </form>
                        </div>
                    </td>
                </tr>';
}

// Display table rows
echo $tableRows;

echo '</table>';
?>
