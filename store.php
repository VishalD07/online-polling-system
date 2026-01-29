<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store to File</title>
</head>
<body>
    <?php
    // File path
    $file = 'records.txt';

    // Retrieve form data
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    // Append data to file if both name and email are provided
    if ($name && $email) {
        $record = "$name, $email\n";
        if (file_put_contents($file, $record, FILE_APPEND) !== false) {
            echo "<p>Data successfully saved to $file.</p>";
        } else {
            echo "<p>Failed to save data.</p>";
        }
    }
    ?>

    <h2>Store a New Record</h2>
    <form action="store_to_file.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
