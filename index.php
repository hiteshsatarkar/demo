<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple PHP Website</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Welcome to Simple PHP Website!</h1>
        </header>

        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>

        <main>
            <h2>Latest News</h2>
            <?php
            // Include database connection
            include 'db_config.php';

            // Query to fetch latest news
            $sql = "SELECT id, title, content FROM news ORDER BY id DESC LIMIT 5";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<article>";
                    echo "<h3>" . htmlspecialchars($row["title"]) . "</h3>";
                    echo "<p>" . htmlspecialchars($row["content"]) . "</p>";
                    echo "</article>";
                }
            } else {
                echo "No news articles found.";
            }

            // Close database connection
            $conn->close();
            ?>
        </main>

        <footer>
            <p>&copy; <?php echo date("Y"); ?> Simple PHP Website</p>
        </footer>
    </div>
</body>
</html>
