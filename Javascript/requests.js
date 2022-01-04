// https://livecodestream.dev/post/5-ways-to-make-http-requests-in-javascript/

function reload(match_id, on_load)
{
    //create XMLHttpRequest object
    const xhr = new XMLHttpRequest()
    //open a get request with the remote server URL
    xhr.open("GET", "pftr.ddns.net:8080/PFTR_web/api.php?command=match_players_data&match_id=" + match_id)
    //send the Http request
    xhr.send()

    //EVENT HANDLERS

    //triggered when the response is completed
    xhr.onload = function() {
      if (xhr.status === 200) {
        on_load(data);
      } else if (xhr.status === 404) {
        console.log("No records found")
      }
    }

    //triggered when a network-level error occurs with the request
    xhr.onerror = function() {
      console.log("Network error occurred")
    }

    //triggered periodically as the client receives data
    //used to monitor the progress of the request
    xhr.onprogress = function(e) {
      if (e.lengthComputable) {
        console.log(`${e.loaded} B of ${e.total} B loaded!`)
      } else {
        console.log(`${e.loaded} B loaded!`)
      }
    }
}

