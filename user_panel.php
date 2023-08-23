<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="css/style1.css">
    
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>CIS Admin Dashboard</title>
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
                    <a href="user_panel.php" class="link-text">
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
                <input type="text" placeholder="Search here...">
            </div>
            
            <!--<img src="images/profile.jpg" alt="">-->
            <div class="norms">

                
                    <div class="logo">
                        <img src="https://img.apmcdn.org/e94a0af462182655de88ce3e235d00201a147bd7/square/5d842c-20180421-vernetroyer.jpg" alt="Logo">
                    </div>
                    
                    <div class="dropdown">
                        <ul>
                            <li>
                                <a href="update-prof.php">
                                    <i class="uil uil-profile">Edit Profile</i></a>
                            </li>
                            <li>
                                <a href="logout.php">
                                    <i class="uil uil-signout">Logout</i></a>
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
               
                    <!--
                <div class="loki" onclick="menuToggle();">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSVWQTWRsXnQBqP30w3bP2Il7Y9nnybYopPVg&usqp=CAU" width="50" height="50">
                </div>
                    <div class="logout">
                     Name of the profile
                        <h3>Famous<br><span>Tinapay Enjoyer</span></h3>
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
                -->  

            </div>


           

        </div>

        <div class="dash-content">
            <div class="overview">
                <div class="title">
                    <i class="uil uil-tachometer-fast-alt"></i>
                    <span class="text">Dashboard</span>
                </div>

            <div class="activity">
                <div class="title">
                    <i class="uil uil-clock-three"></i>
                    <span class="text">Recent Activity</span>
                </div>

                
            </div>
        </div>
    </section>
    
    <script src="script.js"></script>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
      var logo = document.querySelector(".logo img");
      var dropdown = document.querySelector(".dropdown");

      logo.addEventListener("click", function(e) {
        e.stopPropagation();
        dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";
      });

      document.addEventListener("click", function(e) {
        if (!logo.contains(e.target) && !dropdown.contains(e.target)) {
          dropdown.style.display = "none";
        }
      });
    });
  </script>
</body>
</html>