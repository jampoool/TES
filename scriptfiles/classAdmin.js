function setupPopup() {
  document.querySelector("#addClass").addEventListener("click", function() {
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
  document.querySelector("#editbtn").addEventListener("click", function(event) {

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
      window.location.href = "http://localhost/TES/adminFiles/class.php?del=" + delid;
  } else {

  }
}