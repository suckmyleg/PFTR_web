function swtich_bar_visibility()
{
    var bar = document.getElementById("bar_nav_vertical");

    if (bar.style.visibility == "hidden") {bar.style.visibility = "visible"; document.getElementById("div_bar_visible").style.visibility = "visible";}
    else {bar.style.visibility = "hidden"; document.getElementById("div_bar_visible").style.visibility = "hidden";}
}

function hide_bar()
{
    var bar = document.getElementById("bar_nav_vertical");
    if(bar.style.visibility == "visible") {bar.style.visibility = "hidden"; document.getElementById("div_bar_visible").style.visibility = "hidden";}
}