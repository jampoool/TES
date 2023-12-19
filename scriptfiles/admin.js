document.querySelector("#addAdmin").addEventListener("click", function() {
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
    var adminID = document.getElementById("adminID").value;
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;

    if (adminID === "" || username === "" || password === "") {
        alert("Please fill out all fields");
        return false;
    }

    return true;
}

new DataTable('#example', {
    autoFill: true
});

let table = new DataTable('#example');

function del(delid) {
    if (confirm("Are you sure you want to delete the data?") == true) {
        window.location.href = "http://localhost/TES/adminFiles/admin.php?del=" + delid;
    } else {

    }
}