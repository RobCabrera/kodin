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
<div class="fallback-message" style="visiblity:hidden">
<p>Your browser <b>doesn't support the features required</b> 
</div>

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

<div class="hint">
<p>Use a spacebar or arrow keys to navigate</p>
</div>
<script>
if ("ontouchstart" in document.documentElement) {
document.querySelector(".hint").innerHTML = "<p>Tap on the left or right to navigate</p>";
}
</script>

<script src="js/impress.js"></script>
<script>impress().init();</script>


</body>
</html>



