<?php
include "../connect.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Check if the submit button is set
    if (isset($_POST['submit'])) {
        // Ensure that the request method is POST
        $studentID = $_SESSION['studentID'];
        $classID = isset($_POST['classID']) ? $_POST['classID'] : null;

        if (isset($_POST['rating']) && is_array($_POST['rating'])) {
            $ratings = $_POST['rating'];

            foreach ($ratings as $questionID => $rating) {
                // Insert the rating into the database using prepared statement
                $insertQuery = $con->prepare("INSERT INTO tblevaluationform (studentID, questionID, rate, classID, academicID) VALUES (?, ?, ?, ?, '1')");
                $insertQuery->bind_param("iiii", $studentID, $questionID, $rating, $classID);

                if ($insertQuery->execute()) {
                    // Query executed successfully
                    echo "Rating inserted successfully!";
                } else {
                    // Error in the query
                    echo "Error: " . $con->error;
                }

                $insertQuery->close(); // Close the prepared statement
            }

        } else {
            echo 'Error: No ratings data received.';
        }
    } else {
        echo 'Error: Submit button not set.';
    }
} else {
    // If the request method is not POST, handle it accordingly
    echo 'Error: Invalid request method.';
}
?>
