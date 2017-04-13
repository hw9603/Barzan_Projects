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

<div class = "container">
  <div class = "row">
    <div class = "col-lg-12">
      <h1>Current Projects</h1>
      <ul>
      <?php
        foreach ($projects as $projects_item)
        {
          if ($projects_item->past == 0)
          {
            echo '<li><a href = "#'.$projects_item->title .'"><b>'.$projects_item->title;
            echo '</b>';
            if ($projects_item->subtitle != null)
            {
              echo ' : ' .$projects_item->subtitle;
            }
            echo '</a></li><br>';
          }
        }
      ?>
      </ul>
      <h1>Past Projects</h1>
      <ul>
      <?php
        foreach ($projects as $projects_item)
        {
          if ($projects_item->past == 1)
          {
            echo '<li><a href = "#'.$projects_item->title .'"><b>'.$projects_item->title;
            echo '</b>';
            if ($projects_item->subtitle != null)
            {
              echo ' : ' .$projects_item->subtitle;
            }
            echo '</a></li><br>';
          }
        }
      ?>
      </ul>
        
      <?php
        foreach ($projects as $projects_item)
        {
          echo '<h2><p style="line-height: 200%; margin-bottom: 0;"> <a name = "' .$projects_item->title;
          if ($projects_item->website != null)
          {
            echo '"> <b><font size="6" face="Arial"> <a href="' .$projects_item->website .'">' .$projects_item->title;
          }
          else
          {
            echo '"> <b><font size="6" face="Arial"> <a href="#'.$projects_item->title .'">' .$projects_item->title;
          }
          echo '</a></font></b></a>';
          if ($projects_item->website != null)
          {
            echo '<div><a><font size="3" face="Arial"> <a href="' .$projects_item->website .'">' .$projects_item->subtitle.'</a></font></a></div></p></h2>';
          }
          else
          {
            echo '<div><a><font size="3" face="Arial"><a href="#'.$projects_item->title .'">' .$projects_item->subtitle .'</a></font></a></div></p></h2>';
          }
          if ($projects_item->website != null)
          {
            echo '<p><b><font size="3" face="Arial">Website: </font><a href="' .$projects_item->website .'">' .$projects_item->website .'</a></b></p>';
          }

          if ($projects_item->people != null)
          {
            echo '<p><b><font size="3" face="Arial">People: </font></b>' .$projects_item->people .'</p>';
          }

          if ($projects_item->picture != null)
          {
            echo '<div class=\'col-lg-12\'><div class= \'col-lg-3\'><img class=\'\' src="" style = \'border: 1px solid #787878; width:100%;\' /></div>';
            echo '<div class=\'col-lg-9\'><p>' .$projects_item->abstract;
            echo '</p><br>&nbsp;</div></div><br>';
          }
          else
          {
            echo '<div><p>' .$projects_item->abstract .'</p><br>&nbsp;</div>';
          }
          if ($projects_item->publication != null)
          {
            echo '<p> <b><font size="3" face ="Arial"> Publications: </font></b><br>';
            echo $projects_item->publication .'</p>';
          }
          echo '<br><br>';
        }
      ?>
    </div>
  </div>
</div>
</body>

</html>