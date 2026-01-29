<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destroy Session</title>
</head>
<body>
    <?php
    session_start(); // Start the session

    // Destroy the session
    session_destroy();

    echo "<p>Session has been destroyed.</p>";
    echo "<p><a href='store_session.php'>Go to Store Session Page</a></p>";
    ?>
<h3>performed by 406,411,421,432</h3>

</body>
</html>
