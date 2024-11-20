<?php
// error_reporting(0);
// include("db.php");
header("Access-Control-Allow-Origin: *");
header('Content-Type: image/jpeg');
header("Content-Type:application/json; Charset=UTF-8;image/jpeg");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = file_get_contents("php://input");
    $prod_name = json_decode($data, true);
    // echo json_encode($product);

    try {
        $servername = "localhost";
        $dbname = "ecom";
        $username = "root";
        $password = "";
        // $prod_name = "nnvhb";
        $connect = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);

        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $connect->query("SELECT * FROM product WHERE prod_name = '$prod_name' ");
        $product_arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // print_r($product_arr);
        if ($product_arr) {
            http_response_code(200);

            // foreach ($product_arr as  $imag) {
            //     $imag = $imag['prod_image'];
            //     $base64_image =  base64_encode($imag);
            //     $imag['prod_image'] = json_encode($base64_image);
            // }

            // for ($i = 0; $i < count($product_arr); $i++) {
            //     $imag = $product_arr[$i]['prod_image'];
            //     $base64_image =  base64_encode($imag);
            //     $product_arr[$i]['prod_image'] = json_encode($base64_image);
            // }

            // echo json_encode($base64_image);
            echo json_encode($product_arr);
        } else {
            http_response_code(404);
            echo json_encode(array("Message" => "No Product found in database"));
        }
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(array("message" => "Database Error: " . $e->getMessage()));
    }
}



$connect = null;
// 