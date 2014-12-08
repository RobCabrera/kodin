<?php
session_start();
require("datadog-tracker.php");
$_SESSION["color"] = 'red';

?>

<!--
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
-->


<!DOCTYPE html>
<html lang="en">

<head>
    <title>T.O.S Interactive Generator</title>
    <link href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css' rel='stylesheet' /> 
	<link href='css/custom-style.css' rel='stylesheet' /> 
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js'></script>
	
</head>

<body>

    <nav class="navbar navbar-inverse custom-navigation" role="navigation"> <div class="container">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">TheCoderMix</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home<span class="sr-only">(current)</span></a></li>
            <li><a href="demo.php">Demo</a></li>
            <li><a href="createone.php">Create Your Own </a></li>
          </ul>
          
         
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
      </div> </nav> 
	
	<div clas="container-fluid" style="background-color: #eee;">
		<div class="container">
			<div class="jumbotron">
				<h1>
					Interactive TOS Generator
				</h1>
				<p>
					<br>
					TOS/Privacy Policy/or any other legal document are long and most of all, bored to read. We changed that! We wanted to make this documents more appealing to user's eyes and get them involved.
					This is no game, but an animated/interactive way to present this long legal documents to your audience.
					<br>
					<br>
					Click on the Demo, to see what our product. Also, if you feel it is a must have in your website, head to the "Create Your Own" section . We show you a simple way to integrate it with your site.
					<br>
					<br>
				</p>
				<p>
					<a class="btn btn-primary btn-lg" href="demo.php" role="button">Demo</a>
					<a class="btn btn-danger btn-lg" href="createone.php" role="button">Create Your Own</a>
					
				</p>
				
			</div>
		</div>
	</div>
	<div class="container" id="expand-cont">
      
        <div class="rows" id="fullwidth-container">
			
			<div class="row">
				<h3>
					Tools used for this Project
				</h3>
				
			  <div class="col-xs-6 col-md-3">
				<a href="https://developer.mozilla.org/en-US/docs/Web/Guide/HTML/HTML5" target="_blank" class="thumbnail">
				  <img data-src="holder.js/80%x160" src="images/html5.png" class="img-responsive img-rounded"  alt="html5" width="125" height="125">
				</a>
			  </div>
				<div class="col-xs-6 col-md-3">
				<a href="http://getbootstrap.com/" target="_blank" class="thumbnail">
				  <img data-src="holder.js/80%x160" src="images/bootstrap2.jpg" class="img-responsive img-rounded" alt="twitter bootstrap" width="125" height="125">
				</a>
			  </div>
				<div class="col-xs-6 col-md-3">
				<a href="https://github.com/bartaz/impress.js/" target="_blank" class="thumbnail">
				  <img data-src="holder.js/80%x160" src="images/articleImpress.jpg" class="img-responsive img-rounded"  alt="impress.js" width="125" height="125">
				</a>
			  </div>
				<div class="col-xs-6 col-md-3">
				<a href="https://github.com/PHPMailer/PHPMailer" target="_blank" class="thumbnail">
				  <img data-src="holder.js/80%x160" src="images/phpmailer.png" class="img-responsive img-rounded" alt="phpmailer" width="125" height="125">
				</a>
			  </div>
		
			</div>
                   
        </div><!--End of first row -->
    </div>
    </div>

<?php
include("footer.html");

?>




</body>
</html>



   






