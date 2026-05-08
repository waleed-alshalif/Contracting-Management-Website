<?php

$con = mysqli_connect('localhost', 'root', '', 'contracting') or die( 'Can\'t connect to mysql server');

$current_date = date("Y-m-d");

$query = "SELECT * FROM daily_views WHERE date = '$current_date'";

$result = mysqli_query($con, $query);

if(mysqli_num_rows($result) > 0) {

   $row = mysqli_fetch_assoc($result);

   $views = $row['views'] + 1;

   $query = "UPDATE daily_views SET views = $views WHERE date = '$current_date'";

   mysqli_query($con, $query);

} else {
   
   $query = "INSERT INTO daily_views (date, views) VALUES ('$current_date', 1)";

   mysqli_query($con, $query);
}

mysqli_close($con);

include('code_repeat/header.php');


?>

        <div class="header__content u-margin-bottom-big">
          <div class="header__hero-img-box">
            <img
              src="images/mission-img-1x.png"
              alt="BuildCo Hero Image"
              srcset="images/mission-img-1x.png 1x, images/mission-img-1x.png 2x"
              class="header__hero-img"
            />
          </div>

          <div class="header__text-box">
            <h1 class="heading-primary u-margin-bottom-small">
              <span class="heading-primary--sub"> If you can Imagine it, </span>
              <span class="heading-primary--main">
                We can <span class="emphasis">build</span> it.
              </span>
            </h1>
            <p class="heading-sub u-margin-bottom-mid">
              We are a people-orientated, progressive business, driven by our
              values to deliver lasting change for our stakeholders and the
              communities we work in.

              <a href="submit/loginadmin.php">To show the Dashboard</a>
              
            </p>
       <div class="register">
            <h3 class="tital" style="color: orange;">To Register At Contractors Website</h3>
          

<?php

        if(!isset($_SESSION['username']))
            {  
                  echo '<h5 style="color :red"> You Cannot Record The Contracting Web Because Logging Is Not </h5>';
            }
       else 
            {
  ?>
       
      <details class="header__nav-item">
            <summary>Registration As</summary>
              <ul>
                  <li><a href="submit/signup.php">User</a></li>
                  <li>  <a href="submit/offerasmanger.php">Project-Manger</a></li>
                  <li><a href="submit/offercontractor.php">Contractor / Company</a></li>
              </ul>
      </details>
      
       <h3 class="tital" style="color: orange;">To Add At Contractors Website</h3>
              <ul style="list-style: none;">
                  <li>  <a href="submit/offerproject.php" style=" color: #007a69; font-size: 16px;">Project</a></li>
                  <li>  <a href="submit/offerjobs.php" style=" color: #007a69; font-size: 16px;"> Jobs</a></li>
                  <li>  <a href="submit/logout.php" style=" color: #007a69; font-size: 16px;"> Logout</a></li>
              </ul>
<?php

    }

?>
           </div>
        </div>
      </div>
    </header>

<?php

include('code_repeat/footer.php');

?>