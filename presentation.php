<?php 
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<link href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css' rel='stylesheet' />
<script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js'></script>


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
      <a class="navbar-brand" href="#">CoderMix</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">home <span class="sr-only">(current)</span></a></li>
      </ul>
      
     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
  </div>
</nav>

<div class="col-md-offset-2 col-md-8">
<?php 
if(isset($_POST["comment"])){
$string = $_POST["comment"]; //getting the text

$data  = preg_split("#\n\s*\n#Uis", $string); //spliting to sections

$data2= preg_split("#\n#Uis", $data[0]); //display topic of first section


$sects = array();

foreach($data as $key1 => $val1) {
   $firstElement = true;
  $dataN= preg_split("#\n#Uis", $data[$key1]);
  foreach($dataN as $key => $val) {
    if($firstElement) {
      $firstElement = false;
    } else {
      array_push($sects, $val);
    }
  }

}

$topics = implode('_', $data2);
$sections = implode('_', $sects);
}
if($_SESSION["color"]=='red'){
      echo "This button will turn to green when document is fully read
    <form target='_blank' method='post' action='show.php'><input name='topics' type='hidden' id='topics' value='".$topics."'/>";
    echo "<input type='hidden' name='sections' id='sections' value='".$sections."'/>
    <input class='btn btn-danger btn-large' type='submit' name='submit' value='Terms and agreement'>
    </form>";
}else{
    echo "<a id='textload' class='btn btn-success btn-large' href='#''>Terms and agreement </a>";
}


?>

