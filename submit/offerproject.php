<?php 

$conn = mysqli_connect('localhost' , 'root' , '', 'contracting');
if(!$conn){
  die(' / Not Connecting ' . mysqli_error());
}

else {
  echo ' / Connecting';
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

      if(isset($_FILES["anyfile"]) && $_FILES["anyfile"]["error"] == 0  && 
        isset($_FILES["anyimage"]) && $_FILES["anyimage"]["error"] == 0)
      {
        $allow = array(
          "jpg" => "image/jpg" , 
          "jpeg" => "image/jpeg" , 
          "png" => "image/png", 
          "pdf" => "application/pdf");

        $companyname = $_POST['companyname'];
        $location = $_POST['location'];
        $dateend = $_POST['dateend'];
        $projectname = $_POST['projectname'];

        $filename=$_FILES["anyfile"]["name"];
        $filetype=$_FILES["anyfile"]["type"];
        $imagename=$_FILES["anyimage"]["name"];
        $imagetype=$_FILES["anyimage"]["type"];


                if(in_array($filetype , $allow) && in_array($imagetype , $allow)){

                if(file_exists("../Files/File_Project/" .  $filename) && file_exists("../images/project_image/" . $imagename)){
                  echo " / The Name : " . $filename . "the image : " . $imagename;
                }
                
                    else {
                    if(move_uploaded_file($_FILES["anyimage"]["tmp_name"] , "../images/project_image/" . $imagename)
                    && move_uploaded_file($_FILES["anyfile"]["tmp_name"] , "../Files/File_Project/" . $filename)){
                      $insert = "insert into  projects 
          (Company_Name , icon , Project_Name ,	Location ,Date_End, File_Project , date_upload) 
          values ('$companyname','$imagename', '$projectname' , '$location','$dateend','$filename', NOW())";

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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration </title>
    <link rel="stylesheet" href="../css/offer.css">
</head>
<body> 
    <div class="Job">
        <h1 class="title"> Project </h1>
        <div class="form">
          <form method="post" enctype="multipart/form-data">
            <ul>
              <li>
                <div>
                  Company Name :<br />
                  <input
                    class="data"
                    type="text"
                    placeholder="company Name"
                    required
                    autofocus
                    autocomplete="off"
                    name="companyname"
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

              <br> <br>
              <li>
                <div>
                 Date End<br />
                  <input
                    class="data"
                    type="date"
                    autocomplete="off"
                    name="dateend"
                  /><br />
                </div>
            </li> <br>

            <li>
            <div>
              Icon_company<br />
              <input
              style="width: 90px; height: 20px"
                class="data"
               type="file"
                autocomplete="off"
                name="anyimage"
              /><br />
            </div>
          </li>

          <li>
          <div>
            File Project<br />
            <input
            style="width: 90px; height: 20px"
              class="data"
             type="file"
              autocomplete="off"
              name="anyfile"
            /><br />
          </div>
        </li>

            <li>
              <div>
                Project Name<br />
               <textarea 
               name="projectname" 
               id="" 
               cols="30" 
               rows="8" 
               placeholder="project name .......(max char 100)"
               style="padding:12px"></textarea>
              </div>
          </li>
        </ul><br>
        <div class="but">
      <button type="reset">Reset</button>
      <button type="submit" name="offer">Add_Project</button>
      <br /><br />
    </div>
    </form>
  </div>
</div>
</body>
</html>