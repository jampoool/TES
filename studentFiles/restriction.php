<?php
include "../connect.php";
session_start();

try {
    // Assuming you have the studentID from the session
    $studentID = $_SESSION['studentID'];

    // Query to get the current class of the student
    $sqlStudentClass = "SELECT classID FROM tblstudentclasses WHERE studID = ?";
    $stmtStudentClass = $con->prepare($sqlStudentClass);
    $stmtStudentClass->bind_param('i', $studentID);
    $stmtStudentClass->execute();
    $resultStudentClass = $stmtStudentClass->get_result();

    if ($resultStudentClass->num_rows > 0) {
        $rowStudentClass = $resultStudentClass->fetch_assoc();
        $currentClass = $rowStudentClass['classID'];
    } else {
        // Handle the case when no matching row is found
        $currentClass = null;
    }

    // Query to get the class associated with the academic ID
    $academicID = $_SESSION['academicIDs'];
    $sqlAcademicClass = "SELECT classID FROM tblrestriction WHERE academicID = ?";
    $stmtAcademicClass = $con->prepare($sqlAcademicClass);
    $stmtAcademicClass->bind_param('i', $academicID);
    $stmtAcademicClass->execute();
    $resultAcademicClass = $stmtAcademicClass->get_result();

    if ($resultAcademicClass->num_rows > 0) {
        $rowAcademicClass = $resultAcademicClass->fetch_assoc();
        $academicClass = $rowAcademicClass['classID'];
    } else {
        // Handle the case when no matching row is found
        $academicClass = null;
    }

    // Query to get the academic status
    $sqlAcademicStatus = "SELECT status FROM tblacademic WHERE id = ?";
    $stmtAcademicStatus = $con->prepare($sqlAcademicStatus);
    $stmtAcademicStatus->bind_param('i', $academicID);
    $stmtAcademicStatus->execute();
    $resultAcademicStatus = $stmtAcademicStatus->get_result();

    if ($resultAcademicStatus->num_rows > 0) {
        $rowAcademicStatus = $resultAcademicStatus->fetch_assoc();
        $academicStatus = $rowAcademicStatus['status'];
    } else {
        // Handle the case when no matching row is found
        $academicStatus = 0;
    }

    echo json_encode([
        'academicStatus' => $academicStatus,
        'currentClass' => $currentClass,
        'academicClass' => $academicClass
    ]);
} catch (Exception $e) {
    // Log any exceptions that occur
    error_log("Exception in restriction.php: " . $e->getMessage());
    echo json_encode(['error' => 'An error occurred while processing your request.']);
}
?>
