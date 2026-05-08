<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
  
    <link rel="stylesheet" href="css/style4.css">
    <style>
    #job {
      border-collapse: collapse;
      width: 100%;
    }
    
    #job td, #job th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    
    #job tr:nth-child(even) {background-color :#000000;}
    #job tr:hover{background-color: #000000;}
    #job th {
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
                    <h2>Details Jobs</h2>
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

    
    if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['Company_Name'])) {
        $Company_Name = $_GET['Company_Name'];
        $query = "DELETE FROM job WHERE Company_Name = '$Company_Name'";
        mysqli_query($con, $query) or die('There is an error in the query');
    }

    
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
      echo '<tr><th>Company_Name</th>
      <th>Job_Name</th><th>Job_End</th>
      <th>Location</th>
      <th>Email</th>
      <th>Registertion_date</th>
     </tr>';

      while($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>'.$row['Company_Name'].'</td>';
        echo '<td>'.$row['Job_Name'].'</td>';
        echo '<td>'.$row['Job_End'].'</td>';
        echo '<td>'.$row['Location'].'</td>';
        echo '<td>'.$row['Email'].'</td>';
        echo '<td>'.$row['Registertion_date'].'</td>';
       
        echo '<td><a href="?action=delete&Company_Name='.$row['Company_Name'].'" id="del">Delete </a> ------------ 
                  <a href="update_job.php?Company_Name='.$row['Company_Name'].'" id="up">Update</a></td>';
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