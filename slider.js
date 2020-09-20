var number = Math.floor(Math.random()*5)+1;
function changeSlide()
{
    number++;
    if(number>6)number=1;
    var file = "<img src=\"slides/s"+number+".jpg\"/>";
    document.getElementById("slider").innerHTML = file;
    $("#slider").fadeIn(500);
    setTimeout("changeSlide()", 5000);
    setTimeout("hide()", 4500);
}