<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>

  <title>Barzan Mozafari&thinsp;&middot;&thinsp;Publications</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Barzan Mozafari is an Assistant Professor of Computer Science and Engineering at the University of Michigan. He studies databases, distributed systems, and large-scale data-intensive systems.">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Bootstrap -->
    <script src="/bs/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="/bs/css/bootstrap.min.css" media = "screen">
    <script src="/bs/js/bootstrap.min.js"></script>
    <!-- Bootstrap Core CSS-->
    <link href="/bs/barzan_style/moz_css.css" rel="stylesheet">
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style type="text/css">
      a {
        color: #7D0612;
      }
      #msbnav > div > div > a, #msbnav > div > div > span {
        font-size: 32px;
        font-family: "Lato",'Helvetica Neue',Helvetica,Arial,sans-serif;
        color: #DCDCDC;
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
            <li>
              <a href="http://web.eecs.umich.edu/~mozafari/">Home</a>
            </li>
            <li>
              <a href="/home">List of Projects</a>
            </li>
            <li>
              <a href="/publication">List of Publications</a>
            </li>
            <li class="divider">
            </li>
            <li>
              <a href="/manage" style="font-weight: 300;">Login</a>
            </li>          
          </ul> 
        </li>
      </ul>
    </div>
  </div>
</nav>


    <div class="container">    
        <div class="row">
            <div class="col-sm-10">
              <table class="table publication" id="publication" style="margin-top: 15px;">
              <thead>
              <tr><th>Publications</th></tr>
              <tr><th></th></tr>
              </thead>

              <?php
                foreach($publication as $publication_item)
                {
                  echo '<tr id=\'' .$publication_item->year .'\'>';
                  echo '<td><a href=\'' .$publication_item->article_link .'\'>';
                  echo '<img class=\'paperimage\' src=\'' .$publication_item->image_link .'\'/></a></td>';
                  echo '<td><a href=\'' .$publication_item->article_link .'\'>' .$publication_item->article_title .'</a><br/>';
                  echo $publication_item->people .'<br/>';
                  echo '<i>' .$publication_item->publisher .'</i>, ';
                  echo $publication_item->date .', ' .$publication_item->year .'<br/>';
                  echo '<div style=\'float:right;\'></div><td></tr>';
                }
              ?>

              </table>
            </div>
            <div class="col-sm-2 sidenav">
                <ul id="yearnav" class="nav nav nav-list affix">
                  <li><a href="#2017">2017</a></li>
                  <li><a href="#2016">2016</a></li>
                  <li><a href="#2015">2015</a></li>
                  <li><a href="#2014">2014</a></li>
                  <li><a href="#2013">2013</a></li>
                  <li><a href="#2012">2012</a></li>
                  <li><a href="#2011">2011</a></li>
                  <li><a href="#2010">2010</a></li>
                  <li><a href="#2009">2009</a></li>
                  <li><a href="#2008">2008</a></li>
                  <li><a href="#2007">2007</a></li>
                  <li><a href="#2006">2006</a></li>                 
                </ul>
            </div> <!-- /span3 --> 
        </div> <!-- /row -->
    </div> <!-- /container -->  




    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <script type="text/javascript">
      var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-35737485-1']);
      _gaq.push(['_trackPageview']);
    
      (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      })();
    </script>

</body>

</html>