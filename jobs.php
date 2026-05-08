



<?php
include('code_repeat/header.php');

$conn = mysqli_connect('localhost' , 'root' , '' , 'contracting');
$select = "select * from job";

$query = mysqli_query($conn, $select);

if(mysqli_num_rows($query) > 0){

    while ($row = mysqli_fetch_assoc($query)){        
echo '
      <div class="card">

          <h3> Name Company : </h3>

                   <div class="company_title">
                      '  . $row['Company_Name'] . '
                   </div>

                   <div class="company_description">
                      <h3> Name Job : ' . $row['Job_Name'] . ' </h3>
                      <h4> Location : ' . $row['Location'] . ' </h4>
                      <h4> End Offer : ' . $row['Job_End'] . ' </h4>
                   </div>

                   <div class="offer">
                       <a href="./submit/offeringaboutjobs.php" target="_blank"> Click here for Offering the job </a>
                   </div>
                   
      </div>

    '; }
};
    include('code_repeat/footer.php');

?>