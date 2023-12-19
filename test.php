<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Blog Post</title>
    <link rel="stylesheet" href="style/test_style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/light.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="container">
        <h1>Create a Blog Post</h1>
        <form id="blogForm">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>

            <label for="content">Content:</label>
            <textarea id="content" name="content" rows="4" required></textarea>

            <label for="categories">Categories:</label>
            <select id="categories" name="categories[]" multiple required>
                <!-- Categories will be dynamically populated using JavaScript -->
            </select>

            <button type="button" onclick="submitForm()">Submit</button>
        </form>

        <div id="result"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="script/test_script.js"></script>
</body>
</html>
