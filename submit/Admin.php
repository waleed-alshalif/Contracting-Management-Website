
<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../css/sign.css">
      <link rel="shortcut icon" href="img/logo.png" type="image/x-icon" />
      <title>Admins</title>
</head>

<body>
<?php

if(!isset($_POST['send'])){
  
  ?>
    <div class="sign">
        <h1> Admin</h1>
        <div class="form">
            <form method="post" enctype="multipart/form-data">
                       
                <input type="text" placeholder="username" required autofocus autocomplete="off" name="username" ><br>

                <input type="tel" placeholder="Numberphone" required autocomplete="off" name="phonenumber" maxlength="9" minlength="9"><br>

                <input type="email" placeholder="Email" required autocomplete="off" name="email"><br>

                <input type="password" placeholder="Password" autocomplete="off" name="password"><br>
           
               <button type="reset">Reset</button>   

                <button type="submit" name="send"> Add Admin</button>
            </form>
        </div>
    </div>

  <?php  
  }

else 
{
  if(trim($_POST['username']) && trim($_POST['password']) && trim($_POST['email']) && trim($_POST['phonenumber']))    
  
      {

              $username = $_POST['username'];
              $pass = $_POST['password'];
              $email = $_POST['email'];
              $phone = $_POST['phonenumber'];
              
              $encrption = password_hash($pass , PASSWORD_DEFAULT);
              
              $conn = mysqli_connect('localhost' , 'root' , '' , 'contracting');
              $insert = "insert into  admines 
                          (Username ,  Email , Pass , Phone_Number , Registeration_date) 
                    values ('$username' , '$email' , '$encrption' , '$phone' , NOW())";
              
              $query = mysqli_query($conn , $insert);
              
              
                if($query){
                  header('Location: Admin.php');
                }
                else {
                  echo "Sorry No Registeration";
                }
      }
      else 
      {
        echo "
        <script>alert('Sorry. You Cannot Record For Find TextBox Empty')</script>
        ";
      }
      mysqli_close($conn);
 }


?>
    
</body>
</html>
