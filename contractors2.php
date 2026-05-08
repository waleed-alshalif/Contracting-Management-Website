<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
   
    <link rel="stylesheet" href="css/style4.css">
    <style>
    #contractors {
      border-collapse: collapse;
      width: 100%;
    }
    
    #contractors td, #contractors th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    
    #contractors tr:nth-child(even) {background-color :#000000;}
    #contractors tr:hover{background-color: #000000;}
    #contractors th {
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
                <a href="projects2.php"> 
                    <span class="icon">
                        <ion-icon name="chatbubble-outline"></ion-icon>
                    </span>
                    <span class="title">Projects</span>
                </a>
            </li>
            <li>
                <a href=#> 
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
                    <h2>Details Contractors</h2>
                </div>

                <div class="user">
                    
                </div>
            </div>
       
    <script src="assets/js/main.js"></script>


<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<div class="search">
<div class="tables">
    <div class="tables td">
    <div class="tables th">
    <div class="tables tr">
<?php
    $con = mysqli_connect('localhost', 'root', '', 'contracting') or die('Can\'t connect to mysql server');

   
    if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['Icon'])) {
        $Icon = $_GET['Icon'];
        $query = "DELETE FROM contractors WHERE Icon = '$Icon'";
        mysqli_query($con, $query) or die('There is an error in the query');
    }

    
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
      echo '
      <th>Company_name</th>
      <th>Location</th>
      <th>Phone_Number</th>
      <th>ID_company</th>
      <th>Classification</th>
      <th>Email</th>
      <th>Registertion_date</th>
     </tr>';

      while($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>'.$row['Company_name'].'</td>';
        echo '<td>'.$row['Location'].'</td>';
        echo '<td>'.$row['Phone_Number'].'</td>';
        echo '<td>'.$row['ID_company'].'</td>';
        echo '<td>'.$row['Classification'].'</td>';
        echo '<td>'.$row['Email'].'</td>';
        echo '<td>'.$row['Registertion_date'].'</td>';
       
        echo '<td><a href="?action=delete&Icon='.$row['Icon'].'" id="del">Delete</a> ------------ 
                  <a href="update_contractors.php?Icon='.$row['Icon'].'" id="up">Update</a></td>';
        echo '</tr>';
      }
      echo '</table>';
    } else {
      echo 'There is no information to display';
    }

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