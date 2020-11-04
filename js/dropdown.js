function archive() 
{
  document.getElementById("archive").classList.toggle("show");
}
function incident1() 
{
  document.getElementById("incident1").classList.toggle("show");
}
function incident2() 
{
  document.getElementById("incident2").classList.toggle("show");
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