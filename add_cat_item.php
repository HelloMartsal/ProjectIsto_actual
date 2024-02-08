<?php
require_once 'php/config_sess.php';
require_once 'php/push_pro_view.php';
require_once 'php/push_cat_view.php';
require_once 'php/load_url_view.php';
if ($_SESSION["user_type"] !== "admin") {
    header("Location:../login_page.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script/push_item.js" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
    <style>
        body {
            background-color: #1a3a1d;
            color: #ffffff;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .form-container {
            display: flex;
            justify-content: space-between;
            background-color: #23442e;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 20px;
            border-radius: 8px;
            width: 100vw;
        }

        form {
            flex: 1;
            margin: 10px;
        }

        h1 {
            color: #ffffff;
        }

        label {
            color: #ffffff;
        }

        input {
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #000000;
            border-radius: 4px;
        }

        input[type="button"],
        input[type="submit"] {
            background-color: #1c291d;
            color: #ffffff;
            cursor: pointer;
        }

        input[type="button"]:hover,
        input[type="submit"]:hover {
            background-color: #2d6430;
        }

        #response,
        #response1 {
            margin-top: 10px;
            padding: 10px;
            background-color: #4c6958;
            border: 1px solid #282d30;
            border-radius: 4px;
            color: #3d4447;
        }
        footer {
    background-color: #333;
    color: white;
    text-align: center;
    padding: 10px;
    position: fixed;
    bottom: 0;
    width: 100%;
}
    </style>
    <title>Add Item or Category</title>
</head>
<body>
    <div class="form-container">
        <form onsubmit="return prepareAndSendData(event)">
            <div id="response"></div>
            <h1>Add New Item</h1>
            <label for="item_name">Item Name:</label><br>
            <input type="text" id="item_name" name="item_name" required><br>
            <label for="item_category">Item Category:</label><br>
            <input type="text" id="item_category" name="item_category" required><br>
            <div id="details">
                <label for="details">Details:</label><br>
                <input type="text" id="detail_name" name="detail_name[]" placeholder="Detail Name" required><br>
                <input type="text" id="detail_value" name="detail_value[]" placeholder="Detail Value" required><br>
            </div>
            <input type="button" value="Add More Details" onclick="addDetails()">
            <input type="submit" value="Submit">
        </form>

        <form action="php/push_cat.php" method="post">
            <div id="response1"></div>
            <?php
            category_exists();
            show_new_category();
            ?>
            <h1>Add New Category</h1>
            <label for="category_name">Category Name:</label><br>
            <input type="text" id="category_name" name="category_name" required><br>
            <input type="submit" value="Submit">
        </form>
    </div>

    <div class="form-container">
        <form action="php/load_url.php" method="post">
            <?php
            show_url_errors();
            ?>
            <h1>Enter URL</h1>
            <label for="url">URL:</label><br>
            <input type="text" id="url" name="url" required><br>
            <input type="submit" value="Submit">
        </form>

        <form action="php/json_upload.php" method="post" enctype="multipart/form-data">
            <h1>Upload JSON File</h1>
            <label for="jsonFile">File:</label><br>
            <input type="file" id="jsonFile" name="jsonFile" accept=".json" required><br>
            <input type="submit" value="Upload">
        </form>
    </div>
</body>
<?php
var_dump($_SESSION);
?>
</html>
