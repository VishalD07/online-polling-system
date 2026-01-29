<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retrieve from File</title>
</head>
<body>
    <?php
    // File path
    $file = 'records.txt';

    // Check if file exists and read content
    if (file_exists($file)) {
        $contents = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        echo "<h2>Records</h2>";

        echo "<table border='1'>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                </tr>";
        foreach ($contents as $line) {
            list($name, $email) = explode(", ", $line);
            echo "<tr>
                    <td>" . htmlspecialchars($name) . "</td>
                    <td>" . htmlspecialchars($email) . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No records found.</p>";
    }
    ?>
</body>
</html>
