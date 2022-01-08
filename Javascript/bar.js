function swtich_bar_visibility()
{
    var bar = document.getElementById("bar_nav_vertical");

    if (bar.style.visibility == "hidden") bar.style.visibility = "visible";
    else bar.style.visibility = "hidden";
}