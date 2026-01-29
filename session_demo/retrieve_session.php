<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retrieve Session</title>
</head>
<body>
    <?php
    session_start(); // Start the session

    // Check if session data exists and display it
    if (isset($_SESSION['username']) && isset($_SESSION['email'])) {
        echo "<p>Username: " . htmlspecialchars($_SESSION['username']) . "</p>";
        echo "<p>Email: " . htmlspecialchars($_SESSION['email']) . "</p>";
    } else {
        echo "<p>No session data found.</p>";
    }

    echo "<p><a href='destroy_session.php'>Go to Destroy Session Page</a></p>";
    ?>
<h3>performed by 406,411,421,432</h3>

</body>
</html>
