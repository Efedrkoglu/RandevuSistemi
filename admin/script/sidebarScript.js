const togglebtn = document.querySelector("#toggle-btn");

togglebtn.addEventListener("click", function(){
    document.querySelector("#sidebar").classList.toggle("expand");
});