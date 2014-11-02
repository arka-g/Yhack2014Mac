// find template and compile it
var templateSource = document.getElementById('results-template').innerHTML,
    template = Handlebars.compile(templateSource),
    resultsPlaceholder = document.getElementById('results'),
    commentsPlaceholder = document.getElementById('comments'),
    topalbumsPlaceholder =document.getElementById('listgroup2'),
    playingCssClass = 'playing',
    audioObject = null;

var fetchTracks = function (albumId, callback) {
    $.ajax({
        url: 'https://api.spotify.com/v1/albums/' + albumId,
        success: function (response) {
            callback(response);
        }
    });
};

var searchAlbums = function (query) {
    $.ajax({
        url: 'https://api.spotify.com/v1/search',
        data: {
            q: query,
            type: 'album'
        },
        success: function (response) {
            resultsPlaceholder.innerHTML = template(response);
        }
    });
};

// var postLikes = function(query){
//     $.ajax({
//         type: "GET"
//     })
// };
// function getJSONP(url, success) {
//     var ud = '_' + +new Date,
//         script = document.createElement('script'),
//         head = document.getElementsByTagName('head')[0] 
//                || document.documentElement;
//     window[ud] = function(data) {
//         head.removeChild(script);
//         success && success(data);
//     };
//     script.src = url.replace('callback=?', 'callback=' + ud);
//     head.appendChild(script);
// }

function Get(yourUrl){
    var Httpreq = new XMLHttpRequest(); // a new request
    Httpreq.open("GET",yourUrl,false);
    Httpreq.send(null);
    return Httpreq.responseText;
    }

results.addEventListener('click', function(e) {
    var target = e.target;
    var albumBox = document.getElementById('album_page');
    if (target !== null && target.classList.contains('cover')) {
        resultsPlaceholder.innerHTML = "";
        resultsPlaceholder.setAttribute('style',"width: 100%; overflow: hidden;")
        var albumBox = document.createElement('div');
        albumBox.className = 'cover';
        resultsPlaceholder.appendChild(albumBox);
        albumBox.setAttribute('style', target.getAttribute('style'));
        albumBox.style.float = "left";
        albumBox.setAttribute('value', target.getAttribute('value'));
        albumBox.setAttribute('id', 'albuminfo');
        var artistInfo = document.createElement('div');
        artistInfo.className = 'artistInfo';
        resultsPlaceholder.appendChild(artistInfo);

        var json = "http://ws.spotify.com/lookup/1/.json?uri=spotify:album:"+target.getAttribute("value");
        console.log(json);
        var json_obj = JSON.parse(Get(json));
        artistInfo.innerHTML = "<b>"+json_obj.album.name+"</b><br>"+json_obj.album.artist+"<br><br>"+"****/5 Star Rating<br><br>";
        $('.artistInfo', '#results').append("<input type='button' class='like-btn' value='Like' onClick=likePost()>");
        $('#comments').css('display','block');

        // console.log("this is the author name: "+json_obj.album.name);
    }
});
function likedAlbum(arr){
    for(i = 0; i<arr.length;i++){
        var json = "http://ws.spotify.com/lookup/1/.json?uri=spotify:album:"+arr[i];
        $fsf = json_obj.album.name;
        $("#listgroup2").append('<div>'+$(fsf)+'</div>');
    }

}

function likePost(value){
    var  x = $('#albuminfo').attr('value');
    var username = document.getElementById('usernamecurrent').innerHTML;
    var moduser = username.replace(/\s+/g, '');
    window.location.href="like-post.php?y="+x+username;
}

var comments = document.createElement('div');
    comments.className = 'cover';
    comments.innerHTML = "OMG DIS ALBUM IZ AWESOME";

$("input#query").keyup(function(e) {
        // Set Timeout
    clearTimeout($.data(this, 'timer'));

    // Set Search String
    e.preventDefault();
    searchAlbums(document.getElementById('query').value);

    // Do Search
    if (searchAlbums == '') {
        // Do nothing
    }else{
        $(this).data('timer', setTimeout(searchAlbums
            , 100));
    };
});