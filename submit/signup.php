
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/sign.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon" />
    <title>Sign Up</title>
</head>

<?php



if(!isset($_POST['send'])){


 ?>
<body>
    <div class="sign">
        <h1>Sign in</h1>
        <div class="form">
            <form  method="post" enctype="multipart/form-data">
           
                <input type="text" placeholder="Username" required autofocus autocomplete="off" name="username"><br>

                <input type="password" placeholder="Password" required autocomplete="off" name ="password" ><br>
           
                <input type="email" placeholder="Email" required autocomplete="off" name="email"><br>

              
                <input type="tel" placeholder="Numberphone" required autocomplete="off" name="numberphone" maxlength="9" minlength="9"><br>

                <button type="reset">Reset</button>   
                <button type="submit" name="send">Sign Up</button>
            </form>
        </div>
    </div>

    <?php

}

else  

{

    if(trim($_POST['username']) && trim($_POST['password']) && trim($_POST['email']) && trim($_POST['numberphone']))
        {
            $fullname = $_POST['username'];
            $pass = $_POST['password'];
            $email = $_POST['email'];
            $phone = $_POST['numberphone'];

            $encryption = password_hash($pass , PASSWORD_BCRYPT);

            $conn = mysqli_connect('localhost' , 'root' , '' , 'contracting');
            $inserted = "insert into  users 
                        (Username , Pass , Phone_Number , Email, Registertion_date) 
                values ('$fullname' , '$encryption' , '$phone' , '$email' , NOW())";

             $query = mysqli_query($conn , $inserted);

                if($query){
                    
                    header('Location: signup.php');
                }
                else {
                    echo "Sorry No Registeration";
                }
        }
        mysqli_close($conn);
    else{
        echo "
        <script>alert('Sorry. You Cannot Record For Find TextBox Empty')</script>
        ";
       
        }
}

?>
</body>
</html>

'
?>