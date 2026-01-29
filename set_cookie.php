<!DOCTYPE html>
<html>
<head>
    <title>Set Cookie</title>
</head>
<body>
    <?php
    // Set a cookie that expires in 1 hour
    $cookie_name = "user";
    $cookie_value = "John Doe";
    $expiry_time = time() + 3600; // 1 hour from now
    $path = "/"; // Available across the entire domain

    // Set the cookie
    setcookie($cookie_name, $cookie_value, $expiry_time, $path);

    // Check if the cookie is set
    if (isset($_COOKIE[$cookie_name])) {
        echo "<p>Cookie '$cookie_name' is already set with value: " . $_COOKIE[$cookie_name] . "</p>";
    } else {
        echo "<p>Cookie '$cookie_name' has been set.</p>";
    }
    ?>
</body>
</html>
