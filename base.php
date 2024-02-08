<?php
require_once 'php/config_sess.php';
require_once 'php/organize_view.php';
if ($_SESSION["user_type"]!=="admin"){
    header("Location:../login_page.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Βάση</title>
    
</head>
<body>

<div class="form-container">

        <h2>Add Item's quantity</h2>
    <form action="php/organize.php" method="POST">
    <label for="item_name">Item Name:</label><br>
        <input type="text" id="item_name" name="item_name" required><br>
    <label for="quantity">Quantity:</label><br>
        <input type="number" id="quantity" name="quantity" required><br>
        <input type="submit" name="add" value="Add"/><br>
    </form> 
    <?php
    no_item();
    ?>
        <h2>Change Item's quantity</h2>
    <form action="php/organize.php" method="POST">
    <label for="item_name2">Item Name:</label><br>
        <input type="text" id="item_name2" name="item_name2" required><br>
    <label for="quantity2">Quantity:</label><br>
        <input type="number" id="quantity2" name="quantity2" required><br>
        <input type="submit" name="change" value="Change"/><br>
    </form> 
    <?php
    no_item2();
    ?>
        <h2>Remove Item's quantity</h2>
    <form action="php/organize.php" method="POST">
    <label for="item_name3">Item Name:</label><br>
        <input type="text" id="item_name3" name="item_name3" required><br>
    <label for="quantity3">Quantity:</label><br>
        <input type="number" id="quantity3" name="quantity3" required><br>
        <input type="submit" name="remove" value="Remove"/><br>
    </form> 
    <?php
    no_item3();
    er_quant();
    ?>
</div>
    
<hr>
<div id ="results">[Operation Status]</div>
<hr>

<div>
<h2> Current items in DB

<select id="categories" name="categories[]" required>
</select>
<input type= "text" placeholder="category1,category2,..." id="search">
<button>Search</button></h2>





<table id ="item_table">
</table>
</div>


<a href="admin.php">Κεντρική σελίδα</a><br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="script/load.js"></script> 
</body>
 
</html>