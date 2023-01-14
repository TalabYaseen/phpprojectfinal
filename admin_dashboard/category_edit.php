<?php 
require("config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>DarkPan - Bootstrap 5 Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <?php include('./include/include_head.php');?>


            <!-- Form Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">


                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">                            
                        <form action="category_update.php" method="post" enctype="multipart/form-data">
                            <h6 class="mb-4">Category Update</h6>
                            

                                     <?php
                                       $category_id=$_POST['category_id']; 
                                       $sql = "SELECT * FROM categories WHERE category_id='$category_id'";
                                       $result = mysqli_query($conn, $sql);
                                       $row = mysqli_fetch_assoc($result);

                                     echo "
                                <div class='form-floating mb-3'>
                                    <input type='text' class='form-control' name='category_name' id='floatingInput'
                                    placeholder='Category Name' value='$row[category_name]'> 
                                    <input type='hidden' name='category_id' value='$category_id' >
                                    <label for='floatingInput'>Category Name</label>
                                    
                                </div>
                                    <div class='mb-3'>
                                        <label for='formFile' class='form-label'>Category Current Image</label>
                                        <p>
                                        <img src='$row[category_pic]' width=200px height=200px>
                                        </p>
                                        <input class='form-control bg-dark' type='file' name='file' id='formFile'>
                                    </div>
                                    ";
                                     ?>
                                
                            
                            
                            
                            <!-- <div class="form-floating">
                                <textarea class="form-control" placeholder="discription"
                                    id="floatingTextarea" style="height: 150px;"></textarea>
                                <label for="floatingTextarea">Description</label>
                            </div>
                            <p></p> -->

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                        </div>
                    </div>
                    

               
            <!-- Form End -->


             
                </div>
             </div>


<!-- Footer Start -->
<?php include('./include/include_footer.php');?>
