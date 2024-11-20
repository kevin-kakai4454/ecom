<?php
// include("db.php");
header('Content-Type:image/jpeg;');
header('Content-Type:application/JSON');
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $file = file_get_contents("php://input");
    $image = json_decode($file);
    // echo json_encode($image);
    // Receive JSON data from JavaScript
    $imageName = $image ?? null;


    if ($imageName) {
        // Define source and destination directories
        $tempDir = 'temp/'; // Temporary location of the image
        $uploadDir = 'uploads/';

        // Ensure the upload directory exists
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Define full paths for source and destination
        $sourcePath = $tempDir . $imageName;
        $destinationPath = $uploadDir . $imageName;

        // Check if the image exists in the temporary location
        if (file_exists($sourcePath)) {
            // Move the file to the uploads directory
            if (rename($sourcePath, $destinationPath)) {
                echo json_encode([
                    "status" => "success",
                    "message" => "Image moved successfully to: " . $destinationPath
                ]);
            } else {
                echo json_encode([
                    "status" => "error",
                    "message" => "Failed to move the image."
                ]);
            }
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Image not found in temporary location."
            ]);
        }
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Image name not provided."
        ]);
    }
}
