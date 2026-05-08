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
        $Icon = $_POST['Icon'];
        $Company_name = $_POST['Company_name'];
        $Location = $_POST['Location'];
        $Phone_Number = $_POST['Phone_Number'];
        $ID_company = $_POST['ID_company'];
        $Classification = $_POST['Classification'];
        $Email = $_POST['Email'];
        $File = $_POST['File'];
        $Registertion_date= $_POST['Registertion_date'];
    
$query = "UPDATE contractors SET Company_name='$Company_name' , Location='$Location', Phone_Number=' $Phone_Number', 
         ID_company =' $ID_company ', Classification=' $Classification', Email='$Email',File='$File',
         Registertion_date='$Registertion_date'
          WHERE Icon='$Icon'";
        mysqli_query($con, $query) or die('There is an error in the query');
        $result = mysqli_query($con, $query);

        if ($result) {
            echo " information updated successfully.";
        } else {
            echo "Error updating information: " . mysqli_error($con);
        }
    
    }


$query = 'SELECT * FROM contractors';
$result = mysqli_query($con, $query) or die('There is an error in the query');

if (mysqli_num_rows($result) > 0) {
  echo '<table id="contractors">';
  

  while($row = mysqli_fetch_assoc($result)) {
    
    echo '<td>
    <form method="post" action="'.$_SERVER['PHP_SELF'].'">
      <input type="hidden" name="action" value="update">
      <input type="hidden" name="Icon" value="'.$row['Icon'].'">
      <input type="text" name="Company_name" value="'.$row['Company_name'].'" placeholder="Company_name">
      <input type="text" name="Location" value="'.$row['Location'].'" placeholder="Location">
      <input type="text" name="Phone_Number	" value="'.$row['Phone_Number'].'" placeholder="Phone_Number">
      <input type="text" name="ID_company" value="'.$row['ID_company'].'" placeholder="ID_company">
      <input type="text" name="Classification" value="'.$row['Classification'].'" placeholder="Classification">
      <input type="text" name="Email" value="'.$row['Email'].'" placeholder="Email">
      <input type="text" name="File" value="'.$row['File'].'" placeholder="File">
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