<?php

include('code_repeat/header.php');

$conn = mysqli_connect('localhost' , 'root' , '' , 'contracting');
$select = "select * from projects";

$query = mysqli_query($conn, $select);

if(mysqli_num_rows($query) > 0){

    while ($row = mysqli_fetch_assoc($query)){ 
echo ' 
<main> 
        <div class="main_project">
            <ul class="parent_project">
                <li class="child_project">
                  <div class="main_cont">
                    <div class="contact1">
                        <figure>
                        <img src="./images/project_image/' . $row['icon'] . ' "  alt="No Show Image ">
                            <figcaption>
                              <h4> ' . $row['Project_Name'] . ' </h4>
                            </figcaption>
                          </figure>
                      </div>
                      <div class="contect2">
                      <h3><span>Destination</span> : ' . $row['Company_Name'] . '</h3>
                      <h3><span>Location</span> :' . $row['Location'] . '</h3>
                      <h3><span>Expiration Date</span>: ' . $row['Date_End'] . '</h3>
                      <h3><span>File Project :  </span>
                         <a href="./Files/File_Project/' . $row['File_Project'] . '" target="_blank" title="">
                           Show more information about it
                         </a>
                        </h3>
                    </div>
                  </div>
                </li>
            </ul>
        </div>
</main>

'; }
    }
    ;
include('code_repeat/footer.php');
?>