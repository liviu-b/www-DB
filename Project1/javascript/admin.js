$(".Conturi").click(function (event) {
    $("#right-add").css("display", "none");
    $('#right-products').css("display", "none");
    $("#right-acc").css("display", "initial");

});

$(".Add_produse").click(function (event) {
    $("#right-acc").css("display", "none");
    $('#right-products').css("display", "none");
    $("#right-add").css("display", "initial");
 
});

$(".Produse").click(function (event) {
    $("#right-acc").css("display", "none");
    $('#right-add').css("display", "none");
    $("#right-products").css("display", "initial");
 
});

function stergeProdus(){
    $("#right-acc").css("display", "none");
    $('#right-add').css("display", "none");
    $("#right-products").css("display", "initial");
    localStorage.setItem('showadmin', 'stergeP');
}
function AddProdus(){
    $("#right-acc").css("display", "none");
    $('#right-products').css("display", "none");
    $("#right-add").css("display", "initial");
    localStorage.setItem('showadmin', 'add');
}
$(document).ready(function(){
    var show = localStorage.getItem('showadmin');
    if(show === 'stergeP'){
        $("#right-acc").css("display", "none");
        $('#right-add').css("display", "none");
        $("#right-products").css("display", "initial");
     
        localStorage.removeItem('showadmin');
    }
    if(show === 'add'){
        $("#right-acc").css("display", "none");
        $('#right-products').css("display", "none");
        $("#right-add").css("display", "initial");
     
        localStorage.removeItem('showadmin');
    }
   
});

