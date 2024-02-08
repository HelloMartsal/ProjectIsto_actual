<?php
    require_once 'php/config_sess.php';
    if ($_SESSION["user_type"]!=="savior"){
        header("Location:../login_page.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tasks offer</title>
    <script src="script/tasks_req.js"defer> </script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="style/show_announ.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">

</head>
<body>
    <div id="req">
    </div>

</body>
</html>