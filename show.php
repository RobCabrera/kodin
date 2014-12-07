<?php 

 ob_start();

function base_url($atRoot=FALSE, $atCore=FALSE, $parse=FALSE){
        if (isset($_SERVER['HTTP_HOST'])) {
            $http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
            $hostname = $_SERVER['HTTP_HOST'];
            $dir =  str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

            $core = preg_split('@/@', str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(dirname(__FILE__))), NULL, PREG_SPLIT_NO_EMPTY);
            $core = $core[0];

            $tmplt = $atRoot ? ($atCore ? "%s://%s/%s/" : "%s://%s/") : ($atCore ? "%s://%s/%s/" : "%s://%s%s");
            $end = $atRoot ? ($atCore ? $core : $hostname) : ($atCore ? $core : $dir);
            $base_url = sprintf( $tmplt, $http, $hostname, $end );
        }
        else $base_url = 'http://localhost/';

        if ($parse) {
            $base_url = parse_url($base_url);
            if (isset($base_url['path'])) if ($base_url['path'] == '/') $base_url['path'] = '';
        }

        return $base_url;
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

<?php

 if( $_POST["submit"]=="Download"){
  
  
    $no = mt_rand(100,10000);
        
        
    //$myFile = 'document.html';
    // $fh = fopen($myFile, 'w') or die("can't open file");
    // $stringData = file_get_contents(__FILE__);
    // fwrite($fh, $stringData);
    // fclose($fh);
    
    $File = './view/'.$no.'document.html';

       while(file_exists($File) )
        {
            $no = mt_rand(100,10000);
           
        } 
          
            
            $page = ob_get_contents();
            ob_end_clean();
             	
              $basename = base_url();
            file_put_contents('./view/'.$no.'document.html', $page);
            
            
              echo 'And another thing!, Anytime you can access it via <a href="'.$basename.'view/'.$no.'document.html">this link</a>';

            $filer = './view/'.$no.'document.html';
            $zip = new ZipArchive();
            $zip->open('./view/'.$no.'document.zip', ZipArchive::CREATE);
            
            $zip->addFile('document.html', $filer);
            $zip->addFile('impress.js', './js/impress.js');
             $zip->addFile('impress-demo.css', './css/impress-demo.css');
            
            $zip->close();
            $filename = './view/'.$no.'document.zip';
            
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mimeType = finfo_file($finfo, $filename);
            $size = filesize($filename);
            $name = basename($filename);
            
            if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
                // cache settings for IE6 on HTTPS
                header('Cache-Control: max-age=120');
                header('Pragma: public');
            } else {
                header('Cache-Control: private, max-age=120, must-revalidate');
                header("Pragma: no-cache");
            }
            header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // long ago
            header("Content-Type: $mimeType");
            header('Content-Disposition: attachment; filename="' . $name . '";');
            header("Accept-Ranges: bytes");
            header('Content-Length: ' . filesize($filename));

        
         
        

  //  $impress = file_get_contents('./js/impress.js', true);
  //  $css = file_get_contents('./css/impress-demo.css', true);
         //   if(isset($css)){
     // echo "<style>".$css."</style>";
 // }
    
 }
?>
</body>
</html>
