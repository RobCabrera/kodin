<?php
session_start();
//require("datadog-tracker.php");
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
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js'></script>
</head>

<body>

    <nav class="navbar navbar-default" role="navigation"> <div class="container">
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
            <li class="active"><a href="index.php">Home<span class="sr-only">(current)</span></a></li>
            <li><a href="demo.php">Demo</a></li>
            <li><a href="createone.php">Create Your Own </a></li>
          </ul>
          
         
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
      </div> </nav> 
      <div class="container">
      
        <div class="rows">
        
            <div class="col-md-12">
              <!-- carousel -->
              
              <div id="carousel-slides" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              </ol>
            
              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <img src="images/slide1.png" alt="...">
                  <div class="carousel-caption">
                   sLIDE ONE
                  </div>
                </div>
                <div class="item">
                  <img src="images/slide2.png" alt="...">
                  <div class="carousel-caption">
                    Slide Two
                  </div>
                </div>
               
              </div>
            
              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-slides" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#carousel-slides" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          
          
          <!-- End of carousel -->
          </div>
        </div><!--End of first row -->
      
        <div class="rows">
            <div class="col-md-12"> <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="headingOne">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> App information</a>
                      </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            This application simulates an online fine print/legal document presentation. The document you are 
                            submitting will be made into an interactive, user friendly, appealing presentation. The document submitted below must have an empty line break between each sections and a line break between topic and text. <br><br>
                            <p>
                                For a quick demo, click on "Load a sample document" button and then run it by clicking on "Make the interactive presentation"
                            </p>
                
                        </div>
                    </div>
                </div>
            </div>  
        </div><!-- End of second row-->
    </div>
    </div>

<?php
include("footer.html");

?>




</body>
</html>



   






