<?php

$conn = mysqli_connect('localhost' , 'root' , '', 'contracting');
if(!$conn){
  die(' / Not Connecting ' . mysqli_error());
}

else {
  // echo ' / Connecting ';
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

  if(isset($_FILES["anyfile"]) && $_FILES["anyfile"]["error"] == 0)
  {
    $allow = array(
      "jpg" => "image/jpg" , 
      "jpeg" => "image/jpeg" , 
      "png" => "image/png" , 
      "pdf" => "application/pdf");


    $fristname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $numberphone = $_POST['phone'];
    $email = $_POST['email'];
    $specialization_name = $_POST['SpecializationName'];
    $specialization_level = $_POST['level'];
    $job = $_POST['Job'];
    $filename=$_FILES["anyfile"]["name"];
    $filetype=$_FILES["anyfile"]["type"];
      if(in_array($filetype , $allow)){
        if(file_exists("../Files/File_CV/" . $filename)){
          echo " / The Name : " . $filename;
        }
        else {
          if(move_uploaded_file($_FILES["anyfile"]["tmp_name"] , "../Files/File_CV/" . $filename)){
            $insert = "insert into  offering_job 
                  (First_Name , Last_Name , Phone_Number , Email , CV_Files 
                  , Specialization_Name , Specialization_Level , Job_Title , Registertion_date) 


                  values ('$fristname' , '$lastname' , '$numberphone','$email','$filename', 
                          '$specialization_name','$specialization_level',' $job' , NOW())";

            mysqli_query($conn , $insert);
          
          }else {
            echo " / The File Not Succcessfully";
          }
        }
      } 
      else {
        echo " / Error : File not allow ";
      }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Insert Your data</title>
    <link rel="stylesheet" href="../css/offer.css" />
  </head>
  <body>
    <div class="Job">
      <h1 class="title">Offering Job</h1>
      <div class="form">
        <form  method="post" enctype="multipart/form-data">
          <ul>
            <li>
              <div>
                First Name: <br />
                <input
                  class="data"
                  type="text"
                  placeholder="First Name"
                  required
                  autofocus
                  autocomplete="off"
                  name="fname"
                /><br />
              </div>
            </li>

            <li>
              <div>
                Last Name: <br />
                <input
                  type="text"
                  placeholder="Last Name"
                  required
                  autofocus
                  autocomplete="off"
                  class="data"
                  name="lname"
                /><br />
              </div>
            </li>

            <li>
              <div>
                Number phone: <br />
                <input
                  type="tel"
                  placeholder="Number_Phone "
                  required
                  autofocus
                  autocomplete="off"
                  name="phone"
                  class="data"
                /><br />
              </div>
            </li>
            <li>
              <div>
                Email: <br />
                <input
                  type="email"
                  placeholder="Email"
                  required
                  autocomplete="off"
                  name="email"
                  class="data"
                /><br />
              </div>
            </li>
          

          <li>
            <div>
              Specialization Name <br />
              <input
                type="text"
                placeholder="Specialization Name"
                required
                autocomplete="off"
                name="SpecializationName"
                class="data"
              /><br />
            </div>
          </li>

         <li>
          <div>
            Specialization Level <br />
            <select name="level"  id="options">
              <option value="Diploma" >Diploma</option>
              <option value="Bachelor">Bachelor</option>
              <option value="Master">Master</option>
              <option value="Doctora">Doctora</option>
            </select>
          </div>

         </li>


            <li>
              <div>
                Job: <br />
                <input
                  type="text"
                  placeholder=" name jobs"
                  autocomplete="off"
                  name="Job"
                  class="data"
                /><br />
            </div>
            </li>

        <li>
          <div class=".file">
            <h4>CV FILE:</h4>
            <input type="file" name="anyfile"/>
          </div>
        </li>
        </ul><br>
            <div class="but">
          <button type="reset">Reset</button>
          <button type="submit" name="offer">Offering</button>
          <br /><br />
        </div>
        </form>
      </div>
    </div>
  </body>
</html>