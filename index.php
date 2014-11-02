<!DOCTYPE html>
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
	</head>
	<body>
<nav class="navbar navbar-fixed-top header">
  <div class = "container">
 	<div class="col-md-12">
        <div class="navbar-header">
          
          <a href="index.php" class="navbar-brand">Raju's Choice</a>
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
             <li><a href="#loginModal" role="button" data-toggle="modal">Login</a></li>
             <li><a href="#aboutModal" role="button" data-toggle="modal">About</a></li>
           </ul>
        </div>  
        </div>	
     </div>	
   </div>
</nav>

<!--main-->
<div class="container" id="main">
   <div class="row">
   <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading"><h4>About Raju's Choice</h4></div>
   			<div class="panel-body">
              <div class="list-group">
                <a href="http://bootply.com/tagged/modal" class="list-group-item">Raju and the Gang</a>
            </div>
   		</div>
	</div>
</div>

 
        
      
    </div><!--row-->
  </div><!--/main-->
    <div class="container">
      <h1>Search for an Artist</h1>
      <hr>
        <div id="results"></div>
        <div id="comments"></div>
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

<!--login modal-->
<div id="loginModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h2 class="text-center"><img src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100" class="img-circle"><br>Login</h2>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" action="main.php" method="post">
                <input class="form-control" placeholder="Username" name="username" type="text">
                <input class="form-control" placeholder="Password" name="password" type="text">
            
              <button type="submit" class="btn btn-primary btn-lg btn-block">Sign In</button>
              <span class="btn btn-warning btn-lg btn-block"><a style="color:white" href="register.php">Register</a></span> 
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
      </div>  
      </div>
  </div>
  </div>
</div>


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