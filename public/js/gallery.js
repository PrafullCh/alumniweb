
// Code By Webdevtrick ( https://webdevtrick.com )
$(document).ready(function () {
  $(".single-image").click(function(){
    var t = $(this).attr("src");
    $(".modal-body").html("<img src='"+t+"' class='modal-img' id='image-in-modal'>");
    $("#myModal").modal();
    
  });
});
