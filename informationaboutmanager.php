
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="./css/informanger.css" />
    <title>more information about the manger</title>
  </head>
  <body>

<br><br>

        <form action="submit/addproject_to_manger.php" method="post" class="formbtn" > 
            <button type="submit" name="id" class="btn_add">  Add_Project </button>
        </form>

<?php

          $conn = mysqli_connect('localhost', 'root', '', 'contracting');

          $MID = $_POST['id_from_btn_more'];
          $ID = intval($MID);

$select = "SELECT * FROM add_project_to_manager WHERE ID_manager = $ID";

    $qu = mysqli_query($conn, $select);

if (mysqli_num_rows($qu) > 0) 

{
      while ($row = mysqli_fetch_assoc($qu))
      {
        echo '
                <div class="text">
                  <div class="one">
                    <h4>The Price Of the project: <span>  ' . $row['Price'] . '</span></h4>
                    <h4>Date: <span>  ' . $row['Date'] . '</span></h4>
                    <h4> Your ID : ' . $row['ID_manager'] . '</h4>
                    <h4>The Description:</h4>
                    <p> ' . $row['Description'] . '</p>
                    </div>
                </div>
                ';  
      }
  }

else 
{
  header('Location: ../project_managers.php');     
}

?>
</body>
</html>
