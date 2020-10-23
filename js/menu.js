function smartMenu() 
{
    document.getElementById("menu").classList.toggle("show");
}
window.onclick = function(event)
{
  if (!event.target.matches('#dropButton')) 
  {
    var dropdowns = document.getElementsByClassName("tabs");
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