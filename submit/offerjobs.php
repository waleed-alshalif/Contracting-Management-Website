<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration </title>
    <link rel="stylesheet" href="../css/offer.css">
</head>
<body>

<?php

if(!isset($_POST['send'])){
  
 ?>

    <div class="Job">
        <h1 class="title">Add Job</h1>
        <div class="form">
          <form method="post" enctype="multipart/form-data">
            <ul>

              <li>
                <div>
                  Company Name :
                  <input
                    class="data"
                    type="text"
                    placeholder="Company Name"
                    required
                    autofocus
                    autocomplete="off"
                    name="companyname"
                  />
                </div>
              </li>

              <li>
                <div>
                  Job Name :  
                  <input
                    type="text"
                    placeholder="jobname"
                    required
                    autocomplete="off"
                    name="jobname"
                    class="data"
                  />
                </div>
              </li>  
             
              <li>
                <div>
                  Email: 
                  <input
                    type="email"
                    placeholder="Email"
                    required
                    autocomplete="off"
                    name="email"
                    class="data"
                  />
                </div>
              </li>
            
            <li>
                <div>
                  Job End 
                  <input
                    type="date"
                    placeholder="jobend "
                    required
                    autofocus
                    autocomplete="off"
                    name="endjob"
                    class="data"
                  />
                </div>
              </li>
  
              <li>
                <div>
                 Location :  
                  <input
                    type="text"
                    placeholder="location"
                    required
                    autocomplete="off"
                    name="location"
                    class="data"
                  />
                </div>
              </li>
        </ul>

        <div class="but">
      <button type="reset">Reset</button>
      <button type="submit" name="send">Add_Jobs</button>
    </div>
    </form>
  </div>
</div>

<?php
}
else {
        

  $companyname = $_POST['companyname'];
  $jobname = $_POST['jobname'];
  $email = $_POST['email'];
  $endjob = $_POST['endjob'];
  $location = $_POST['location'];
  
  // connect to database 
  
  $conn = mysqli_connect('localhost' , 'root' , '' , 'contracting');
  $insert = "insert into  job 
               (Company_Name , Job_Name , Job_End , Location , Email,  Registertion_date) 
        values ('$companyname' , '$jobname' , '$endjob' , '$location' ,'$email' ,  NOW())";
  
  $query = mysqli_query($conn , $insert);
  
  
    if($query){
      header('Location: ../jobs.php');
    }
    else {
      echo "Sorry No Registeration";
    }
  
  
   }

?>
</body>
</html>