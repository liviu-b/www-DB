

$(".Produse").click(function (event) {
    $(".cart").css("display", "none");
    $(".products").css("display", "initial");

});

$(".Cosul").click(function (event) {
    $(".products").css("display", "none");
    $(".cart").css("display", "initial");

});


function PaginaProduse(){
    $(".cart").css("display", "none");
    $(".products").css("display", "initial");
}

function showTable() {
  
    $(".products").css("display", "initial");
    localStorage.setItem('show', 'produse'); //store state in localStorage
}

function comanda(){
    
    $(".cart").css("display", "initial");
    localStorage.setItem('show', 'comanda');
}
function StayOnContact(){
 
    $(".content-contact").css("display", "initial");
    localStorage.setItem('show', 'contact');
}
function ContDiv(){  

    $(".account").css("display", "initial");
    localStorage.setItem('show', 'cont');
}

$(document).ready(function(){
    $(".products").css("display", "initial");
    // var show = localStorage.getItem('show');
    // if(show === 'produse'){
       
    //     $(".products").css("display", "initial");
    //     localStorage.removeItem('show');
    // }
    // if(show === 'comanda'){

    //     $(".cart").css("display", "initial");
    //     localStorage.removeItem('show');
    // }
   
});

