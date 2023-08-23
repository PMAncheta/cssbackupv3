<?php


// Include the database connection and pagination logic from your existing PHP file
@include 'dbcon.php';


// Get the search input from the query parameters
$input = isset($_GET['input']) ? $_GET['input'] : '';


// Initialize the query without pagination
$query = "SELECT * FROM courses";


// Initialize the count query for total entries
$countQuery = "SELECT COUNT(*) as total FROM courses";


// ...
if (!empty($input)) {
  // Modify the query and count query to include the search condition for ccode
  $query .= " WHERE UPPER(ccode) LIKE '%$input%'";
  $countQuery .= " WHERE UPPER(ccode) LIKE '%$input%'";
}
// ...


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


// Perform the modified query
$query_run = mysqli_query($conn, $query);



?>
