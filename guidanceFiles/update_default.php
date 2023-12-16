<?php
session_start(); // Start the session

include "../connect.php"; // Adjust the path based on your file structure

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $academicId = $_POST['id'];

    // Update existing rows to set 'is_Default' to 0
    $resetQuery = "UPDATE tblacademic SET is_Default = 0";
    $resetStmt = mysqli_prepare($con, $resetQuery);

    if ($resetStmt) {
        $resetResult = mysqli_stmt_execute($resetStmt);

        if (!$resetResult) {
            echo 'Error resetting values';
            mysqli_stmt_close($resetStmt);
            mysqli_close($con);
            exit;
        }

        mysqli_stmt_close($resetStmt);
    } else {
        echo 'Error preparing reset statement';
        mysqli_close($con);
        exit;
    }

    // Update the selected row to set 'is_Default' to 1
    $updateQuery = "UPDATE tblacademic SET is_Default = 1 WHERE id = ?";
    $stmt = mysqli_prepare($con, $updateQuery);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'i', $academicId);
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            // Store the academic ID in a session variable
            $_SESSION['defaultAcademicId'] = $academicId;

            echo 'Success'; // You can customize this message as needed
        } else {
            echo 'Error updating value';
        }

        mysqli_stmt_close($stmt);
    } else {
        echo 'Error preparing statement';
    }

    mysqli_close($con);
} else {
    echo 'Invalid request';
}
?>
