<?php
session_start();

include 'dbcon.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/style5.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Cadet</title>
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
                        <li><a href="/cssbackupv2/logout.php">
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
                        <?php include('cadetconfig.php'); ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>
                                            <i class="uil uil-briefcase-alt deplogo"></i>
                                            <span class="text">Cadet</span>
                                            <a href="cadet-create.php" class="btn btn-primary float-end">Add Cadet</a>
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="td">Serv ID</th>
                                                <th class="td">Maj ID</th>
                                                <th class="td">Last Name</th>
                                                <th class="td">First Name</th>
                                                <th class="td">Gender</th>
                                                <th class="td"></th>
                                            </tr>
                                        </thead>
                                         <tbody id="tableBody">
                                            <?php 
                                                $query = "SELECT * FROM cadet LIMIT $entriesPerPage OFFSET $offset";
                                                $query_run = mysqli_query($conn, $query);

                                                $rowNum = ($currentPage - 1) * $entriesPerPage + 1;
                                                while ($cadet = mysqli_fetch_assoc($query_run)) {
                                                    $servid = $cadet['servid'];
                                                    $majid = $cadet['majid'];
                                                    $lname = $cadet['lname'];
                                                    $fname = $cadet['fname'];
                                                    $gender = $cadet['gender'];
                                                
                                                    // Convert the PHP variables to JSON format and encode them
                                                    $cadetJson = json_encode([$servid, $majid, $lname, $fname, $gender]);
                                                    ?>
                                                    <tr class="myList">
                                                        <td class="clickable-td" data-cadet-id="<?= $cadet['cadet_id']; ?>">
                                                            <?= strtoupper($cadet['servid']); ?>
                                                        </td>
                                                        <td class="clickable-td" data-cadet-id="<?= $cadet['cadet_id']; ?>">
                                                            <?= strtoupper($cadet['majid']); ?>
                                                        </td>
                                                        <td class="clickable-td" data-cadet-id="<?= $cadet['cadet_id']; ?>">
                                                            <?= strtoupper($cadet['lname']); ?>
                                                        </td>
                                                        <td class="clickable-td" data-cadet-id="<?= $cadet['cadet_id']; ?>">
                                                            <?= strtoupper($cadet['fname']); ?>
                                                        </td>
                                                        <td class="clickable-td" data-cadet-id="<?= $cadet['cadet_id']; ?>">
                                                            <?= strtoupper($cadet['gender']); ?>
                                                        </td>

                                                        <td>
                                                            <div class="inline">
                                                                <?php if ($cadet['active'] == 1): ?>
                                                                    <span class="btn btn-info btn-sm">Activate</span>
                                                                <?php else: ?>
                                                                    <form action="cadet.php" method="POST" class="d-inline">
                                                                        <input type="hidden" name="cadet_id" value="<?= $cadet['cadet_id']; ?>">
                                                                        <button type="submit" name="activate_cadet" class="btn btn-info btn-sm">Activate</button>
                                                                    </form>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="inline">
                                                                <?php if ($cadet['not_active'] == 1): ?>
                                                                    <span class="btn btn-danger btn-sm">Not Active</span>
                                                                <?php else: ?>
                                                                    <form action="cadet.php" method="POST" class="d-inline">
                                                                        <input type="hidden" name="cadet_id" value="<?= $cadet['cadet_id']; ?>">
                                                                        <button type="submit" name="deactivate_cadet" class="btn btn-danger btn-sm">Deactivate</button>
                                                                    </form>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $rowNum++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Pagination -->
                    <div class="pagination">
                                        <ul class="pagination-list">
                                        <?php
                                        if ($totalPages > 1) {
                                        if ($currentPage > 1) {
                                        echo '<li><a href="cadet.php?page=' . ($currentPage - 1) . '">&laquo;</a></li>';
                                        }
                                        for ($i = 1; $i <= $totalPages; $i++) {
                                        if ($i == $currentPage) {
                                        echo '<li class="active"><span>' . $i . '</span></li>';
                                        } else {
                                         echo '<li><a href="cadet.php?page=' . $i . '">' . $i . '</a></li>';
                                        }
                                        }
                                         if ($currentPage < $totalPages) {
                                        echo '<li><a href="cadet.php?page=' . ($currentPage + 1) . '">&raquo;</a></li>';
                                 }
                              }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>


    <!--  clickable table that go through into view.php (PS. HINDI GAGANA PAG SA IBANG FILE) -->
    <script>
    // Get all the elements with the class "clickable-td"
    const clickableTDs = document.querySelectorAll(".clickable-td");

    // Add a click event listener to each clickable TD
    clickableTDs.forEach((td) => {
        td.addEventListener("click", () => {
        // Get the URL or action you want to perform when the TD is clicked
        // For example, you can navigate to the cadet-view.php page with the cadet_id as a query parameter
        const cadetId = td.dataset.cadetId;
        window.location.href = `cadet-edit.php?cadet_id=${cadetId}`;
        });
    });
    </script>

</body>
</html>