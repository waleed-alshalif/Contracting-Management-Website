<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
  
    <link rel="stylesheet" href="css/style4.css">
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
                <a href=#> 
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
          

              

                

                
            </ul>
        </div>
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>

                <div class="search">
                    <h2>Contractors</h2>
                </div>

                <div class="user">
                    
                </div>
            </div>
      
    <script src="assets/js/main.js"></script>


<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<div class="search">
<?php
$con = mysqli_connect('localhost', 'root', '', 'contracting') or die('Can\'t connect to mysql server');
if(isset($_POST['action']) && $_POST['action'] == 'update') {
    $Company_Name = $_POST['Company_Name'];
    $icon = $_POST['icon'];
    $Project_Name= $_POST['Project_Name'];
    $Location = $_POST['Location'];
    $Date_End= $_POST['Date_End'];
    $File_Project= $_POST['File_Project'];
    $date_upload= $_POST['date_upload'];
    

    $query = "UPDATE projects SET icon=' $icon',  Project_Name =' $Project_Name ', Location='$Location', Date_End='$Date_End',
     File_Project='$File_Project',date_upload='$date_upload' WHERE Company_Name='$Company_Name'";
    mysqli_query($con, $query) or die('There is an error in the query');
    $result = mysqli_query($con, $query);

    if ($result) {
        echo " information updated successfully.";
    } else {
        echo "Error updating information: " . mysqli_error($con);
    }

}


$query = 'SELECT * FROM projects';
$result = mysqli_query($con, $query) or die('There is an error in the query');

if (mysqli_num_rows($result) > 0) {
  

  while($row = mysqli_fetch_assoc($result)) {
    
    echo '<td>
    <form method="post" action="'.$_SERVER['PHP_SELF'].'">
      <input type="hidden" name="action" value="update">
      <input type="hidden" name="Company_Name" value="'.$row['Company_Name'].'">
      <input type="text" name="icon" value="'.$row['icon'].'" placeholder="icon">
      <input type="text" name="Project_Name" value="'.$row['Project_Name'].'" placeholder="Project_Name">
      <input type="text" name="Location" value="'.$row['Location'].'" placeholder="Location">
      <input type="text" name="Date_End" value="'.$row['Date_End'].'" placeholder="Date_End">
      <input type="text" name="File_Project" value="'.$row['File_Project'].'" placeholder="File_Project">
      <input type="text" name="date_upload" value="'.$row['date_upload'].'" placeholder="date_upload">
      <input type="submit" value="Update" class="update-btn">
    </form>
    </td>';
echo '</tr>';
}
echo '</table>';
} else {
echo 'There is no information to display!!!';
}

mysqli_free_result($result);
mysqli_close($con);

?>
<button class="back-btn" onclick="window.location.href='projects2.php'">pervious</button>
</div>
</body>
</html>

</body>

</html>