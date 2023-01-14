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
                    <!-- <div class="col-md-6 text-center"> -->
                         <!-- <h3>Wellcome to admin dashboard</h3>  -->
                    <!-- </div>  -->
                    
                        </div>
                    </div>
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
                            <h6 class="mb-4">USERS</h6>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">user_name</th>
                                            <th scope="col">phone</th>
                                            <th scope="col">email</th>
                                            <th scope="col">address</th>
                                            <th scope="col">create_at</th>
                                            <th scope="col">last_login</th>
                                            <th scope="col">is_admin</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include ("./config.php");
                                        $sql = "SELECT * FROM users";
                                        $data= $conn->query($sql);
                                        $i = 1;
                                        $html = "";
                                        foreach($data as $row) {
                                            if ($row['is_deleted'] == 0){

                                            $e_id = $row['user_id'];
                                            $e_name = $row['user_name'];
                                            $e_phone = $row['phone'];
                                            $e_email = $row['email'];
                                            $e_password = $row['password'];
                                            $e_address = $row['address'];
                                            $e_pic = $row['pic'];
                                            $e_create_at = $row['create_at'];
                                            $e_last_login = $row['last_login'];
                                            $e_is_admin = $row['is_admin'];
                                            if($e_is_admin == 1){ $x = 'Yes';} else { $x = 'No';}
                                            $html .= "<tr><th scope='row'>$i</th>";
                                            $html .= "<td>$e_name</td>";
                                            $html .= "<td>$e_phone</td>";
                                            $html .= "<td>$e_email</td>";
                                            $html .= "<td>$e_address</td>";
                                            $html .= "<td>$e_create_at</td>";
                                            $html .= "<td>$e_last_login</td>";
                                            $html .= "<td>" . $x ."</td>";
                                            $html .= "<td><a href='delete_user.php?deleteid=$e_id'><button type=button' class='btn btn-square btn-primary m-2'><i class='fa-solid fa-trash-can'></i></button></a></td></tr>";
                                            $i++;
                                        } }
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
