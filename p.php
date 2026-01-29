<!DOCTYPE html>
<html>
<body>
<?php
/* Create an associative array with numeric values. */
$salaries = array(
    "mohammad" => 2000,
    "qadir" => 1000,
    "zara" => 500
);

// Display initial salary values
echo "<h2>Initial Salaries</h2>";
echo "Salary of mohammad is " . $salaries['mohammad'] . "<br />";
echo "Salary of qadir is " . $salaries['qadir'] . "<br />";
echo "Salary of zara is " . $salaries['zara'] . "<br />";

/* Update the array values to salary levels. */
$salaries['mohammad'] = "high";
$salaries['qadir'] = "medium";
$salaries['zara'] = "low";

// Display updated salary levels
echo "<h2>Updated Salary Levels</h2>";
echo "Salary of mohammad is " . $salaries['mohammad'] . "<br />";
echo "Salary of qadir is " . $salaries['qadir'] . "<br />";
echo "Salary of zara is " . $salaries['zara'] . "<br />";

<h3>performed by 406,411,421,432</h3>

?>
</body>
</html>
