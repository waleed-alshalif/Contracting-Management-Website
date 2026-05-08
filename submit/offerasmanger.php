<?php

$conn = mysqli_connect('localhost' , 'root' , '', 'contracting');
if(!$conn){
  die(' / Not Connecting ' . mysqli_error());
}

else {
  echo ' / Connecting ';
}

if($_SERVER["REQUEST_METHOD"] == "POST")

{

    if(isset($_FILES["anyfile"]) && $_FILES["anyfile"]["error"] == 0)
        {
              $allow = array(
              "jpg" => "image/jpg" ,             
              "jpeg" => "image/jpeg" , 
              "png" => "image/png" , 
              "pdf" => "application/pdf");

                 $id_manager = rand(1 , 1000);

                  $fullname = $_POST['fullname'];
                  $majer = $_POST['majer'];
                  $pre_project = $_POST['previousproject'];
                  $email = $_POST['email'];
                  $numberphone = $_POST['numberphone'];
                  $location = $_POST['location'];
                  $filename=$_FILES["anyfile"]["name"];
                  $filetype=$_FILES["anyfile"]["type"];
                                                

      if(in_array($filetype , $allow))
      
      {

            if(file_exists("../images/manageriamge/" . $filename))
            {
                    echo " / The Name : " . $filename;
            }
             else {
                         if(move_uploaded_file($_FILES["anyfile"]["tmp_name"] , "../images/manageriamge/" . $filename))
                                    {
                                    $insert = "insert into  project_manager 
                                               (Manager_Name , ID_manager , Icon , Major , Previous_Jobs 
                                                , Manager_Location , Phone_Number , Email , Registertion_date) 

                                            values
                                              ('$fullname' , '$id_manager' , '$filename' , '$majer' , '$pre_project' , 
                                               '$location' , '$numberphone' , '$email' , NOW())";

                                      mysqli_query($conn , $insert);
                                    
                                    }
                                    else 
                                    {
                                              echo " / The File Not Succcessfully";
                                    }
                 }
      }
      else
       {
          echo " / Error : File not allow ";
      }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration </title>
    <link rel="stylesheet" href="../css/offer.css">
</head>
<body>
    <div class="Job">
        <h1 class="title">Registration As Project-Manger</h1>
        <div class="form">
          <form   method="post" enctype="multipart/form-data">
            <ul>
              <li>
                <div>
                  Full Name :<br />
                  <input
                    class="data"
                    type="text"
                    placeholder="Full Name"
                    required
                    autofocus
                    autocomplete="off"
                    name="fullname"
                  /><br />
                </div>
              </li>

              
              
              <li>
                <div>
                  Majer : <br />
                  <input
                    type="text"
                    placeholder="Specialization Name"
                    required
                    autocomplete="off"
                    name="majer"
                    class="data"
                  /><br />
                </div>
              </li>  
              <li>
                <div>
                  Previous Project : <br />
                  <input
                    type="number"
                    placeholder=" Previous Project :"
                    required
                    autocomplete="off"
                    name="previousproject"
                    class="data"
                  /><br />
                </div>
              </li>
              <li>
                <div>

                  Email: <br />
                  <input 
                    type="email"
                    placeholder="email"
                    required
                    autocomplete="off"
                    name="email"
                    class="data"
                  /><br />
                </div>
              </li>
            
  
            
  
            <li>
                <div>
                  Number phone: <br />
                  <input
                    type="tel"
                    placeholder="Number phone "
                    required
                    autofocus
                    autocomplete="off"
                    name="numberphone"
                    class="data"
                  /><br />
                </div>
              </li>
  
              <li>
                <div>
                 Location :  <br />
                  <input
                    type="text"
                    placeholder="location"
                    required
                    autocomplete="off"
                    name="location"
                    class="data"
                  /><br />
                </div>
              </li>
              <li>
                <div>
                  Your Image <br />
                  
                  <input
                  style="width: 90px; height: 20px"
                    class="data"
                   type="file"
                    autocomplete="off"
                    name="anyfile" 
                  /><br />
                </div>
              </li>
              
        </ul><br>

        <div class="but">
      <button type="reset">Reset</button>
      <button type="submit" name="send" >Registration</button>

      <br /><br />
    </div>
    </form>
  </div>
</div>