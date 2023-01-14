<?php
    $name_reg = "/^[a-zA-Z ]*$/";
    $phone_reg = "/^[0-9]{14}$/";
    $date_reg = "/^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/";
    $pass_reg = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
    // $val_email=(filter_var("user_email", FILTER_VALIDATE_EMAIL));
?>