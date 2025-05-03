<?php
$target_dir = "files/";

if (!isset($_FILES["file"])) {
    echo "No file uploaded.";
    exit;
}

$target_file = $target_dir . basename($_FILES["file"]["name"]);
$file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Allow only specific file types
$allowed_types = ['txt', 'jpg', 'png', 'php'];

if (!in_array($file_type, $allowed_types)) {
    echo "Invalid file type! Only .txt, .jpg, .png, or .php files are allowed.";
    exit;
}

// Create directory if it doesn't exist
if (!is_dir($target_dir)) {
    mkdir($target_dir, 0755, true);
}

if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    echo "The File ". htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded ";
    echo "<h1 style='color: green;'>You have successfully exploited the vulnerability!</h1>";
    } 
    else
    {
    echo "Sorry, there was an error uploading your file.";
}
?>




