document.addEventListener("DOMContentLoaded", function() {
    function studentDashboardFunction() {
        document.getElementById("myframe").src = "../studentFiles/studentDashboard.php";
    }
    
    function fillOutFormFunction(academicStatus, currentClass, academicClass) {
        console.log("Fill Out Form Function Called");
        console.log("Academic Status:", academicStatus);
        console.log("Current Class:", currentClass);
        console.log("Academic Class:", academicClass);
    
        // Your existing logic for fillOutFormFunction
        if (academicStatus === 0) {
            alert("Evaluation has not yet started. Cannot proceed.");
        } else if (academicStatus === 1) {
                document.getElementById("myframe").src ="../studentFiles/fillOutForm.php";
        } else if (academicStatus === 2) {
            alert("Evaluation is already closed. Cannot proceed.");
        } else {
            console.log("Unknown academic status. Cannot proceed.");
        }
    }
    
    
    // Function to get student and academic information from the server
    // Function to get student and academic information from the server
    function getStudentInfoFromServer() {
        // Make an AJAX request to the server
        $.ajax({
            url: 'restriction.php',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                // Update the variables with the received data
                academicStatus = data.academicStatus;
                currentClass = data.currentClass;
                academicClass = data.academicClass;
    
                // Now you have the updated values, you can proceed with your logic
                console.log("Academic Status:", academicStatus);
                console.log("Current Class:", currentClass);
                console.log("Academic Class:", academicClass);
    
                fillOutFormFunction(academicStatus, currentClass, academicClass);
            },
            error: function (xhr, status, error) {
                console.error("AJAX request failed:", status, error);
                // Log the actual response for debugging
                console.log("Response from the server:", xhr.responseText);
                // Handle errors as needed
            }
        });
    }
    
    // Load student and academic information when the page loads
    window.onload = function () {
        getStudentInfoFromServer();
    };
    
    });