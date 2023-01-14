<?php

/////// INSERT
// $sql = "INSERT INTO categories (category_name,) VALUES ('Sport',)";

// if (mysqli_query($conn, $sql)) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }


///// Update
// $sql = "UPDATE categories SET category_name = 'Girls' WHERE category_id = '5'";

// if (mysqli_query($conn, $sql)) {
//     echo "Record updated successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }

//// Select
$sql = "SELECT * FROM categories";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)) {
    // Process the row data here
    
    // echo $row['category_id']. " " . $row['category_name']."<br>";
    echo '<pre>';
    print_r($row);
    echo '</pre>';
}
mysqli_close($conn);
?>