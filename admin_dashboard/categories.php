<?php 
session_status() === PHP_SESSION_ACTIVE ?: session_start();
require("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>cattegory</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php include('./include/include_head.php');?>

            <!-- table start -->
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <div class="table-responsive">
                    <?php
                    $html = "<table class='table' id='category_table'>
                    <thead><tr><th scope='col'>Category Id</th><th scope='col'>Category Name</th><th scope='col'>Image</th><th scope='col'>Created At</th><th scope='col'>Last Updated</th><th scope='col'>Edit</th></tr></thead><tbody>";
                    $sql = "SELECT * FROM categories";
                    $data= $conn->query($sql);
                    foreach($data as $elemant) {
                        if($elemant['category_is_deleted']==0){
                            $html .= "<tr><th scope='row'>$elemant[category_id]</th>";
                            $html .= "<td>$elemant[category_name]</td>";
                            $html .= "<td><img src='$elemant[category_pic]' alt='$elemant[category_name]' width='100' height='100'></td>";                                            
                            $html .= "<td>$elemant[category_created_at]</td>";
                            $html .= "<td>$elemant[category_last_updated_at]</td>";
                            $html .= "<td><form method='POST' action='./category_delete.php'><input type='hidden' name='category_id' value='$elemant[category_id]' /><button type= 'submit' value='delete' class='btn btn-square btn-primary m-2'><i class='fa-solid fa-trash-can'></i></button></form>
                            <form action='./category_edit.php' method='POST'><input type='hidden' name='category_id' value='$elemant[category_id]' /><button type='submit' name = '$elemant[category_id]' class='btn btn-square btn-outline-warning m-2'><i class='fa-solid fa-pen-to-square'></i></button></form><br></td></tr>";}
                    }
                    $html .="</tbody></table>";
                    echo $html;
                    require("category_delete.php");
                    ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
<!-- table end -->
    <!-- </div>
</div> -->

                                    
<!-- Footer Start -->
<?php include('./include/include_footer.php');?>
