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
    <div class="container-fluid pt-4 px-4">
        <div class="row bg-secondary rounded justify-content-center mx-0">
            <?php
                include ("./includers/reg.php");
                include ("./config.php");
                if ($_SERVER["REQUEST_METHOD"] === "POST"){
                $val_email=(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL));
                $val_pass = preg_match($pass_reg, $_POST["user_pass"]);
                $val_name = preg_match($name_reg, $_POST["name"]);
                if ($_POST["gridRadios"] == "Admin"){
                    $role = 1;
                }else {
                    $role = 0;
                }
                if ($val_name && $val_email && $val_pass) {
                    $n =$_POST["name"]  ;
                    $e = $_POST["email"] ;
                    $p =  $_POST["user_pass"] ;
                    $sql = "INSERT INTO users ( user_name,email,password,is_admin) VALUES ('$n','$e','$p',$role)";
                    $conn->query($sql);
                }else {
                    echo "invaild";
                }

                }   
            ?>
            <!-- table -->
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Comments</h6>
                <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Comment</th>
                            <th scope="col">State</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php
                            include ("./config.php");
                            // $sql = "SELECT * FROM orders";
                            // $data= $conn->query($sql);
                            $i = 1;
                            $html = "";
                            // foreach($data as $row) {
                                $user_with_order = "SELECT * 
                                FROM reviews INNER JOIN users ON reviews.user_id = users.user_id INNER JOIN products ON reviews.product_id = products.product_id ORDER BY state DESC";
                                $new_data = $conn->query($user_with_order);
                                foreach ($new_data as $user){                                         
                                $e_phone = $user['user_name'];
                                // $e_email = $row['email'];
                                // $e_password = $row['password'];
                                $e_address = $user['product_name'];
                                $ordered_at = $user['review_text'];
                                $order_total = $user['state'];
                                // if($e_is_admin == 1){ $x = 'Yes';} else { $x = 'No';}
                                // <i class="fa-sharp fa-solid fa-delete-left"></i>
                                $html .= "<tr><td>$i</td>";
                                $html .= "<td>$e_phone</td>";
                                $html .= "<td>$e_address</td>";
                                $html .= "<td>$ordered_at</td>";
                                if($order_total == "Confirmed"){
                                $html .= "<td style='color:green'>$order_total</td>";}
                                elseif ($order_total == "Pending"){
                                $html .= "<td style='color:yellow'>$order_total</td>";}
                                else{
                                $html .= "<td style='color:red'>$order_total</td>";}
                                $html .= "<td><a href='./review_confirm.php?r_id=$user[review_id]'><i style='color:green' class='fa-regular fa-circle-check'></i></a>  <a href='./review_delete.php?r_id=$user[review_id]'><i class='fa-sharp fa-solid fa-delete-left'></i></a></td></tr>";
                                // $html .= "</tr>";
                                $i++;
                            }
                            echo $html;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>          
</div> 

<?php include('./include/include_footer.php');?>
