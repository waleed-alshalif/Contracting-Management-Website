
<?php
include('code_repeat/header.php');

    $conn = mysqli_connect('localhost' , 'root' , '' , 'contracting');

    $select = "select * from project_manager";
    
    $query = mysqli_query($conn, $select);

            if(mysqli_num_rows($query) > 0)
            {
                 while ($row = mysqli_fetch_assoc($query))
                    {        
                            echo '

                            <div class="maingermain">
                            
                            <ul class="uloutside">
                                <li id="liall">
                                    <ul class="ulinside" style = "  width: 900px;height: 196px; " >

                                        <li class="inside_li">
                                            <figure>
                                            <img src="./images/manageriamge/' . $row['Icon'] . ' " alt="" style=" width: 100px;height:100px;">
                                            </figure>
                                        </li>

                                        <li class="inside_li">
                                            <h3>ID Manager :<br><h4>  ' . $row['ID_manager']  . '</h4></h3>
                                        </li>

                                        <li class="inside_li">
                                            <h3>Name Manager :<br><h4>  ' . $row['Manager_Name'] . '</h4></h3>
                                        </li>

                                        <li class="inside_li">
                                            <h3>Major :<br> <h4> ' . $row['Major'] . '</h4></h3>
                                        </li>

                                        <li class="inside_li">
                                            <h3>Previous job :  <br> <h4> ' . $row['Previous_Jobs'] . '</h4> </h3>
                                        </li><br>

                                        <li class="inside_li">
                                            <h3>Location : <br> <h4> ' . $row['Manager_Location'] . '</h4></h3>
                                        </li>

                                        <li class="inside_li">
                                            <h3>NumberPhone :   <br> <h4> ' . $row['Phone_Number'] . ' </h4></h3>
                                        </li>

                                        <li class="inside_li">
                                            <h3>Email :  <br><h4> ' . $row['Email'] . ' </h4></h3>
                                        </li>

                                        <form action="informationaboutmanager.php" method="post" > 
                                        <button type="submit" name="id_from_btn_more" style="background-color:orange; padding:5px "
                                                  value =' . $row['ID_manager'] . '"> show more  </button>
                                        </form>
                                    </ul>       
                                </li>
                            </ul>
                            </div>
                            ';
                    }
                    
        mysqli_close($conn);

        };
            include('code_repeat/footer.php');
        ?>

