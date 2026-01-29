<!DOCTYPE html>
<html>
<head>
    <title>Retrieve Cookie</title>
</head>
<body>
    <?php
    $cookie_name = "user";

    // Check if the cookie is set and display its value
    if (isset($_COOKIE[$cookie_name])) {
        echo "<p>Cookie '$cookie_name' value is: " . $_COOKIE[$cookie_name] . "</p>";
    } else {
        echo "<p>Cookie '$cookie_name' is not set.</p>";
    }
    ?>
</body>
</html>
