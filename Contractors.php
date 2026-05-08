<?php

include('code_repeat/header.php');

$conn = mysqli_connect('localhost' , 'root' , '' , 'contracting');
$select = "select * from contractors";

$query = mysqli_query($conn, $select);

if(mysqli_num_rows($query) > 0){

    while ($row = mysqli_fetch_assoc($query)){ 
echo '

    <div class="card">

        <div class="company_title">
                <img src="./images/company_iamge/' . $row['Icon'] . ' " alt="" style="width: 100px;height:100px;">
                <h4 style="color:orange">  ' . $row['Company_name'] . ' </h4>       
        </div>

        <div class="company_description">  

                <h3 > Locations :  ' . $row['Location'] . '  </h3> 
                <h3 > Email : ' . $row['Email'] . ' </h3>    
                <h3 > Classification : ' . $row['Classification'] . ' </h3> 
                 
                <h3 > File :          
                            <a href="./Files/File_Company/' . $row['File'] . '" target="_blank" style="color:orange">
                            Open File
                            </a>  
                                
                
                </h3> 
        </div>

    </div>    

' ;
}
} 
;

include('code_repeat/footer.php');
?>