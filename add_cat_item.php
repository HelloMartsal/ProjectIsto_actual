<?php
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    
    <form action="php/push_pro.php" onsubmit="return prepareAndSendData()">
    <h1>Add New Item</h1>
        <label for="item_name">Item Name:</label><br>
        <input type="text" id="item_name" name="item_name"><br>
        <label for="item_category">Item Category:</label><br>
        <input type="text" id="item_category" name="item_category"><br>
        <div id="details">
            <label for="details">Details:</label><br>
            <input type="text" id="detail_name" name="detail_name[]"placeholder="Detail Name"><br>
            <input type="text" id="detail_value" name="detail_value[]"placeholder="Detail Value"><br>
        </div>
        <input type="button" value="Add More Details" onclick="addDetails()">
        <input type="submit" value="Submit">
    </form>
    <script>
        var detailCounter = 0;
function addDetails() {
    var detailsDiv = document.getElementById('details');
    
    var newDetailNameLabel = document.createElement('label');
    newDetailNameLabel.innerHTML = 'Detail ' + (detailCounter + 1) + ':';
    detailsDiv.appendChild(newDetailNameLabel);
    detailsDiv.appendChild(document.createElement('br'));
    
    var newDetailName = document.createElement('input');
    newDetailName.type = 'text';
    newDetailName.name = 'detail_name[' + detailCounter + ']';
    newDetailName.id = 'detail_name_' + detailCounter;
    newDetailName.placeholder = 'Detail Name';
    detailsDiv.appendChild(newDetailName);
    detailsDiv.appendChild(document.createElement('br'));
    
    
    var newDetailValue = document.createElement('input');
    newDetailValue.type = 'text';
    newDetailValue.name = 'detail_value[' + detailCounter + ']';
    newDetailValue.id = 'detail_value_' + detailCounter;
    newDetailValue.placeholder = 'Detail Value';
    detailsDiv.appendChild(newDetailValue);
    detailsDiv.appendChild(document.createElement('br'));
    
    detailCounter++;
}

function prepareAndSendData() {
    var itemName = document.getElementById('item_name').value;
    var itemCategory = document.getElementById('item_category').value;

    var details = [];
    for (var i = 0; i < detailCounter; i++) {
        var detailName = document.getElementById('detail_name_' + i).value;
        var detailValue = document.getElementById('detail_value_' + i).value;
        details.push({
            detail_name: detailName,
            detail_value: detailValue
        });
    }

    var itemData = {
        name: itemName,
        category: itemCategory,
        details: details
    };

    var jsonData = JSON.stringify(itemData);

    console.log(jsonData);
    return false;
}
    </script>
    <!-- TODO create the category managment -->
    <form action="php/push_cat.php" method="post">
    <h1>Add New Category</h1>
        <label for="category_name">Category Name:</label><br>
        <input type="text" id="category_name" name="category_name"><br>
        <input type="submit" value="Submit">
    </form>

    </div>
    <div class="form-container">
        <!-- TODO create the url managment -->
    <form action="php/load_url.php" method="post">
    <h1>Enter URL</h1>
        <label for="url">URL:</label><br>
        <input type="text" id="url" name="url"><br>
        <input type="submit" value="Submit">
    </form>
    <!-- TODO create the upload managment -->
    <form action="php/json_upload.php" method="post" enctype="multipart/form-data">
    <h1>Upload JSON File</h1>    
    <label for="jsonFile">File:</label><br>
        <input type="file" id="jsonFile" name="jsonFile" accept=".json"><br>
        <input type="submit" value="Upload">
    </form>
    </div>
    <!-- TODO Print the base down here -->
</body>
</html>