<?php

try{

$m = new MongoClient(); // create a new mongo client
//global $db = $m->selectDB("login"); // select our database
$db = $m->login;
$collection = $db->mycol; //

echo "Connected to the mongodb server";

} 
catch (MongoConnectionException $e) {
  echo "Couldn't conect to the mongodb server";
}


if (isset($_POST['username']) && isset($_POST['password'])) 
{
    $document = array("username" => $_POST['username'],"password" => $_POST['password']);
    $collection->insert($document);
    header('Location: index.php');
}
else{

}

?>


<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="css/register.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>        
    <script src="js/bootstrap.min.js"></script>
        <script type="text/javascript">
        window.alert = function(){};
        var defaultCSS = document.getElementById('bootstrap-css');
        function changeCSS(css){
            if(css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="'+ css +'" type="text/css" />'); 
            else $('head > link').filter(':first').replaceWith(defaultCSS); 
        }
        $( document ).ready(function() {
          var iframe_height = parseInt($('html').height()); 
          // window.parent.postMessage( iframe_height, ORIGIN);
        });
    </script>
    </head>
            <script src="http://mymaplist.com/js/vendor/TweenLite.min.js"></script>
            <div class="container">
                <div class="row vertical-offset-100">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">                                
                                <div class="row-fluid user-row">
                                    <img src="1352239243390755342Blank%20CD.svg.med.png" class="img-responsive" alt="Conxole Admin"/>
                                </div>
                            </div>
                            <div class="panel-body">
                                <form accept-charset="UTF-8" action="register.php" method="post" role="form" class="form-signin">
                                    <fieldset>
                                        <label class="panel-login">
                                            <div class="login_result"></div>
                                        </label>
                                        <input class="form-control" placeholder="Username" name="username" type="text">
                                        <input class="form-control" placeholder="Password" name="password" type="password">
                                        <br></br>
                                        <input class="btn btn-lg btn-success btn-block" type="submit" id="login" value="Register">
                                    </fieldset>
                                </form>
             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src = "js/parralax.js"></script>
        