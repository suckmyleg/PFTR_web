function go(frame_id, url)
{
    var frame = document.getElementById(frame_id);

    frame.src = url;
}

function go_search_bar(search_bar_id, url, frame_id)
{
    var search_bar = document.getElementById(search_bar_id);

    go(frame_id, url + search_bar.innerHTML);
}

function reload_frame(frame_id)
{
    var frame = document.getElementById(frame_id);
    frame.src = frame.src;
}


//https://www.tutorialspoint.com/javascript-sleep-function
function sleep(ms) {
      return new Promise(resolve => setTimeout(resolve, ms));
}

async function auto_reload_frame(frame_id, delay)
{
    while (true)
    {
        reload_frame(frame_id);
        await sleep(delay*1000);
    }
}