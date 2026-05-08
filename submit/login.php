<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login page</title>
    <link rel="stylesheet" href="../css/sign.css" />
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon" />
</head>
<body>
<?php

session_start(); 

if (!isset($_POST['submit'])) {

    if (!isset($_SESSION['username'])) {
        ?> 
        <div class="sign">
            <br /><br />  
            <h1>Login </h1>
            <div class="form">
                <form method="post">
                    <input type="text" placeholder="Username" required autofocus autocomplete="off" name="fname" /><br />
                    <input type="password" placeholder="Password" autocomplete="off" name="pass" /><br />

                    <button type="reset">Reset</button>
                    <button type="submit" name="submit">
                        Login
                    </button>
                </form>
                <a href="./signup.php" target="_blank" id="createaccount">
                    <h3>create account</h3></a>
            </div>
        </div> 
        <?php
    } else {  

    header('Location: ../index.php');
    
    }
} else {
    $username = $_POST['fname'];
    $password = $_POST['pass'];

    $conn = mysqli_connect('localhost', 'root', '', 'contracting');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $stmt = $conn->prepare("SELECT Username, Pass FROM users WHERE Username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

   
        if ($username == $row['Username'] && password_verify($password, $row['Pass'])) {
  
            header('Location: ../index.php');
            $_SESSION['username'] = $username;
           
        } else {
            header('Location: login.php');
           
        }
    } else {
        echo "
          <script>alert('Username or Password Is Not Found ')</script>
          ";
        
    }

    mysqli_close($conn);
}
?>
</body>
</html>