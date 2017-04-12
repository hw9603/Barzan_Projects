<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>

  <title> Manage Page </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Bootstrap -->
    <script src="/bs/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="/bs/css/bootstrap.min.css">
    <script src="/bs/js/bootstrap.min.js"></script>

    <!-- Editor -->
		<link href="/bs/barzan_style/moz_css.css" rel="stylesheet">
		<link rel="stylesheet" href="/editor/themes/default/default.css" />
		<script charset="utf-8" src="/editor/kindeditor-min.js"></script>
		<script charset="utf-8" src="/editor/lang/en.js"></script>
		<script>
			var editor;
			var editor2;
			var pid = -1;
			KindEditor.ready(function(K) {
				editor = K.create('textarea[name="editor"]', {
					allowFileManager : true,
					width : '100%',
					items : [
						'source', '|', 'undo', 'redo', '|', 'preview', 'print', 'code', 'cut', 'copy', 'paste',
    				    'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
   					     'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
   					     'superscript', 'clearhtml', '/',
   					     'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
   					     'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image', 'multiimage',
   					     'table', 'hr', 'emoticons', 'baidumap', 'link', 'unlink'
						],
					afterCreate : function() { 
						var self = this;
						K.ctrl(document, 13, function() {
							K('button[id=getHtml]').click();
						});
						K.ctrl(self.edit.doc, 13, function() {
							K('button[id=getHtml]').click();
						});
						K.ctrl(document, 'q', function() {
							K('button[name=clear]').click();
						});
						K.ctrl(self.edit.doc, 'q', function() {
							K('button[name=clear]').click();
						});
						K.ctrl(document, 'w', function() {
							K('button[name=update]').click();
						});
						K.ctrl(self.edit.doc, 'w', function() {
							K('button[name=update]').click();
						});
					}
				});
				editor2 = K.create('textarea[name="editor2"]', {
					allowFileManager : true,
					width : '100%',
					items : [
						'source', '|', 'undo', 'redo', '|', 'preview', 'print', 'code', 'cut', 'copy', 'paste',
    				    'plainpaste', 'wordpaste', '|', 'justifyleft', 'justifycenter', 'justifyright',
   					     'justifyfull', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'subscript',
   					     'superscript', 'clearhtml', '/',
   					     'formatblock', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold',
   					     'italic', 'underline', 'strikethrough', 'lineheight', 'removeformat', '|', 'image', 'multiimage',
   					     'table', 'hr', 'emoticons', 'baidumap', 'link', 'unlink'
						],
					afterCreate : function() { 
						var self = this;
						K.ctrl(document, 13, function() {
							K('button[id=getHtml]').click();
						});
						K.ctrl(self.edit.doc, 13, function() {
							K('button[id=getHtml]').click();
						});
						K.ctrl(document, 'q', function() {
							K('button[name=clear]').click();
						});
						K.ctrl(self.edit.doc, 'q', function() {
							K('button[name=clear]').click();
						});
						K.ctrl(document, 'w', function() {
							K('button[name=update]').click();
						});
						K.ctrl(self.edit.doc, 'w', function() {
							K('button[name=update]').click();
						});
					}
				});
				K('button[id=getHtml]').click(function(e) 
				{
					var past = $('input[name="past"]:checked').val();
					if (past == null)
					{
						alert("Please select a type for the project");
						return;
					}
					if (editor.count('text') > 100000)
					{
						alert("Content length over limit");
						return;
					}
					var title = $("#title").val();
					
					if (title.length > 100)
					{
						alert("Title length over limit");
						return;
					}
					var subtitle = $("#subtitle").val();
					
					if (subtitle.length > 200)
					{
						alert("Subtitle length over limit");
						return;
					}

					var website = $("#website").val();

					if (website.length > 500)
					{
						alert("Website length over limit");
						return;
					}
					var people = '';
					for (i = 1 ; i <= 5 ; i++)
					{
						var people_item = $("#people"+i).val();
						var people_website = $("#people_web"+i).val();
						if (people_item != '')
						{
							if (people_website != '')
							{
								if (i == 1)
									people = people + "<a href = \"" + people_website + "\">" + people_item + "</a>"; 
								else
									people = people + ", <a href = \"" + people_website + "\">" + people_item + "</a>"; 
							}
							else
							{
								if (i == 1)
									people = people + people_item;
								else
									people = people + ", " + people_item;
							}
						}
					}
					if (people.length > 1000)
					{
						alert("people length over limit");
						return;
					}
					
					var abstract = editor.html();
					var publication = editor2.html();
					if(title == '')
						alert("Title is empty, submission FAIL");
					else
					{
						abstract = abstract.replace(/'/g, '\"');
						publication = publication.replace(/'/g, '\"');
						$.ajax
					    ({
							type: 'POST',
							url: '/manage/save',
							data:
							{
								past : past,
								title  : title,
								subtitle : subtitle,
								website : website,
								people : people,
								abstract: abstract,
								publication : publication
							},
							success: function(data)
							{
								var innerhtml = '<div id="'+data+'" style="display:none">';
								innerhtml += '<a data-toggle="collapse" href="#collapse'+data;
								innerhtml += '" class="list-group-item list-group-item-action"><h5 class="list-group-item-heading">'+title;
								innerhtml += '</h5></a><div id="collapse'+data;
								innerhtml += '" class="panel-collapse collapse"><a href="/news/index/'+data;
								innerhtml += '" type="button" class="btn btn-info">Read more</a><button type="button" class="btn btn-danger" name="'+data;
								innerhtml += '" onclick="newsDelete('+data;
								innerhtml += ')">delete</button><button type="button" class="btn btn-primary" name="' + data + '" onlick = "newsUpdate(' + data + ')>update</button></div></div>';
								$("#newinsert").after(innerhtml);

             					$("#"+data).slideDown();
             					alert("New project posted!");
							},
							error: function()
							{
								alert('FAIL due to unknown error. Please make sure that you are not adding the existing project!');
							},
							dataType: 'text'
						});
					}
				});
				K('button[name=clear]').click(function(e) {
					editor.html('');
					editor2.html('');
					$("#title").val('');
					$("#subtitle").val('');
					$("#website").val('');
					for (i = 1 ; i < 5 ; i++)
					{
						$("#people"+i).val('');
						$("#people_web"+i).val('');
					}
				});
				K('button[name=update]').click(function(e){
					var past = $('input[name="past"]:checked').val();
					if (past == null)
					{
						alert("Please select a type for the project");
						return;
					}
					if (editor.count('text') > 100000)
					{
						alert("Content length over limit");
						return;
					}
					var title = $("#title").val();
					
					if (title.length > 100)
					{
						alert("Title length over limit");
						return;
					}
					var subtitle = $("#subtitle").val();
					
					if (subtitle.length > 200)
					{
						alert("Subtitle length over limit");
						return;
					}

					var website = $("#website").val();
					
					if (website.length > 500)
					{
						alert("Website length over limit");
						return;
					}
					var people = '';
					if (pid == -1)
					{
						alert("Please first select the project you want to update!");
						return;
					}
					for (i = 1 ; i <= 5 ; i++)
					{
						var people_item = $("#people"+i).val();
						var people_website = $("#people_web"+i).val();
						if (people_item != '')
						{
							if (people_website != '')
							{
								if (i == 1)
									people = people + "<a href = \"" + people_website + "\">" + people_item + "</a>"; 
								else
									people = people + ", <a href = \"" + people_website + "\">" + people_item + "</a>"; 
							}
							else
							{
								if (i == 1)
									people = people + people_item;
								else
									people = people + ", " + people_item;
							}
						}
					}
					if (people.length > 1000)
					{
						alert("people length over limit");
						return;
					}
					var abstract = editor.html();
					var publication = editor2.html();
					if(title == '')
						alert("Title is empty, submission FAIL");
					else
					{
						abstract = abstract.replace(/'/g, '\"');
						publication = publication.replace(/'/g, '\"');

						$.ajax
					    ({
							type: 'POST',
							url: '/manage/update',
							data:
							{
								pid : pid,
								past : past,
								title  : title,
								subtitle : subtitle,
								website : website,
								people : people,
								abstract: abstract,
								publication : publication
							},
							success: function(data)
							{
								alert('UPDATE SUCCEED!');
							},
							error: function()
							{
								alert('FAIL due to unknown error');
							},
							dataType: 'text'
						});
					}
				});

			});

			function newsDelete(id){
				$.ajax
			    ({
					type: 'POST',
					url: '/manage/delete',
					data: 
					{
						id: id /////////j
					},
					success: function(data)
					{
						$("#"+id).fadeTo("fast", 0.01, function(){ //fade
             				$(this).slideUp("normal", function() { //slide up
                 				$(this).remove(); //then remove from the DOM
             				});
         				});
					},
					error: function()
					{
						alert('FAIL due to unknown error');
					},
					dataType: 'text'
				});
			}

			function newsUpdate(id){
				$.ajax
			    ({
					type: 'POST',
					url: '/manage/modify',
					data: 
					{
						id: id /////////
					},
					success: function(data)
					{
						pid = id;
						var res = data.split('####################');
						$title = res[0];
						$subtitle = res[1];
						$website = res[2];
						$people = res[3];
						$abstract = res[4];
						$publication = res[5];
						$("#title").val($title);
						//$("#title").removeAttr('placeholder');
						$("#subtitle").val($subtitle);
						//$("#subtitle").removeAttr('placeholder');
						$("#website").val($website);
						//$("#website").removeAttr('placeholder');
						$person = $people.split(", ");
						var i;
						for (i = 1 ; i <= $person.length ; i++)
						{
							if ($person[i-1].charAt(0) == '<')
							{
								$begin = $person[i-1].indexOf("\"");
								$end = $person[i-1].indexOf("\"", $begin+1);
								$nbegin = $person[i-1].indexOf(">");
								$nend = $person[i-1].indexOf("<", 1);
								$url = $person[i-1].substr($begin+1, $end - $begin - 1);
								$name = $person[i-1].substr($nbegin+1, $nend - $nbegin - 1);
								$("#people_web" + i).val($url);
								//$("#people_web" + i).removeAttr('placeholder');
								$("#people" + i).val($name);
								//$("#people" + i).removeAttr('placeholder');
							}
							else
							{
								$person_i = $person[i - 1];
								$("#people" + i).val($person_i);
								//$("#people" + i).removeAttr('placeholder');
							}
						}
						editor.html($abstract);
						editor2.html($publication);

					},
					error: function()
					{
						pid = -1;
						alert('FAIL due to unknown error');
					},
					dataType: 'text'
				});
			}

			function readURL(input) {
			  if (input.files && input.files[0]) {
			    var reader = new FileReader();
			    reader.onload = function (e) {
			      $('#preview_img')
			        .attr('src', e.target.result)
			        .width(200)
			        .height(200);
			    };
			    reader.readAsDataURL(input.files[0]);
			  }
			}
		</script>

	

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
                        	<a href="">List of Publications</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                        	<a href="/manage" style="font-weight: 300;">Login</a>
                        </li>                  
                    </ul> 
                </li>
            </ul>
        </div>
    </div>
</nav>


<!-- Projects List -->
<div class="container">
	<div class="row">
		<div class="col-sm-12" align="center">
			<h2>Projects List</h2>
		</div>
	</div>
	<div class="list-group" id="projects">
		<div id="newinsert"></div>
		<?php 
		foreach ($projects as $projects_item)
		{
			echo '<div id="'.$projects_item->pid.'">';
			echo '<a data-toggle="collapse" href="#collapse'.$projects_item->pid;
			echo '" class="list-group-item list-group-item-action">';
			echo '<h5 class="list-group-item-heading">'.$projects_item->title.'</h5>';
			echo '</a>';
			
			echo '<div id="collapse'.$projects_item->pid.'" class="panel-collapse collapse">';
			
			echo '<a href="/news/index/'.$projects_item->pid;
			echo '" type="button" class="btn btn-info">';
			echo 'Read more</a>';

			echo '<button type="button" class="btn btn-danger" name="'.$projects_item->pid.'"';
			echo ' onclick="newsDelete('.$projects_item->pid.')">';
			echo 'delete</button>';

			echo '<button type="button" class="btn btn-primary" name="'.$projects_item->pid.'"';
			echo ' onclick="newsUpdate('.$projects_item->pid.')">';
			echo 'update</button>';

	    	echo '</div>';

	    	echo '</div>';

		}
		?>
	</div>
</div>

<div class="container">
<div class="row">
	<div class="col-sm-12" align="center">
		<h2>Add/Update Project</h2>
	</div>
</div>
<div class="form-group">
  <label for="past">Current Project/Past Project :</label>
  <div class="row-sm-12">
	  <div class="col-lg-6">
	  	<input type="radio" class="form-control" id="past" name="past" value=0>Current Project<br>
	  </div>
	  <div class="col-lg-6">
	  	<input type="radio" class="form-control" id="past" name="past" value=1>Past Project<br>
	  </div>
  </div>
</div>

<div class="form-group">
  <label for="title">Title:</label>
  <input type="text" class="form-control" id="title" placeholder="[REQUIRED] e.g. Designing a Predictable Database">
</div>

<div class="form-group">
  <label for="subtitle">Subtitle:</label>
  <input type="text" class="form-control" id="subtitle" placeholder="e.g. A Journey to Bring Back Performance Predictability to Databases">
</div>

<div class="form-group">
  <label for="website">Website:</label>
  <input type="text" class="form-control" id="website" placeholder="e.g. http://dbseer.org/">
</div>

<div class="form-group">
	  <label for="website">People:</label>
	  <div class="row">
	  		<div class="row-sm-12">
		  		<div class="col-lg-6">
		  			<input type="text" class="form-control" id="people1" placeholder="Person 1">
		  		</div>
		  		<div class="col-lg-6">
		  			<input type="text" class="form-control" id="people_web1" placeholder="Website of person 1">
		  		</div>
	  		</div>
	  		<br><br>
	  		<div class="row-sm-12">
		  		<div class="col-lg-6">
		  			<input type="text" class="form-control" id="people2" placeholder="Person 2">
		  		</div>
		  		<div class="col-lg-6">
		  			<input type="text" class="form-control" id="people_web2" placeholder="Website of person 2">
		  		</div>
	  		</div>
	  		<br><br>
	  		<div class="row-sm-12">
		  		<div class="col-lg-6">
		  			<input type="text" class="form-control" id="people3" placeholder="Person 3">
		  		</div>
		  		<div class="col-lg-6">
		  			<input type="text" class="form-control" id="people_web3" placeholder="Website of person 3">
		  		</div>
	  		</div>
	  		<br><br>
	  		<div class="row-sm-12">
		  		<div class="col-lg-6">
		  			<input type="text" class="form-control" id="people4" placeholder="Person 4">
		  		</div>
		  		<div class="col-lg-6">
		  			<input type="text" class="form-control" id="people_web4" placeholder="Website of person 4">
		  		</div>
	  		</div>
	  		<br><br>
	  		<div class="row-sm-12">
		  		<div class="col-lg-6">
		  			<input type="text" class="form-control" id="people5" placeholder="Person 5">
		  		</div>
		  		<div class="col-lg-6">
		  			<input type="text" class="form-control" id="people_web5" placeholder="Website of person 5">
		  		</div>
	  		</div>
	  </div>
</div>

<div class="form-group">
    <label for="picture">Image:</label>
    <input type="file" class="form-control" id=“picture” onchange="readURL(this);"/>
    <img id="preview_img" src="#" alt="your image" />
</div>

	<div class="row">
		<div class="col-sm-12">
			<label for="editor">Article:</label>
			<textarea name="editor" id="editor"></textarea>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<label for="editor2">Publication:</label>
			<textarea name="editor2" id="editor2"></textarea>
		</div>
	</div>

  <div class="row">
	  <div class="col-sm-12">
	  	<h3>
	  		<button class="btn btn-primary" id="getHtml"> Submit (Ctrl + Enter)
	  		<span class="glyphicon glyphicon-arrow-up"></span>
	  		</button>
			<span>&nbsp;</span>
			<button class="btn btn-info" name="update"> Update (Ctrl + w)
	  		<span class="glyphicon glyphicon-pencil"></span>
	  		</button>
			<span>&nbsp;</span>
			<button class="btn btn-danger" name="clear" > Clear (Ctrl + q)
			<span class="glyphicon glyphicon-remove"></span>
			</button>
		</h3>
	  </div>
  </div>


  <div class="row">
  	<div class="col-sm-4"></div>
    <div class="col-sm-2">
      <p><a href="/login/logout">Log out</a></p>
    </div>
    <div class="col-sm-2">
      <p><a href="/">Back to Home</a></p>
    </div>
    <div class="col-sm-4"></div>
  </div>
</div>

</body>
</html>