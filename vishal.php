<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-Dimensional Array Example</title>
</head>
<body>

<?php
// Define a multi-dimensional associative array
$marks = array(
    "mohammad" => array(
        "physics" => 35,
        "maths" => 30,
        "chemistry" => 39
    ),
    "qadir" => array(
        "physics" => 30,
        "maths" => 32,
        "chemistry" => 29
    ),
    "zara" => array(
        "physics" => 31,
        "maths" => 22,
        "chemistry" => 39
    )
);

// Accessing multi-dimensional array values
echo "Marks for mohammad in physics: " . $marks['mohammad']['physics'] . "<br />";
echo "Marks for qadir in maths: " . $marks['qadir']['maths'] . "<br />";
echo "Marks for zara in chemistry: " . $marks['zara']['chemistry'] . "<br />";
?>

</body>
</html>
