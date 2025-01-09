<?php
// Database connection (MySQL example)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sports_marketplace";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Database initialization script
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255) NOT NULL
);";

if ($conn->multi_query($sql) === TRUE) {
    echo "Tables initialized successfully.";
} else {
    echo "Error initializing tables: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sports Marketplace</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Sports Marketplace</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="signup.php">Sign Up</a>
            <a href="login.php">Log In</a>
        </nav>
    </header>

    <main>
        <section id="marketplace">
            <h2>Available Sports Items</h2>
            <div class="product-list">
                <!-- PHP to fetch products -->
                <?php
                $conn = new mysqli($servername, $username, $password, $dbname);
                $result = $conn->query("SELECT * FROM products");

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='product'>
                                <img src='" . $row['image'] . "' alt='" . $row['name'] . "'>
                                <h3>" . $row['name'] . "</h3>
                                <p>" . $row['description'] . "</p>
                                <p>Price: $" . $row['price'] . "</p>
                              </div>";
                    }
                } else {
                    echo "<p>No products available.</p>";
                }
                $conn->close();
                ?>
            </div>
        </section>

        <section id="adjustments">
            <h2>Make Changes</h2>
            <div class="controls">
                <label for="brightness">Brightness:</label>
                <input type="range" id="brightness" name="brightness" min="0" max="200" value="100">

                <label for="contrast">Contrast:</label>
                <input type="range" id="contrast" name="contrast" min="0" max="200" value="100">
            </div>
        </section>
    </main>

    <script>
        const brightness = document.getElementById('brightness');
        const contrast = document.getElementById('contrast');
        const marketplace = document.getElementById('marketplace');

        brightness.addEventListener('input', () => {
            marketplace.style.filter = `brightness(${brightness.value}%)`;
        });

        contrast.addEventListener('input', () => {
            marketplace.style.filter = `contrast(${contrast.value}%)`;
        });
    </script>
</body>
</html>
