<!DOCTYPE html>
<html lang="en">

<head>
    <title>Donations</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">


</head>

<body>
    <div class="container">
        <h1>Δημιουργία Προσφοράς</h1>
        <form id="blogForm">
            <label for="quant">Ποσότητα:</label>
            <input type="number" id="quant" name="quant" required>

            <label for="categories">Categories:</label>
            <select id="categories" name="categories[]" required>
            </select>
            <label for="items">Items:</label>
            <div id="items"></div>
            <button type="button" onclick="addItem()">Προσθήκη</button>
            <button type="button" onclick="submitForm()">Αποστολή</button>
        </form>

        <div id="result"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="script/donation_page.js"></script>
</body>

</html>
