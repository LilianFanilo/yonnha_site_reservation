$(document).ready(function(){
    $("#myButton").click(function(){
    var x = $("#myInput");
    if (x.attr("type") === "password") {
    x.attr("type", "text");
    } else {
    x.attr("type", "password");
    }
    });
    });
