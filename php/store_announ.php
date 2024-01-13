<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get data from the request
    $title = $_POST['title'];
    $content = $_POST['content'];
    $categories = $_POST['categories']; // $categories is now an array

    // Process the data (you might want to store it in a database)
    // For simplicity, we'll just print it here
    echo "Title: $title<br>";
    echo "Content: $content<br>";
    echo "Categories: " . implode(', ', $categories); // Display categories as a comma-separated list
} else {
    // Handle non-POST requests
    echo "Invalid request method";
}
?>

