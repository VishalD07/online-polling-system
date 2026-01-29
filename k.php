<!DOCTYPE html>
<html>
<body>
<?php
/* First method to create an array. */
$numbers = [1, 2, 3, 4, 5];
echo "<h2>First Array</h2>";
foreach ($numbers as $value) {
    echo "Value is $value <br />";
}

/* Second method to modify the existing array. */
$numbers[0] = "one";
$numbers[1] = "two";
$numbers[2] = "three";
$numbers[3] = "four";
$numbers[4] = "five";

echo "<h2>Modified Array</h2>";
foreach ($numbers as $value) {
    echo "Value is $value <br />";
}
?>

<h3>performed by 406,411,421,432</h3>
</body>
</html>

