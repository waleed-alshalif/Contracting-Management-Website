<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration </title>
    <link rel="stylesheet" href="../css/addproject_to_manager.css">
</head>
<body>

  <?php 

if(!isset($_POST['send']))

{

  ?>
  
  <div class="job">
        <h1 class="title"> Add Project About Manger </h1>
        <div class="form">
          <form  method="post" enctype="multipart/form-data">
            <ul>

            <li>
                <div    >
                 <h3>ID_manager</h3> 
                  <input
                    type="number"
                    placeholder=" Id About Manager"
                    required
                    autocomplete="off"
                    name="idm"
                    class="data"
                   
                  />
                </div>
              </li> 

              <li>
                <div    >
                 <h3>Price Project : </h3> 
                  <input
                    type="number"
                    placeholder=" Price Project ( $ )"
                    required
                    autocomplete="off"
                    name="price"
                    class="data"
                  />
                </div>
              </li> 
              
            <li>
              <div>
               <h3> Description Project :</h3>
               <textarea 
               maxlength="300"
               name="description" 
               id="" 
               cols="70" 
               rows="6" 
               placeholder="Description Project .......(max char 300)"
               style="padding:12px"></textarea>
              </div>
          </li>

        </ul>
        <div class="but">
      <button type="reset">Reset</button>
      <button type="submit" name="send">Add_Project</button>
    </div>
    </form>
  </div>
</div>

</body>
</html>

<?php
}



 else {

         $pricemanger = $_POST['price'];
         $descrip = strip_tags($_POST['description']);
         $idmanger = $_POST['idm'];

                    $conn = mysqli_connect('localhost' , 'root' , '' , 'contracting');
                    $insert = "insert into add_project_to_manager ( Date , Price , Description , ID_manager ) 
                                                            values ( NOW() , '$pricemanger' , '$descrip' , '$idmanger')";

                  $query = mysqli_query($conn , $insert);
                  
                      if($query)
                      {
                          header('Location: ../project_managers.php');
                      }
                  
                      mysqli_close($conn);
                 
 }
?>
