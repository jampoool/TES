document.querySelector("#addAcademicYear").addEventListener("click", function() {
    document.querySelector(".popup").style.display = "block";
});

document.querySelector(".popup .close-btn").addEventListener("click", function() {
    document.querySelector(".popup").style.display = "none";
});

document.querySelector(".popup form").addEventListener("submit", function(event) {
    event.preventDefault();
    
    if (validateForm()) {
        document.querySelector(".popup").style.display = "none";
        // You can perform further actions like submitting the form or sending data to the server here
    }
});

function validateForm() {
    var academicYear = document.getElementById("academicYear").value;
    var semester = document.getElementById("semester").value;

    if (academicYear === "" || semester === "") {
        alert("Please fill out all fields");
        return false;
    }

    return true;
}

function validateForm() {
    var adminID = document.getElementById("adminID").value;
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    if (adminID === "" || username === "" || password === "") {
        alert("Please fill out all fields");
        return false;
    }

    return true;
}

new DataTable('#example');


