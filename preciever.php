<?php

include('db.php');


if (isset($_POST['submit'])) {
    $prod_name = mysqli_real_escape_string($connect, $_POST["prod_name"]);
    $prod_price = mysqli_real_escape_string($connect,  $_POST["prod_price"]);
    $prod_desc =  mysqli_real_escape_string($connect, $_POST["prod_desc"]);
    $prod_size =  mysqli_real_escape_string($connect, $_POST["prod_size"]);
    echo $prod_image = mysqli_real_escape_string($connect,  $_FILES["prod_image"]["name"]);
    echo $prod_image_temp =  $_FILES["prod_image"]['tmp_name'];

    $extention = pathinfo($prod_image, PATHINFO_EXTENSION);
    $allowed_types = array("jpg", "jpeg", "png", "gif");
    // $targetPath = "Uploads/" . $prod_name;

    if (in_array($extention, $allowed_types)) {
        if (move_uploaded_file($prod_image_temp, "Uploads/$prod_image")) {
            $query = "INSERT INTO product(prod_name, prod_price, prod_desc,prod_size, prod_image)";
            $query .= "VALUES(?, ?,?,?,?)";
            $stmt = mysqli_stmt_init($connect);
            if (mysqli_stmt_prepare($stmt, $query)) {
                mysqli_stmt_bind_param($stmt, "sssss", $prod_name, $prod_price, $prod_desc, $prod_size, $prod_image);
                // $stmt->send_long_data(4, $decodeImage);
                $stmt->execute();


                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>This is a primary alert!
                             <button  class='btn-close' data-bs-dismiss='alert' ></button>
                             </div>";
            } else {
                echo json_encode(["Message" => "Product Not added successfully"]);
            }
        } else {
            echo "The Image is not moved to uploads";
        }
    } else {
        echo "The uploaded file is not an image";
    }

    // move_uploaded_file($prod_image_temp, "Uploads/$prod_image");
}
