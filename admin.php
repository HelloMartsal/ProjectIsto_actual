
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="style/start">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Συντονισμός εθελοντών</title>

    <style>

body {
    font-family: 'Arial', sans-serif;
    background-color: #264428;
    color: #333;
    margin: 0;
}

.container {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            flex-direction: column; 
}

.top-bar {
    background-color: #1d2723;
    padding: 10px;
    text-align: center;
    color: white;
    width: 100%; 
    margin: 0; 
}

.site-name a {
    color: white;
    text-decoration: none;
    font-size: 20px;
    font-weight: bold;
}

.main-content {
    flex: 2;
    padding: 20px;
}

.image-container {
            margin-top: 10px;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
}

.arrow {
    font-size: 50px;
    cursor: pointer;
    background-color: transparent;
    border: none;
    color: rgba(0, 0, 0, 0.5);
    position: static;
    top: 50%;
    transform: translateY(-50%);
    transition: color 0.3s;
}

#prev-arrow {
    left: 10px;
}

#next-arrow {
    right: 10px;
}

#prev-arrow:hover,
#next-arrow:hover {
    color: black;
}

.image-container img {
    max-width: 80%;
    max-height: 100%;
}

.sidebar {
    position: fixed;
    top: 0;
    right: 0;
    background-color: #333;
    color: white;
    padding: 20px;
    text-align: right; 
    height: 100vh; 
}

.sidebar a {
    display: block;
    color: white;
    text-decoration: none;
    padding: 10px;
    margin-bottom: 10px;
    border-radius: 5px;
    transition: background-color 0.3s;
    text-align: left; 
}

.sidebar a:hover {
    background-color: #555;
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
</head>

<body>
    <div class="top-bar">
        <span class="site-name">
            <a href="index.php">Συντονισμός εθελοντών</a>
        </span>
    </div>
    <div class="container">
        
        <div class="image-container">
            <div id="prev-arrow" class="arrow" onclick="changeImage('prev')">❮</div>
            <img src="../style/fireman_ai.png" alt="Default Image" id="main-image">
            <div id="next-arrow" class="arrow" onclick="changeImage('next')">❯</div>
        </div>
    </div>
    <div class="sidebar">
        <a href="login_page.php">Σύνδεση στον λογαριασμό</a>
        <a href="map_page.php">Χάρτης</a>
        <a href="contact.php">Επικοινωνία</a>
        <a href="create_savior_page.php">Δημιουργία Διασώστη</a>
        <a href="logout.php">Αποσύνδεση</a>
        <a href="announcement.php">Ανακοινώσεις</a>
        <a href="add_cat_item.php">Προσθήκη Βάσης</a>
        <a href="base.php">Διαχείρηση Βάσης</a>
        <a href="graph.php">Διαχείριση Offers και Request</a>


    </div>

    <script>
        var images = [
            "../style/fireman_ai.png",
            "../style/supplies.png",
            "../style/supplies2.png"
        ];

        var currentImageIndex = 0;

        function changeImage(direction) {
            if (direction === 'prev') {
                currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
            } else {
                currentImageIndex = (currentImageIndex + 1) % images.length;
            }

            var mainImage = document.getElementById('main-image');
            mainImage.src = images[currentImageIndex];
        }
    </script>
</body>

<footer>
    <p>&copy; Πλατφόρμα συντονισμού εθελοντών 2023</p>
</footer>

</html>