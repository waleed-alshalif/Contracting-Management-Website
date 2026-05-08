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
    if(!isset($_POST['submit']))
    {
        ?> 
<div class="sign">
      <br /><br />
      <h1>Login Admin</h1>
      <div class="form">
        <form method="post" >
          <input
            type="email"
            placeholder="Email"
            required
            autofocus
            autocomplete="off"
            name="fname"
          /><br />
          <input
            type="password"
            placeholder="Password"
            autocomplete="off"
            name="pass"
          /><br />

          <button type="reset">Reset</button>
          <button type="submit"  name="submit">
           Dashboard
          </button>
        </form>
      </div>
    </div> 
    <?php

    }

    else {
        $username = $_POST['fname'];
        $password = $_POST['pass'];
    
        // Connect to the database
        $conn = mysqli_connect('localhost', 'root', '', 'contracting');
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    
        // Prepare and execute the query with parameterized input
        $stmt = $conn->prepare("SELECT Email, Pass FROM admines WHERE Email = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
    
            // Verify the password using password_verify()
            if ($username == $row['Email'] && password_verify($password, $row['Pass'])) {
                // Store the user's information in $_SESSION
                $_SESSION['username'] = $username;
    
                // Redirect to the dashboard or any other page
                header('Location: ../dashboard.php');
                exit();
            } else {
                header('Location: loginadmin.php');
                exit();
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