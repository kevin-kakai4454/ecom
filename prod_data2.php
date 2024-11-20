<?php
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
        $connect = new PDO("mysql:host=$servername; dbname=$dbname", $username, $password);

        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $connect->query("SELECT prod_image FROM product WHERE prod_name = 'Trouser' LIMIT 1 ");
        $product_arr = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // print_r(json_encode(product_arr[0]));
        foreach ($product_arr as $prod) {
            // $prod = base64_encode($product_arr);
            var_dump($prod);
        }
        // if ($product_arr) {
        //     http_response_code(200);
        //     // $product_arr['prod_image'] = base64_encode($product_arr['prod_image']);
        //     // echo json_encode($product_arr['prod_name']);
        //     // echo json_encode($product_arr['prod_price']);
        //     // echo json_encode($product_arr['prod_desc']);
        //     echo json_encode(base64_encode($product_arr[0]));
        //     header('Content-Type: image/jpeg');
        //     // header('Content-Type: Application/json');
        //     // print_r($prod);
        //     // while ($product_arr) {
        //     //     echo $product_arr['prod_name'];
        //     // }
        // } else {
        //     http_response_code(404);
        //     echo json_encode(array("Message" => "No Product found in database"));
        // }
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(array("message" => "Database Error: " . $e->getMessage()));
    }
}


// include("db.php");


$connect = null;
// 