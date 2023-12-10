document.querySelector("#addEvaluationForm").addEventListener("click", function() {
    document.querySelector(".popup").classList.add("active");
});
document.querySelector(".popup .close-btn").addEventListener("click", function() {
    document.querySelector(".popup").classList.remove("active");
});
document.querySelector(".popup #add-btn").addEventListener("click", function() {
    document.querySelector(".popup").classList.remove("active");
});

new DataTable('#example');