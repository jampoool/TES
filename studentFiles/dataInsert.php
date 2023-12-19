<?php
include "../connect.php";
session_start();

// Validate and sanitize user inputs
function sanitizeInput($input) {
    return htmlspecialchars(trim($input));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure that the request method is POST
    $studentID = $_SESSION['studentID'];
    $classID = isset($_POST['classID']) ? $_POST['classID'] : null;

    if (isset($_POST['addBtn'])) {
        if ($classID !== null && isset($_POST['rating']) && is_array($_POST['rating'])) {
            $ratings = $_POST['rating'];

            foreach ($ratings as $questionID => $rating) {
                // Check if the record already exists
                $checkQuery = $con->prepare("SELECT COUNT(*) FROM tblevaluationform WHERE studentID = ? AND questionID = ? AND classID = ?");
                $checkQuery->bind_param("iii", $studentID, $questionID, $classID);
                $checkQuery->execute();
                $checkQuery->bind_result($count);
                $checkQuery->fetch();
                $checkQuery->close();

                if ($count > 0) {
                    // The record already exists, you can handle this situation (e.g., show an alert)
                    echo "Error: Record already exists for studentID = $studentID, questionID = $questionID, classID = $classID";
                } else {
                    // Insert the rating into the database using prepared statement
                    $insertQuery = $con->prepare("INSERT INTO tblevaluationform (studentID, questionID, rate, classID, academicID) VALUES (?, ?, ?, ?, '1')");
                    $insertQuery->bind_param("iiii", $studentID, $questionID, $rating, $classID);

                    if ($insertQuery->execute()) {
                        // Insert successful
                        echo "Rating inserted successfully!";
                    } else {
                        // Error in the query
                        echo "Error: " . $insertQuery->error;
                    }

                    $insertQuery->close(); // Close the prepared statement
                }
            }
        } else {
            echo 'Error: Invalid class ID or no ratings data received.';
        }
    }
} else {
    echo 'Error: Invalid request method.';
}
?>
