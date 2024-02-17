
function open_dashbord() {
    document.getElementById('dashbord').style.display = "block";
    document.getElementById('product_manage').style.display = "none";
    document.getElementById('category_manage').style.display = "none";
    document.getElementById('user_manage').style.display = "none";
}

function open_product() {
    document.getElementById('product_manage').style.display = "block";
    document.getElementById('dashbord').style.display = "none";
    document.getElementById('user_manage').style.display = "none";
    document.getElementById('category_manage').style.display = "none";

}

function open_category()
{
    document.getElementById('category_manage').style.display = "block";
    document.getElementById('product_manage').style.display = "none";
    document.getElementById('user_manage').style.display = "none";
    document.getElementById('dashbord').style.display = "none";
}

function open_user(){
    document.getElementById('user_manage').style.display = "block";
    document.getElementById('category_manage').style.display = "none";
    document.getElementById('product_manage').style.display = "none";
    document.getElementById('dashbord').style.display = "none";
}


let modal = document.getElementById("myModal");
let modal_category = document.getElementById("myModal_category");

// Get the button that opens the modal
let btn = document.getElementById("myBtn");
let btn_category = document.getElementById("myBtn_category");

// Get the <span> element that closes the modal
let span = document.getElementsByClassName("close")[0];
let span_category = document.getElementById("category_span");

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}


btn_category.onclick = function() {
    modal_category.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}


span_category.onclick = function() {
    modal_category.style.display = "none";
}



window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }

    if (event.target == modal_category) {
        modal_category.style.display = "none";
    }

    if (event.target == modal_serch) {
        modal_serch.style.display = "none";
    }
}