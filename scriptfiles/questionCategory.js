document.querySelector("#addQuestionCategory").addEventListener("click", function() {
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
    var categoryname = document.getElementById("categoryname").value;
    var description = document.getElementById("description").value;

    if (categoryname === "" || description === "") {
        alert("Please fill out all fields");
        return false;
    }

    return true;
}

new DataTable('#example');

function del(delid) {
    if (confirm("Are you sure you want to delete the data?") == true) {
        window.location.href = "http://localhost/TES/guidanceFiles/questioncategory.php?del=" + delid;
    } else {
  
    }
  }