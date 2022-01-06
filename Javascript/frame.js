function go(frame_id, url)
{
    var frame = document.getElementById(frame_id);

    frame.src = url;
}

function finish_reloading_frame(frame_id, container)
{
    frame.src = frame.src;
}

function reload_frame(frame_id)
{
    //var container = document.getElementById(frame_id + "_container");
    var frame = document.getElementById(frame_id);

    //frame.id = "REMOVE";

    //container.innerHTML += ""

    frame.src = frame.src;

    //document.querySelector("iframe").addEventListener( "load", finish_reloading_frame(frame_id, container));
}


//https://www.tutorialspoint.com/javascript-sleep-function
function sleep(ms) {
      return new Promise(resolve => setTimeout(resolve, ms));
}

async function auto_reload_frame(frame_id, delay)
{
    while (true)
    {
        try
        {
            await sleep(delay*1000);
            reload_frame(frame_id);
        }
        catch
        {
        return;
        }
    }
}

function clear_nav(nav_id="nav")
{
    document.getElementById(nav_id).innerHTML = "";
}

// https://www.w3schools.com/js/js_random.asp
function getRndInteger(min, max) {
  return Math.floor(Math.random() * (max - min + 1) ) + min;
}

function create_search_bar(nav_id="nav", search_bar_id, button_id, frame_url, frame_id=false)
{
    var button_bar = document.getElementById(button_id);

    var frame_id = create_new_frame("nav", frame_url, frame_id);

    // https://stackoverflow.com/questions/20941160/javascript-document-getelementbyid-with-onclick
    button_bar.onclick = function (){
    console.log(nav_id);
    var url = document.getElementById(search_bar_id).value;
    go(frame_id, frame_url + url);
    };
}

function create_new_frame(nav_id="nav", frame_url="", frame_id=false)
{
    if (!frame_id){
        frame_id = getRndInteger(0, 10000000) + "_frame"
    }

    var nav = document.getElementById(nav_id);

    nav.innerHTML += '<div id="frame_container"><iframe id="'+frame_id+'" scrolling="no" src="'+frame_url+'"></iframe></div>';

    return frame_id;
}