<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard</title>
    <link rel="stylesheet" href="css/style4.css">
    <link rel="stylesheet" href="css/button.js">
</head>

<body>

    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <ion-icon name="person"></ion-icon>
                        </span>
                        <span class="title">Admin </span>
                    </a>
                </li>

                
                <li>
                    <a href="dashboard.php">
                        <span class="icon" >
                            <ion-icon name="home-outline">   </ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="jobs2.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Jobs</span>
                    </a>
                </li>

                <li>
                    <a href="projects2.php">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Projects</span>
                    </a>
                </li>
                
                <li>
                    <a href="contractors2.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Contractors</span>
                    </a>
                </li>

            

                <li>
                <a href="submit/Admin.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">To Add Admin</span>
                    </a>
                </li>

                <li>
                <a href="index.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">Back To Home</span>
                    </a>
                </li>
                
            </ul>
        </div>

        <div class="main">

            <div class="topbar">

                <div class="toggle">
                    <ion-icon name="menu-outline"> ||| </ion-icon>
                </div>
                
    

                <div class="search">
                    <h2>Contractors</h2>
                </div>

                <div class="user">
                    <h2> </h2>
                </div>
            </div>

        
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers">

</div>
                        <div class="cardName">Daily Views</div>
                      
                        <?php
 $con = mysqli_connect('localhost', 'root', '', 'contracting') or die('Can\'t connect to mysql server');
 
if (!$con) {
    die('Could not connect to MySQL server: ' . mysqli_error());
}

$query = "SELECT SUM(views) AS total_views FROM daily_views";
$result = mysqli_query($con, $query);

if (!$result) {
    die('Error executing query: ' . mysqli_error($con));
}

$row = mysqli_fetch_assoc($result);
$total_views = ($row['total_views'] !== null) ? $row['total_views'] : 0;

mysqli_close($con);

echo "Total views: " . $total_views;
?>
 
 



                    </div>

                    <div class="iconBx">
                        <ion-icon name="eye-outline"></ion-icon>
                    </div>
                </div>



                
                <div class="card">
                    <div>
                        <div class="cardName"> Projects</div>
                        <div class="cardName">
                            <?php
                            $conn = mysqli_connect('localhost', 'root', '', 'contracting');
                            $select = "SELECT COUNT(Project_Name) as projects FROM projects";
                            $query = mysqli_query($conn, $select);
                            if ($query && mysqli_num_rows($query) > 0) {
                                $row = mysqli_fetch_assoc($query);
                                echo $row['projects'];
                            } else {
                                echo "No projects found";
                            }
                            ?>
                        </div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="hammer-outline"></ion-icon>
                    </div>
                </div>

                <div class="card">
                    <div>
                        <div class="cardName"> Contractors</div>
                        <div class="cardName">
                            <?php
                            $select = "SELECT COUNT(ID_company) as count FROM contractors";
                            $query = mysqli_query($conn, $select);
                            if ($query && mysqli_num_rows($query) > 0) {
                                $row = mysqli_fetch_assoc($query);
                                echo $row['count'];
                            } else {
                                echo "No comments found";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>


                <div class="card">
                    <div>
                        <div class="cardName"> Jobs</div>
                        <div class="cardName">
                            <?php
                            $select = "SELECT COUNT(Job_Name) as Job_Name FROM job";
                            $query = mysqli_query($conn, $select);
                            if ($query && mysqli_num_rows($query) > 0) {
                                $row = mysqli_fetch_assoc($query);
                                echo $row['Job_Name'];
                            } else {
                                echo "No jobs found";
                            }
                            ?>
                        </div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="people-outline"></ion-icon>
                    </div>
                </div>


                 <div class="card">
                    <div>
                        <div class="cardName"> Comments</div>
                        <div class="cardName">
                            <?php
                            $select = "SELECT COUNT(Message) as count FROM comment";
                            $query = mysqli_query($conn, $select);
                            if ($query && mysqli_num_rows($query) > 0) {
                                $row = mysqli_fetch_assoc($query);
                                echo $row['count'];
                            } else {
                                echo "No comments found";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

            </div>

            

          
            <div class="details">
                <div class="projects">
                    <div class="cardHeader">
                        <h2>Projects:</h2>
                    </div>

                    <?php
                    $select = "SELECT * FROM projects";
                    $query = mysqli_query($conn, $select);
                    if ($query && mysqli_num_rows($query) > 0) {
                        while ($row = mysqli_fetch_assoc($query)) {
                            echo '<div class="main_project">
                                    <ul class="parent_project">
                                        <li class="child_project">
                                            <div class="main_cont">
                                                <div class="contact1">
                                                    <h4>' . $row['Project_Name'] . '</h4>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>';
                        }
                    }
                    ?>
                </div>

       

                <div class="Contractors">
                    <div class="cardHeader">
                        <h2>Contractors</h2>
                    </div>
                    <?php
                    $select = "SELECT * FROM contractors";
                    $query = mysqli_query($conn, $select);
                    if ($query && mysqli_num_rows($query) > 0) {
                        while ($row = mysqli_fetch_assoc($query)) {
                            echo '<div class="main_contractors">
                                    <ul class="parent_contractors">
                                        <li class="child_contractors">
                                            <div class="main_cont">
                                                <div class="contact1">
                                                    <h4>' . $row['Company_name'] . '</h4>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>';
                        }
                    }
                    ?>
                </div>


             
                <div class="Companies">
                    <div class="cardHeader">
                        <h2>Jobs</h2>
                    </div>

                    <?php
                    $select = "SELECT * FROM job";
                    $query = mysqli_query($conn, $select);
                    if ($query && mysqli_num_rows($query) > 0) {
                        while ($row = mysqli_fetch_assoc($query)) {
                            echo
                            '<div class="main_contractors">
                            <ul class="parent_contractors">
                                <li class="child_contractors">
                                    <div class="main_cont">
                                        <div class="contact1">
                                            <h4>' . $row['Job_Name'] . '</h4>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
 
    <script src="assets/js/main.js"></script>


</body>

</html>