<!DOCTYPE html>
<html>
<head>
    <title>Grade Calculator</title>
</head>
<body>
    <h1>Grade Calculator</h1>

    <?php
    // Array of student grades
    $grades = [85, 67, 90, 73, 88];

    // Calculate the average grade
    $total = 0;
    $count = count($grades);

    // Using a loop to sum up grades
    foreach ($grades as $grade) {
        $total += $grade;
    }

    $average = $total / $count;

    echo "<h2>Grades:</h2><ul>";

    // Using a for loop to display grades and categorize them
    for ($i = 0; $i < $count; $i++) {
        echo "<li>Grade " . ($i + 1) . ": " . $grades[$i] . " - " ;

        // Categorizing grades using if-else
        if ($grades[$i] >= 85) {
            echo "Excellent";
        } elseif ($grades[$i] >= 70) {
            echo "Good";
        } else {
            echo "Needs Improvement";
        }

        echo "</li>";
    }

    echo "</ul>";

    // Display the average grade
    echo "<h2>Average Grade: " . number_format($average, 2) . "</h2>";

    // Using a switch statement to provide feedback based on the average
    echo "<h2>Performance:</h2><p>";
    switch (true) {
        case $average >= 85:
            echo "Outstanding performance!";
            break;
        case $average >= 70:
            echo "Good job, but there is room for improvement.";
            break;
        default:
            echo "Focus more on your studies.";
            break;
    }
    echo "</p>";
    ?>
</body>
</html>
