$(document).ready(function () {
    $(".menuUp").click(function () {
        $(".drop").css({"display": "flex"});
        $(".menuDown").css({"display": "block"});
        $(".menuUp").css({"display": "none"});
    });
    $(".menuDown").click(function () {
        $(".drop").css({"display": "none"});
        $(".menuDown").css({"display": "none"});
        $(".menuUp").css({"display": "block"});
    });
}); 