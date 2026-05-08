
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

    $id_compnay = rand(1 , 1000);

    $companyname = $_POST['company_name'];
    $email = $_POST['email'];
    $location = $_POST['location'];
    $numberphone = $_POST['phone'];
    $classification = $_POST['classification'];

    $filename=$_FILES["anyfile"]["name"];
    $filetype=$_FILES["anyfile"]["type"];
    $imagename=$_FILES["anyimage"]["name"];
    $imagetype=$_FILES["anyimage"]["type"];

      if(in_array($filetype , $allow) && in_array($imagetype , $allow)){

        if(file_exists("../Files/File_Company/" .  $filename) && file_exists("../images/company_iamge/" . $imagename)){
          echo " / The Name : " . $filename . "the image : " . $imagename;
        }

        else {
          if(move_uploaded_file($_FILES["anyimage"]["tmp_name"] , "../images/company_iamge/" . $imagename)
          && move_uploaded_file($_FILES["anyfile"]["tmp_name"] , "../Files/File_Company/" . $filename)){
            $insert = "insert into  contractors 
(Icon , Company_name , Location , Phone_Number   ,ID_company, Classification , Email ,File, Registertion_date) 
values (
'$imagename' , '$companyname' , '$location' , '$numberphone', '$id_compnay' 
, '$classification' , '$email' , '$filename', NOW())";

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
    <title>Registration</title>
    <link rel="stylesheet" href="../css/offer.css" />
  </head>
  <body>
    <div class="Job">
      <h1 class="title">Registration As Company / Contractor </h1>
      <div class="form">
        <form  method="post" enctype="multipart/form-data">
          <ul>
            <li>
              <div>
                Company Name :<br />
                <input
                  class="data"
                  type="text"
                  placeholder="Company Name"
                  required
                  autofocus
                  autocomplete="off"
                  name="company_name"
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
                Number_Phone: <br />
                <input
                  type="number"
                  placeholder="number phone"
                  required
                  autocomplete="off"
                  name="phone"
                  class="data"
                  
                /><br />
              </div>
            </li>

            <li>
              <div>
                Location : <br />
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
                Classification<br />
                <input
                  class="data"
                  type="number"
                  autocomplete="off"
                  name="classification"
                  max="6"
                  min="1"
                /><br />
              </div>
            </li>

            <li>
              <div>
                File<br />
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
                Icon Company<br />
                <input
                  style="width: 90px; height: 20px"
                  class="data"
                  type="file"
                  autocomplete="off"
                  name="anyimage"
                /><br />
              </div>
            </li>
          </ul>
          <br />

          <div class="but">
            <button type="reset">Reset</button>
            <button type="submit">Registration</button>

            <br /><br />
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
