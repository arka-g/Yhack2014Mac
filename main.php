<?php
try{
$username = $_POST['username'];
$password = $_POST['password'];
$userfound = false;
error_reporting(0);
$m = new MongoClient(); // create a new mongo client
//global $db = $m->selectDB("login"); // select our database
$db = $m->login;
$collection = $db->mycol; //
$findUser = $collection->find();
echo "Connected to the mongodb server";


if (isset($_POST['username']) && isset($_POST['password'])) 
{
    
    foreach($findUser as $user){
            $storedUser = $user["username"]; 
            $storedPass = $user["password"];

            if ($username == $storedUser && $password == $storedPass){
                $userfound = true;
                break;
            } else{}

        }

    if ($userfound == false){
      header('Location: index.php');

    } else if ($userfound == true){
    } else{}

} else {}

  $findreal = $collection->find(array('username'=>$username));
  foreach ($findreal as $key) {
  //var_dump($key["value"]);  
  }
  $lastarr = $key["value"];

} catch (MongoConnectionException $e) {
  echo "Couldn't conect to the mongodb server";
}

?>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Music</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="css/styles.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/spotify.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>

	</head>
	<body>


<nav class="navbar navbar-fixed-top header">
  <div class = "container">
 	<div class="col-md-12">
        <div class="navbar-header">
          
          <a class="navbar-brand">Raju's Choice</a>
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse1">
          </button>
      
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse1">
          <form class="navbar-form pull-left" id = "search-form">
              <div class="input-group" style="max-width:470px;">
                <input type="text" class="form-control" placeholder="Search" name="srch-term" id="query">
                <div class="input-group-btn">
                  <button class="btn btn-default btn-primary" type="submit" id = "search" disabled>Search</button>
                </div>
              </div>
          </form>
        <div class="collapse navbar-collapse" id="navbar-collapse2">
          <ul class="nav navbar-nav navbar-right">
             <li class="active"><a href="#">Posts</a></li>
             <li><a role="button" data-toggle="modal"><?php echo $username ?> is logged in</a></li>
             <li><a href="#aboutModal" role="button" data-toggle="modal">About</a></li>
           </ul>
        </div>	
        </div>	
     </div>	
   </div>
</nav>

<div id = "usernamecurrent">
  <? echo $username?>
</div>

<!--main-->
<div class="container" id="main">
   <div class="row">
   <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-heading"><h4>Top Artist</h4></div>
   			<div class="panel-body">
              <div class="list-group">
                <div id = "artstuf_0" class="list-group-item" style="display:none"></div>
            </div>
   		</div>
	</div>
</div>

  <div class="col-md-4">
        <div class="panel panel-default">
           <div class="panel-heading"><h4>Liked Albums</h4>
           </div>

        <div class="panel-body">
              <div id="listgroup2">
                <div id = "stuff_0" class="list-group-item" style="display:none"></div>
             </div>
      </div> 
    </div>
    </div>

  <div class="col-md-4">
         <div class="panel panel-default">
           <div class="panel-heading"><h4>Liked Artists</h4>
           </div>
   			<div class="panel-body">
              <div class="list-group3">
                <div id = "artstuff_0" class="list-group-item" style="display:none"></div>
            </div>
        </div>
      </div>
  </div>
</div><!--row-->
  </div><!--/main-->

<div class="container">
      <h1>Search for an Artist</h1>
      <hr>
        <div id="results">
        </div>
        <div id= "comments" style = "display:none;">
          <ul>
          <li>dsad</li>
          </ul>
        </div>
    </div>
    


    <br>
    
    <div class="clearfix"></div>
    <div class = "container">
    <hr>
    <div class="col-md-12 text-center"><p>Website of Music</p></div>
    <hr>
  </div>
    
  </div>
</div><!--/main-->



<!--about modal-->
<div id="aboutModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="text-center">About</h2>
      </div>
      <div class="modal-body">
          <div class="col-md-12 text-center">
           By Kenny Dang
          </div>
      </div>
      <div class="modal-footer">
          <button class="btn" data-dismiss="modal" aria-hidden="true">OK</button>
      </div>
  </div>
  </div>
</div>

    <script>
      function Get(yourUrl){
        var Httpreq = new XMLHttpRequest(); // a new request
        Httpreq.open("GET",yourUrl,false);
        Httpreq.send(null);
        return Httpreq.responseText;
      }

      var ar = <?php echo json_encode($lastarr) ?>;
      console.log(ar);

      for(i = 0; i<ar.length;i++)
      {
          var json = "http://ws.spotify.com/lookup/1/.json?uri=spotify:album:"+ar[i];
          var json_obj = JSON.parse(Get(json));
          $fsf = json_obj.album.name;
          $art = json_obj.album.artist;
          //$("#listgroup2").append('<div>'+$(fsf)+'</div>');
          console.log($fsf);
           var d_id = i+1;
          $("<div class='list-group-item' id='stuff_"+d_id+"'>"+$fsf+"</div>").insertAfter("#stuff_"+i);
          $("<div class='list-group-item' id='artstuff_"+d_id+"'>"+$art+"</div>").insertAfter("#artstuff_"+i);
          $("<div class='list-group-item' id='artstuf_"+d_id+"'>"+$art+"</div>").insertAfter("#artstuf_"+i);

          // var d_i = i+1;
          // $("#stuff_0").replaceWith($("fsf"));
      }

    </script>

	<!-- script references -->
  <script id="results-template" type="text/x-handlebars-template">
        {{#each albums.items}}
          <div style="background-image:url({{images.0.url}})" id="album" value="{{id}}" data-album-id="{{id}}" class="cover"></div> 
        {{/each}}
    </script>
 

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <script type="text/javascript" language="javascript" src="http://cdnjs.cloudflare.com/ajax/libs/handlebars.js/2.0.0/handlebars.min.js"></script>
    <script type="text/javascript" language="javascript" src="js/spotify.js"></script>
    <script type="text/javascript" language="javascript" src="js/albumPage.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
	</body>
</html>