function setupPopup() {
    var addAdminButton = document.querySelector("#addAdmin");
    var popupElement = document.querySelector(".popup");
    var closeButton = document.querySelector(".popup .close-btn");
    var formElement = document.querySelector(".popup form");

    if (addAdminButton && popupElement && closeButton && formElement) {
        addAdminButton.addEventListener("click", function() {
            popupElement.style.display = "block";
        });

        closeButton.addEventListener("click", function() {
            popupElement.style.display = "none";
        });

        formElement.addEventListener("submit", function(event) {
            event.preventDefault();

            if (validateForm()) {
                popupElement.style.display = "none";
                // You can perform further actions like submitting the form or sending data to the server here
            }
        });
    } else {
        console.error("One or more elements not found. Check your HTML or class names.");
    }
}

document.addEventListener("DOMContentLoaded", setupPopup);
function editPopup(){
  document.querySelector("#updatebtn").addEventListener("click", function(event) {

    document.querySelector(".popup").classList.add("active");

  });
  document.querySelector(".popup .close-btn").addEventListener("click", function() {
    document.querySelector(".popup").classList.remove("active");
});

document.querySelector(".popup #add-btn").addEventListener("click", function() {
    document.querySelector(".popup").classList.remove("active");
});
}
document.addEventListener("DOMContentLoaded", editPopup);

new DataTable('#example');

function del(delid) {
    if (confirm("Are you sure you want to delete the data?") == true) {
        window.location.href = "http://localhost/TES/adminFiles/student-class.php?del=" + delid;
    } else {

    }
}