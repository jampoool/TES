// Function to get student and academic information from the server
function getStudentInfoFromServer() {
    // Make an AJAX request to the server
    $.ajax({
        url: 'restriction.php', // Replace with the actual path to your PHP script
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            // Assuming your PHP script returns data in JSON format
            academicStatus = data.academicStatus;
            currentClass = data.currentClass;
            academicClass = data.academicClass;

            // Now you have the updated values, you can proceed with your logic
            fillOutFormFunction();
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
