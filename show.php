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
        
    
 }
 
?>
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



<link href="http://fonts.googleapis.com/css?family=Open+Sans:regular,semibold,italic,italicsemibold|PT+Sans:400,700,400italic,700italic|PT+Serif:400,700,400italic,700italic" rel="stylesheet" />

<link href="css/impress-demo.css" rel="stylesheet" />
<link rel="shortcut icon" href="favicon.png" />
<link rel="apple-touch-icon" href="apple-touch-icon.png" />
<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js?skin=desert"></script>
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

<?php if(!$_POST["submit"]=="Email"){ ?>
<div class="fallback-message" style="visiblity:hidden">
<p>Your browser <b>doesn't support the features required</b> 
</div>
<?php
} 
?>
<div id="impress">


<?php $x = -1000;
$y = -1500;
 for ($i=0;$i<count($realtopics);$i++){
?>



<div class="step slide" data-x="<?php echo $x; $x+=1000; ?>" data-y="-1500">
<b><?php echo $realtopics[$i] ?></b><p> <?php echo $realsections[$i] ?></p>
</div>


<?php
}


?>






<div id="overview" class="step" data-x="3000" data-y="1500" data-scale="10">
</div>
</div>
<?php if(!$_POST["submit"]=="Email"){ ?>
<div class="hint">
<p>Use a spacebar or arrow keys to navigate</p>
</div>
<?php } ?>
<script>
if ("ontouchstart" in document.documentElement) {
document.querySelector(".hint").innerHTML = "<p>Tap on the left or right to navigate</p>";
}
</script>


<?php

  if(isset($impress)){
      echo "<script>".$impress."</script>";
  }else{
      echo "<script src='js/impress.js'></script>";
  }
?>
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
    $mail->Username = 'your email';              
    $mail->Password = 'that app password';                       
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

<?php

 
?>
</body>
</html>
