<?php
// Connect to the database (replace these values with your database credentials)
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to retrieve page content from the database
function getPageContent($pageSlug) {
    global $conn;
    $pageSlug = $conn->real_escape_string($pageSlug);
    $sql = "SELECT * FROM pages WHERE slug = '$pageSlug'";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row;
    } else {
        return false;
    }
}

// Get the requested page slug from the URL
$pageSlug = isset($_GET['page']) ? $_GET['page'] : 'home';

// Get page content from the database
$page = getPageContent($pageSlug);

// If page not found, show 404 error
if (!$page) {
    http_response_code(404);
    echo "404 Not Found";
    exit;
}

// HTML template for displaying page content
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page['title']; ?></title>
</head>
<body>

<!-- Header -->
<header>
    <h1><?php echo $page['title']; ?></h1>
</header>

<!-- Page Content -->
<div>
    <?php echo $page['content']; ?>
</div>

<!-- Footer -->
<footer>
    <p>&copy; 2024 JVS EVENTS AND SERVICES</p>
</footer>

</body>
</html>

<?php
// Close database connection
$conn->close();
?>
