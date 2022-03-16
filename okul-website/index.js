let contact = document.getElementById("contact");
let mevcutDurum = document.getElementById("mevcut");
let ulasim = document.getElementById("ulasim");
let school = document.getElementById("school");

mevcutDurum.addEventListener("click", function(e){

    document.querySelector(".mevcut-durum").classList.remove("d-none");
    document.querySelector(".mevcut-durum").classList.add("d-grid");
    
    document.querySelector(".contact-table").classList.remove("d-block");
    document.querySelector(".contact-table").classList.add("d-none");

    document.querySelector(".ulasim").classList.remove("d-block");
    document.querySelector(".ulasim").classList.add("d-none");

    document.querySelector(".okul-table").classList.remove("d-block");
    document.querySelector(".okul-table").classList.add("d-none");

    e.preventDefault();
});

ulasim.addEventListener("click", function(e){

    document.querySelector(".ulasim").classList.remove("d-none");
    document.querySelector(".ulasim").classList.add("d-block");

    document.querySelector(".okul-table").classList.remove("d-block");
    document.querySelector(".okul-table").classList.add("d-none");

    document.querySelector(".contact-table").classList.remove("d-block");
    document.querySelector(".contact-table").classList.add("d-none");

    document.querySelector(".mevcut-durum").classList.remove("d-grid");
    document.querySelector(".mevcut-durum").classList.add("d-none");

    e.preventDefault();
});

school.addEventListener("click",function(e){

    document.querySelector(".okul-table").classList.remove("d-none");
    document.querySelector(".okul-table").classList.add("d-block");

    document.querySelector(".ulasim").classList.remove("d-block");
    document.querySelector(".ulasim").classList.add("d-none");

    document.querySelector(".contact-table").classList.remove("d-block");
    document.querySelector(".contact-table").classList.add("d-none");

    document.querySelector(".mevcut-durum").classList.remove("d-grid");
    document.querySelector(".mevcut-durum").classList.add("d-none");

    e.preventDefault();
});


contact.addEventListener("click", function (e){

    document.querySelector(".contact-table").classList.remove("d-none");
    document.querySelector(".contact-table").classList.add("d-block");

    document.querySelector(".mevcut-durum").classList.remove("d-grid");
    document.querySelector(".mevcut-durum").classList.add("d-none");

    document.querySelector(".okul-table").classList.remove("d-block");
    document.querySelector(".okul-table").classList.add("d-none");

    document.querySelector(".ulasim").classList.remove("d-block");
    document.querySelector(".ulasim").classList.add("d-none");
    

    e.preventDefault();    
});



// function createItem(text){
//     let li = document.createElement("li");
//     li.className = "links";
//     li.appendChild(document.createTextNode(text));
// }

// function addNewItem(e){
//     if(confirm.value === ""){
//         alert ("Add New Task");
//     }

//     createItem(confirm.value);
// }

