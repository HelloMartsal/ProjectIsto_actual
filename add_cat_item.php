<?php
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="script/push_item.js"defer> </script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
    <style>
        .form-container {
            display: flex;
            justify-content: space-between;
        }
        .form-container > form {
            flex: 1;
            margin: 10px;
        }
    </style>
    <title>Add Item or Category</title>
</head>
<body>
    <div class="form-container">
    
    <form  onsubmit="return prepareAndSendData(event)">
    <h1>Add New Item</h1>
        <label for="item_name">Item Name:</label><br>
        <input type="text" id="item_name" name="item_name" required><br>
        <label for="item_category">Item Category:</label><br>
        <input type="text" id="item_category" name="item_category" required><br>
        <div id="details">
            <label for="details">Details:</label><br>
            <input type="text" id="detail_name" name="detail_name[]"placeholder="Detail Name" required><br>
            <input type="text" id="detail_value" name="detail_value[]"placeholder="Detail Value" required><br>
        </div>
        <input type="button" value="Add More Details" onclick="addDetails()">
        <input type="submit" value="Submit">
    </form>
    <!-- TODO create the category managment -->
    <form action="php/push_cat.php" method="post">
    <h1>Add New Category</h1>
        <label for="category_name">Category Name:</label><br>
        <input type="text" id="category_name" name="category_name" required><br>
        <input type="button" value="Submit">
    </form>

    </div>
    <div class="form-container">
        <!-- TODO create the url managment -->
    <form action="php/load_url.php" method="post">
    <h1>Enter URL</h1>
        <label for="url">URL:</label><br>
        <input type="text" id="url" name="url" required><br>
        <input type="submit" value="Submit">
    </form>
    <!-- TODO create the upload managment -->
    <form action="php/json_upload.php" method="post" enctype="multipart/form-data">
    <h1>Upload JSON File</h1>    
    <label for="jsonFile">File:</label><br>
        <input type="file" id="jsonFile" name="jsonFile" accept=".json" required><br>
        <input type="submit" value="Upload">
    </form>
    </div>
    <!-- TODO Print the base down here -->
</body>
</html>