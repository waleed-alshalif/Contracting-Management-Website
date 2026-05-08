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
    $Job_Name = $_POST['Job_Name'];
    $Job_End = $_POST['Job_End'];
    $Location = $_POST['Location'];
    $Email = $_POST['Email'];
    $Registertion_date= $_POST['Registertion_date'];
    

    $query = "UPDATE job SET  Job_Name=' $Job_Name',  Job_End =' $Job_End ', Location='$Location', Email='$Email',
     Registertion_date='$Registertion_date' WHERE Company_Name='$Company_Name'";
    mysqli_query($con, $query) or die('There is an error in the query');
    $result = mysqli_query($con, $query);

    if ($result) {
        echo " information updated successfully.";
    } else {
        echo "Error updating information: " . mysqli_error($con);
    }

}


$query = 'SELECT * FROM job';
$result = mysqli_query($con, $query) or die('There is an error in the query');

if (mysqli_num_rows($result) > 0) {
  echo '<table id="job">';
  

  while($row = mysqli_fetch_assoc($result)) {
    
    echo '<td>
    <form method="post" action="'.$_SERVER['PHP_SELF'].'">
      <input type="hidden" name="action" value="update">
      <input type="hidden" name="Company_Name" value="'.$row['Company_Name'].'">
      <input type="text" name="Job_Name" value="'.$row['Job_Name'].'" placeholder="Job_Name">

      <input type="text" name="Job_End" value="'.$row['Job_End'].'" placeholder="Job_End">
      <input type="text" name="Location" value="'.$row['Location'].'" placeholder="Location">
      <input type="text" name="Email" value="'.$row['Email'].'" placeholder="Email">
      <input type="text" name="Registertion_date" value="'.$row['Registertion_date'].'" placeholder="Registertion_date">
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
<button class="back-btn" onclick="window.location.href='jobs2.php'">pervious</button>
</div>

</body>
</html>

</body>

</html>