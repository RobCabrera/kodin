<?php 

ob_start();
  if( $_POST["submit"]=="Download"){
  
  
    $no = mt_rand(100,10000);
    $filename = $no.'document.html';
     header("Cache-Control: public");
     header("Content-Description: File Transfer");
     header("Content-Disposition: attachment; filename=$filename");
     header("Content-Type: application/octet-stream; ");
     header("Content-Transfer-Encoding: binary");
    
    $impress = file_get_contents('./js/impress.js', true);
    $css = file_get_contents('./css/impress-demo.css', true);
            if(isset($css)){
      echo "<style>".$css."</style>";
  }
    
 }
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=1024" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<title>Document presentation</title>

<?php 
session_start();
$_SESSION["color"] = 'green';
?>

<link href="css/impress-demo.css" rel="stylesheet" />
<link rel="apple-touch-icon" href="apple-touch-icon.png" />
<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js?skin=desert"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<link href='css/custom-style.css' rel='stylesheet' /> 
    <link href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css' rel='stylesheet' /> 
    <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js'></script>
<style>
	.custom-wrap{
		width: 100%;
		max-width: 1110px;
        height: 600px;
        border: 1px solid #2e6da4;
        background: #337ab7;
        overflow: hidden;
        position: relative;
        color: #fff;
        margin: 10px auto;
	}
	
	.custom-header{
	    background-color: #f8f8f8;
	    border-color: #e7e7e7;
	    position: relative;
        min-height: 50px;
        margin-bottom: 20px;
        border: 1px solid transparent;
        width: 100% !important;
        z-index: 9999;
	}
	
	.header-wrapper{
	    width: 980px;
	    margin: 10px auto;
	}
	
	.header-buttons button{
	    
	    
	}
	
	
</style>

</head>


<body class="impress-not-supported">

    <?php 
    $topics = $_POST["topics"]; //getting the text
    $sections = $_POST["sections"]; //getting the text
    $realtopics = explode('_', $topics);
    $realsections = explode('_', $sections);
    ?>
    
    <!--
    For example this fallback message is only visible when there is `impress-not-supported` class on body.
    -->
     <nav class="navbar navbar-default" role="navigation"> 
    
        <div class="container">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">TheCoderMix</a>
                </div>
                
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <button type="button" class="btn btn-warning navbar-btn">
                            <span class='glyphicon glyphicon-floppy-save' aria-hidden='true'></span> Download
                        </button>
                        <button class='btn btn-info btn-large' type='button' name='email' value='Email'>
					        <span class='glyphicon glyphicon-envelope' aria-hidden='true'></span> Email
					    </button>
					    <button class='btn btn-info btn-danger' type='button' name='sourcecode'>
					        <span class='glyphicon glyphicon-tasks' aria-hidden='true'></span> Source Code
					    </button>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </div> 
    </nav>
    
   <div class="custom-wrap">
        <div class="fallback-message" style="visiblity:hidden">
        <p>Your browser <b>doesn't support the features required</b> 
        </div>
        
        <div id="impress">
        
        
        <?php 
        
        $x = -1000;
        $y = -1500;
        
        
        for ($i=0;$i<count($realtopics);$i++){
        
        ?>
        
        
        
        <div class="step" data-x="<?php echo $x; $x+=1000; ?>" data-y="-1500">
        <b><?php echo $realtopics[$i] ?></b><p> <?php echo $realsections[$i] ?></p>
        </div>
        
        
        <?php
        }
        
        
        ?>
        
        
        
        
        
        
        <div id="overview" class="step" data-x="3000" data-y="1500" data-scale="10">
        </div>
        </div>
        
        <div class="hint">
        <p>Use a spacebar or arrow keys to navigate</p>
        </div>
    </div>
    
    <div class="container">
    
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                  <h2 class="panel-title">
                    <!--<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Demo</a>-->
                   <span class='glyphicon glyphicon-tasks' aria-hidden='true'></span> Source Code
                    
                  </h2>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">
                        
                    </div>
                </div>
            </div>
            <!--
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingTwo">
                      <h4 class="panel-title">
                        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                         Use the App to generate presentation
                        </a>
                      </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                       
                            
                        </div>
                    </div>
                </div> 
            -->
        </div> 
    
    </div>

    <script>
    if ("ontouchstart" in document.documentElement) {
    document.querySelector(".hint").innerHTML = "<p>Tap on the left or right to navigate</p>";
    }
    </script>
    
    <script src="js/impress.js"></script>
    <script>impress().init();</script>
    <?php 
        
        
        if($_POST["submit"]=="Email"){
             if(isset($css)){
              echo "<style>".$css."</style>";
          }
            //Using PHPMailer 
             require 'PHPMailer/PHPMailerAutoload.php';
             $mail = new PHPMailer;
            
            $mail->isSMTP();
             $mail->Host = 'smtp.gmail.com'; 
            $mail->SMTPAuth = plain;                            
            $mail->Username = 'zameermfm@gmail.com';              
            $mail->Password = 'jbadvgdwkyocqxja';                       
            $mail->SMTPSecure = 'tls';                        
            $mail->Port = 587;    
            
            //This is a free smtp, therefore, it will take some time to deliver the message.. it sucks! I know... Feel free to plug in your SMTP info.
            
            $email = $_POST['email'];
            $text = $_POST["fulltext"];
           
            $mail->From = 'system@agreed.com';
            $mail->FromName = 'system';
            $mail->addAddress($email);     // Add a recipient
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            $mail->isHTML(true);                                  // Set email format to HTML
            $html = ob_get_contents();
            ob_end_clean();
            
            $css = file_get_contents('./css/impress-demo.css', true);
            $mail->Subject = 'Your document has arrived.';
            $mail->Body = $html;
          // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
            if(!$mail->send()) {
                echo 'Message could not be sent.<br>';
                echo 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'Message has been sent';
            }
            
          }
    
    
    
    ?>

</body>
</html>