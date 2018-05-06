$(".news-container").find("img").each(function(){
    var src = "http://epico.dk" + $(this).attr("src");
    $(this).attr("src", src);
});