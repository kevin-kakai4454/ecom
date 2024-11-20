<?php

global $connect;

$servername = "localhost";
$dbname = "ecom";
$username = "root";
$password = "";


$connect = new mysqli(hostname: $servername, username: $username, password: $password, database: $dbname);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
} else {
    // echo "Connected successfully";
}



/*
To handle this scenario, you can send the product data (name, price, description, size, and images) as a single JSON object from JavaScript. In PHP, extract the individual pieces of data, save the images to the database, and store the rest of the product information in the corresponding columns.

Here’s how to extend the solution to include these additional product details:

### 1. JavaScript: Send Product Data to PHP

Make sure each product’s details are structured in an object, including the images as an array.

```javascript
async function uploadProduct(product) {
    // Convert each image file to Base64
    const imagesData = await Promise.all(product.productImages.map(file => {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.onload = () => resolve(reader.result);
            reader.onerror = reject;
            reader.readAsDataURL(file);
        });
    }));

    // Structure the product data with the converted images
    const productData = {
        productName: product.productName,
        productPrice: product.productPrice,
        productDescription: product.productDescription,
        productSize: product.productSize,
        productImages: imagesData
    };

    // Send the data to PHP
    fetch('your_php_script.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(productData),
    })
    .then(response => response.json())
    .then(data => console.log('Success:', data))
    .catch((error) => console.error('Error:', error));
}
```

Here, `product.productImages` is an array of image files, and the other properties (`productName`, `productPrice`, etc.) are strings or numbers.

### 2. PHP: Handle Product and Image Data

In your PHP script, decode the JSON and save the data to the database. Here’s how to manage the different data types:

```php
<?php
// Include database connection
$mysqli = new mysqli("localhost", "username", "password", "database");

// Get the JSON data
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['productName'], $data['productPrice'], $data['productDescription'], $data['productSize'], $data['productImages'])) {
    // Prepare statement to insert product data (excluding images for now)
    $stmt = $mysqli->prepare("INSERT INTO products (name, price, description, size) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sdss", $data['productName'], $data['productPrice'], $data['productDescription'], $data['productSize']);
    $stmt->execute();
    
    // Get the last inserted product ID
    $productId = $stmt->insert_id;
    $stmt->close();

    // Insert each image associated with this product
    foreach ($data['productImages'] as $base64Image) {
        // Decode and prepare image data
        $imageData = explode(',', $base64Image)[1];
        $decodedImage = base64_decode($imageData);

        // Prepare statement to insert image data with the product ID
        $stmt = $mysqli->prepare("INSERT INTO product_images (product_id, image_data) VALUES (?, ?)");
        $stmt->bind_param("ib", $productId, $null);
        $stmt->send_long_data(1, $decodedImage);
        $stmt->execute();
    }

    echo json_encode(["status" => "success", "message" => "Product and images saved successfully"]);
} else {
    echo json_encode(["status" => "error", "message" => "Incomplete product data"]);
}
?>
```

### Database Setup Example

You’ll need two tables: one for the product details and one for the images.

```sql
CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT,
    size VARCHAR(50)
);

CREATE TABLE product_images (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    image_data LONGBLOB NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);
```

With this setup:
- The `products` table stores each product’s basic information.
- The `product_images` table stores each image as a `LONGBLOB` and links it to the `products` table using the `product_id` column.

### Tips

- **File Storage Option**: Consider storing image files on the server (e.g., `uploads/`) and saving only the file paths in the database.
- **Security**: Always validate and sanitize inputs, especially with images, to prevent injection attacks.
- **Error Handling**: Add error handling to PHP, especially for `bind_param` and `send_long_data`.

*/

/*
$mysqli = new mysqli("localhost", "username", "password", "database");

// Get the JSON data
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['productName'], $data['productPrice'], $data['productDescription'], $data['productSize'], $data['productImages'])) {
    foreach ($data['productImages'] as $base64Image) {
        // Decode the Base64 string
        $imageData = explode(',', $base64Image)[1];
        $decodedImage = base64_decode($imageData);

        // Insert all product data (including one image) in a single row
        $stmt = $mysqli->prepare("INSERT INTO products (name, price, description, size, image_data) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sdssb", 
            $data['productName'], 
            $data['productPrice'], 
            $data['productDescription'], 
            $data['productSize'], 
            $null
        );
        $stmt->send_long_data(4, $decodedImage);  // Bind the image data
        $stmt->execute();
    }

    echo json_encode(["status" => "success", "message" => "Product with images saved successfully"]);
} else {
    echo json_encode(["status" => "error", "message" => "Incomplete product data"]);
}
?>
*/