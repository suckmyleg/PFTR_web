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