<?php
     function get_category_Records(){
        //This is to display all the Admin Records
        include "../connect.php";
            if(!isset($_GET['edit'])){
                $guidanceEdit = "";
                } 
                else{
                $guidanceEdit = $_GET['edit'];
                }
            $sqlquery = mysqli_query($con, "SELECT * FROM tblcategory");
           
            while ($rows = mysqli_fetch_array($sqlquery)) {
                ?>
                <tr>
                  <form method="POST">
                    <?php if($guidanceEdit == $rows['categoryID']){ ?>
                    <td><input type="text" name="categoryEditName" value="<?php echo $rows[2] ?>"> </td>
                    <td><input type="text" name="categoryEditDes" value="<?php echo $rows[3] ?>"> </td>
                    <td><input type="submit" name="saveDetails"  value="Save"></td>
                    <?php } 
                    else{ ?>
                    <td><?php echo $rows['categoryName']; ?></td>
                    <td><?php echo $rows['description']; ?></td>
                    <td> <a id="editbtn" href="?edit=<?php echo $rows[0];?>">Edit</a>
                    <a id="deletebtn" href="#" onclick="del(<?php echo $rows[0];?>)">Delete</a>
                    </td>
                    <?php } ?>
                </form>
                        </tr>
                
            <?php } ?>
       <?php } ?>
<?php
     function guidanceCategoryFunction(){
        include "../connect.php";

        if(isset($_POST['addbtn'])){
            
    
            if (!isset($_SESSION['guidanceID'])) {
                header('Location: http://localhost/TES/guidanceFiles/guidancepanel.php');
                exit();
            }        
        
     
            $guidanceID = $_SESSION['guidance_ID'];

            $categoryName = $_POST['categoryName'];
            $description = $_POST['description'];
            $sql = "INSERT INTO tblcategory (guidanceID, categoryName, description, date_created, date_updated)
            VALUES ('$guidanceID', '$categoryName', '$description', current_timestamp(), NULL);";
            mysqli_query($con, $sql);
    
            }
    
            if(isset($_POST['saveDetails']))
            {
                
            if (!isset($_SESSION['guidance_ID'])) {
        
                header('Location: http://localhost/TES/guidanceFiles/index.php');
                exit();
            }
      
            $guidanceID = $_SESSION['guidance_ID'];
    
            $categoryEditName = $_POST['categoryEditName'];
            $categoryEditDes = $_POST['categoryEditDes'];
            $ID = $_GET['edit'];

            $sqledit = "UPDATE `tblcategory` SET `categoryName` = '$categoryEditName', `description` = '$categoryEditDes', 
            `date_updated` =  current_timestamp() WHERE `tblcategory`.`categoryID` = $ID ";
             mysqli_query($con, $sqledit);
             header('Location: http://localhost/TES/guidanceFiles/questioncategory.php');
        }
        
                if(isset($_GET['del']))
                { 
                    $delID = $_GET['del'];
                    $sqldelete = "DELETE FROM tblcategory WHERE `tblcategory`.`categoryID` = $delID";
                    mysqli_query($con, $sqldelete);
                    header('Location: http://localhost/TES/guidanceFiles/questioncategory.php');
                }
    
    }
?>