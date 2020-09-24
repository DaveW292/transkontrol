function smartMenu() 
{
    document.getElementById("dropdownTabs").classList.toggle("show");
}
function smartMenu2() 
{
    document.getElementById("dropdownLangs").classList.toggle("show");
}
window.onclick = function(event) 
{
  if (!event.target.matches('.dropbtn')) 
  {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) 
    {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) 
      {
        openDropdown.classList.remove('show');
      }
    }
  }
} 
var number = Math.floor(Math.random()*5)+1;
var timer1 = 0;
var timer2 = 0;
function changeSlide()
{
    number++;
    if(number>6)number=1;
    var file = "<img src=\"slides/s"+number+".jpg\"/>";
    document.getElementById("slider").innerHTML = file;
    $("#slider").fadeIn(500);
    timer1 = setTimeout("changeSlide()", 5000);
    timer2 = setTimeout("hide()", 4500);
}
function hide()
{
    $("#slider").fadeOut(500);
}
function setSlide(slideNr)
{
    clearTimeout(timer1);
    clearTimeout(timer2);
    number = slideNr-1;
    hide();
    setTimeout("changeSlide()", 500);
}