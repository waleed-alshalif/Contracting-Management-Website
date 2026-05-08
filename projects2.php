<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
   
    <link rel="stylesheet" href="css/style4.css">
    <style>
    #projects{
      border-collapse: collapse;
      width: 100%;
    }
    
    #projects td, #projects th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    
    #projects tr:nth-child(even) {background-color :#000000;}
    #projects tr:hover{background-color: #000000;}
    #projects th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color:#000000;
      color:#eda201;
    }
  </style>
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
                        <span class="title">Admin</span>
                    </a>
                </li>

                <li>
                <a href="dashboard.php">
                
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
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
                <a href=#> 
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


              

                

                
            </ul>
        </div>
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <h2>Details Project</h2>
                </div>

                <div class="user">
                    
                </div>
            </div>
        
    <script src="assets/js/main.js"></script>


<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>
<div class="search">
<div class="tables">
    <div class="tables td">
    <div class="tables th">
    <div class="tables tr">
    <?php
// Database connection
$con = mysqli_connect('localhost', 'root', '', 'contracting');
if (!$con) {
    die('Can\'t connect to MySQL server: ' . mysqli_connect_error());
}

// Handle delete action
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['Company_Name'])) {
    $Company_Name = mysqli_real_escape_string($con, $_GET['Company_Name']);
    $query = "DELETE FROM projects WHERE Company_Name = '$Company_Name'";
    if (!mysqli_query($con, $query)) {
        die('Error in delete query: ' . mysqli_error($con));
    }
}

// Handle update action
if (isset($_POST['action']) && $_POST['action'] === 'update') {
    $Company_Name = mysqli_real_escape_string($con, $_POST['Company_Name']);
    $Project_Name = mysqli_real_escape_string($con, $_POST['Project_Name']);
    $Location = mysqli_real_escape_string($con, $_POST['Location']);
    $Date_End = mysqli_real_escape_string($con, $_POST['Date_End']);
    $File_Project = mysqli_real_escape_string($con, $_POST['File_Project']);
    $date_upload = mysqli_real_escape_string($con, $_POST['date_upload']);

    $query = "UPDATE projects SET 
                Project_Name='$Project_Name', 
                Location='$Location', 
                Date_End='$Date_End', 
                File_Project='$File_Project', 
                date_upload='$date_upload' 
              WHERE Company_Name='$Company_Name'";
              
    if (mysqli_query($con, $query)) {
        echo "Information updated successfully.";
    } else {
        echo "Error updating information: " . mysqli_error($con);
    }
}

// Fetch all records from the projects table
$query = 'SELECT * FROM projects';
$result = mysqli_query($con, $query);
if (!$result) {
    die('Error in select query: ' . mysqli_error($con));
}

if (mysqli_num_rows($result) > 0) {
    echo '<table id="projects">
            <tr>
                <th>Company_Name</th>
                <th>icon</th>
                <th>Project_Name</th>
                <th>Location</th>
                <th>Date_End</th>
                <th>File_Project</th>
                <th>date_upload</th>
                <th>Actions</th>
            </tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
                <td>' . htmlspecialchars($row['Company_Name']) . '</td>
                <td>' . htmlspecialchars($row['icon']) . '</td>
                <td>' . htmlspecialchars($row['Project_Name']) . '</td>
                <td>' . htmlspecialchars($row['Location']) . '</td>
                <td>' . htmlspecialchars($row['Date_End']) . '</td>
                <td>' . htmlspecialchars($row['File_Project']) . '</td>
                <td>' . htmlspecialchars($row['date_upload']) . '</td>
                <td>
                    <a href="?action=delete&Company_Name=' . urlencode($row['Company_Name']) . '" id="del">Delete</a> | 
                    <a href="update_project.php?Company_Name=' . urlencode($row['Company_Name']) . '" id="up">Update</a>
                </td>
            </tr>';
    }
    echo '</table>';
} else {
    echo 'There is no information to display';
}

// Free the result set and close the connection
mysqli_free_result($result);
mysqli_close($con);
?>

  </div>
  </div>
  </div>
  </div>
  </div>
  
  </body>

</html>