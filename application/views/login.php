<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>

    <!-- Bootstrap core CSS -->
    <script src="/bs/jquery/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/bs/css/bootstrap.min.css">
    <script src="/bs/js/bootstrap.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="/bs/barzan_style/moz_css.css" rel="stylesheet">
    <script src="/bs/js/main.js"></script>
    <script src="/bs/js/ajax.js"></script>
    <script>
    function emptyElement(x){
        _(x).style.visibility = "hidden";
    }
    function login(){
        var i = _("id").value;
        var p = _("password").value;
        if(i =="" || p == ""){
            _("errorBox").style.visibility = "visible";
            _("errorBox").innerHTML = "Enter both id and password";
            
        } else {
            _("loginBttn").style.visibility = "hidden";
            var ajax = ajaxObj("POST", "login.php");
            ajax.onreadystatechange = function() {
                if(ajaxReturn(ajax) == true) {
                    if(ajax.responseText == "login_failed"){
                        _("errorBox").style.visibility = "visible";
                        _("errorBox").innerHTML = "Wrong Login Info";
                        _("loginBttn").style.visibility = "visible";
                    } else {
                        window.location = "projects.php?u="+ajax.responseText;
                    }
                }
            }
            ajax.send("i="+i+"&p="+p);
        }
    }
    </script>
    <style type="text/css">
    .msgBox {
        visibility: hidden;
    }
    #loginBttn > font:hover{
        color: white;
    }
    </style>
</head>

<body>
<nav id="msbnav" class="navbar navbar-inverse navbar-default" role="navigation" style="background-color: #7D0612; border-radius:0"> 
    <div class="container">
        <div class="navbar-header"> 
            <a class="navbar-brand" href="http://web.eecs.umich.edu/~mozafari/">Barzan Mozafari</a>
        </div> 
        <div class="navbar-header">
            <span class="navbar-brand" style="padding-left:0; padding-right:0">&nbsp;&middot;&nbsp;</span>
        </div>
        <div class="navbar-header"> 
            <a class="navbar-brand" href="http://umich.edu/">University Of Michigan</a>
        </div> 
        <div class="navbar-header">
            <span class="navbar-brand" style="padding-left:0; padding-right:0">&nbsp;&middot;&nbsp;</span>
        </div>
        <div class="navbar-header"> 
            <a class="navbar-brand" href="http://www.eecs.umich.edu/db/">Database Systems</a>
        </div>
        <div> 
            <ul class="nav navbar-nav">
                <li class="dropdown"> 
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <b class="caret"></b></a> 
                    <ul class="dropdown-menu">
                        <li><a href="http://web.eecs.umich.edu/~mozafari/">Home</a></li><li><a href="/home">List of Projects</a></li><li><a href="/publication">List of Publications</a></li><li class="divider"></li><li><a href="/manage" style="font-weight: 300;">Login</a></li>                  </ul> 
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="row" style="padding-top:10%;">
        <form action="/login/test?url= <?php echo $url; ?>" class="form-signin" method="post" accept-charset="utf-8">
            <div class="form-group" style="width:30%; margin: 0 auto;">
            <label for="inputID" class="sr-only">User ID</label>
                <input class="form-control" name="username" type="text" id="id" placeholder="ID" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
                <input class="form-control" name="password" type="password" id="password" placeholder="PASSWORD" required>
            </div>
            <br>
            <div class="form-group" style="width: 30%; margin: 0 auto;">
                <button id = "loginBttn" class="btn btn-lg" type="submit" href="#" style="width:100%;"><font>L O G I N</font></button>
            </div>
            <div class="alert alert-danger alert-dismissible msgBox" id="errorBox" role="alert"></div>
            <div class="alert alert-success alert-dismissible msgBox" id="successBox" role="alert"></div>
        </form>
    </div>
</div>

<div class="container-fluid">
        
</div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!--Placeholder compatibility with IE-->
<script type='text/javascript' src='js/jquery.html5-placeholder-shim.js'></script>

<script src="js/bootstrap.min.js"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

</body>
</html>
