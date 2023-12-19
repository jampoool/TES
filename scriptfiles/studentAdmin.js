document.addEventListener("DOMContentLoaded", function () {
    document.querySelector("#addStudent").addEventListener("click", function () {
        console.log("Modal opened");
        var popup = document.querySelector(".popup");
        popup.style.display = "block";
        popup.classList.add("active");
    });

    document.querySelector(".popup .close-btn").addEventListener("click", function () {
        console.log("Modal closed");
        document.querySelector(".popup").style.display = "none";
    });

    document.querySelector(".popup form").addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent the default form submission behavior

        var studentIDInput = document.getElementById("studentID");
        var firstnameInput = document.getElementById("firstname");
        var lastnameInput = document.getElementById("lastname");
        var emailInput = document.getElementById("email");
        var passwordInput = document.getElementById("password");

        if (
            studentIDInput.value.trim() === "" ||
            firstnameInput.value.trim() === "" ||
            lastnameInput.value.trim() === "" ||
            emailInput.value.trim() === "" ||
            passwordInput.value.trim() === ""
        ) {
            showAlert("Please fill out all fields", "error");
        } else {
            console.log("Form submitted");

            // Capture the form data
            var formData = new FormData();
            formData.append('studentID', studentIDInput.value);
            formData.append('firstname', firstnameInput.value);
            formData.append('lastname', lastnameInput.value);
            formData.append('email', emailInput.value);
            formData.append('password', passwordInput.value);

            submitForm(formData); // Submit the form asynchronously using AJAX
        }
    });

    new DataTable("#example", {
        autoFill: true,
    });
});

function showAlert(message, type) {
    Swal.fire({
        text: message,
        icon: type,
        position: 'top-right',
        showConfirmButton: false,
        timer: 2000, // 2 seconds
    });
}

function showSuccessNotification() {
    showAlert("Data inserted successfully", "success");
    setTimeout(function () {
        location.reload();
    }, 2000); // Adjust the delay time as needed
}

function submitForm(formData) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "student.php", true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                console.log(xhr.responseText); // Log the server response

                // Optionally, handle the response and perform additional actions
                // (e.g., show additional notifications, update UI, etc.)

                // Close the modal
                document.querySelector(".popup").style.display = "none";

                // Show success notification
                showSuccessNotification();
            } else {
                // Handle errors or display additional messages as needed
                showAlert("Error submitting form", "error");
            }
        }
    };

    xhr.send(formData);
}

function del(delid) {
    if (confirm("Are you sure you want to delete the data?") == true) {
        window.location.href = "http://localhost/TES/adminFiles/student.php?del=" + delid;
    } else {

    }
}
