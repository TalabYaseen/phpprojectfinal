<?php 
session_status() === PHP_SESSION_ACTIVE ?: session_start();
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php include('./include/include_head.php');?>
            <!-- Form Start -->
<div class="container-fluid pt-4 px-4" style="min-height: 80vh;">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">                            
                <form action="categoryAdd.php" method="post" enctype="multipart/form-data">
                    <h6 class="mb-4">Add New Category</h6>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="category_name" id="floatingInput"
                            placeholder="New Category">
                            <label for="floatingInput">Category Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="category_price" id="floatingInput"
                            placeholder="New Category">
                            <label for="floatingInput">price</label>
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Category Image</label>
                        <input class="form-control bg-dark" type="file" name="file" id="formFile">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </form>
            </div>
        </div>
                    

               
            <!-- Form End -->

           
    </div>
</div>

                                    
<!-- Footer Start -->
<?php include('./include/include_footer.php');?>
