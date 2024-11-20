<?php
include("db.php");
header('Content-Type:application/JSON');
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = file_get_contents("php://input");
    $product = json_decode($data, true);
    // echo json_encode($product);


    $prod_name = $product["prod_name"];
    $prod_price = $product["prod_price"];
    $prod_desc = $product["prod_desc"];
    $prod_size = $product["prod_size"];
    $prod_image = $product["prod_image"];

    $decodeImage = base64_decode($prod_image);
    $img = base64_decode($decodeImage);


    $query = "INSERT INTO product(prod_name, prod_price, prod_desc,prod_size, prod_image)";
    $query .= "VALUES(?, ?,?,?,?)";
    $stmt = mysqli_stmt_init($connect);
    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, "sssss", $prod_name, $prod_price, $prod_desc, $prod_size, $decodeImage);
        // $stmt->send_long_data(4, $decodeImage);
        $stmt->execute();
        echo json_encode(["Message" => "Product Fully added successfully"]);
    } else {
        echo json_encode(["Message" => "Product Not added successfully"]);
    }
}
