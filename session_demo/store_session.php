<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Session</title>
</head>
<body>
    <?php
    session_start(); // Start the session

    // Store data in the session
    $_SESSION['username'] = 'JohnDoe';
    $_SESSION['email'] = 'john@example.com';

    echo "<p>Session data has been stored.</p>";
    echo "<p><a href='retrieve_session.php'>Go to Retrieve Session Page</a></p>";
    ?>
<h3>performed by 406,411,421,432</h3>
</body>
</html>
