
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>  Contractors Web   </title>

    <link rel="shortcut icon" href="./images/logo.png" type="image/x-icon" />


    <link rel="stylesheet" href="./css/job.css" />

    <link rel="stylesheet" href="./css/manger.css" />   
         
    <link rel="stylesheet" href="./css/project.css" />
    
    <link rel="stylesheet" href="./css/styles.css" />

  </head>
  <body>
    <header class="header">
      <div class="header__menu-bar">
        <div class="header__logo-box">
            <div class="header__logo-box">
              <svg class="logo">
                <use xlink:href="./images/log.png">
                  <img src="./images/logo.png" alt="">
                </use>
    
              </svg>
            </div>
        </div>

        <nav class="header__nav">
          <ul class="header__nav-list">
            <li class="header__nav-item">
              <a href="index.php" class="header__nav-link header__nav-link--active"
                >Home</a
              >
            </li>
            <li class="header__nav-item">
              <a href="Contractors.php" class="header__nav-link"
                >Contractors</a
              >
            </li>
            <li class="header__nav-item">
              <a href="Projects.php" class="header__nav-link">Projects</a>
            </li>
            <li class="header__nav-item">
              <a href="jobs.php" class="header__nav-link">Jobs</a>
            </li>
            <li class="header__nav-item">
              <a href="project_managers.php" class="header__nav-link">Project Managers</a>
            </li>
            <li class="header__nav-item">
              <a href="about.php" class="header__nav-link">Contact Us</a>
            </li>
          </ul>
        </nav>
       
       <?php
        session_start();
      if(isset($_SESSION['username']))
       {  

        echo "Use By : " . $_SESSION['username'];
       }
       else {
        ?>
       
      <div class="header__btn-box">
        <a href="submit/login.php" class="btn btn--white">Login</a>
        <a href="submit/signup.php" class="btn btn--green">Sign Up</a>
      </div>
      
      <?php
       }
       ?>
      </div>

