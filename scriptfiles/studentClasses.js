function setupPopup() {
    document.querySelector("#addStudentClass").addEventListener("click", function() {
        document.querySelector(".popup").classList.add("active");
    });
   
    document.querySelector(".popup .close-btn").addEventListener("click", function() {
        document.querySelector(".popup").classList.remove("active");
    });
  
    document.querySelector(".popup #add-btn").addEventListener("click", function() {
        document.querySelector(".popup").classList.remove("active");
    });
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