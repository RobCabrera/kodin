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
    <title>Demo - TOS Interactive Generator</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <link href='css/custom-style.css' rel='stylesheet' /> 
    <link href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css' rel='stylesheet' /> 
    <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js'></script>
    
    <style>
        .panel-heading{
            color: #fff !important;
            background-color: #337ab7 !important;
            border-color: #2e6da4 !important; 
        }
    </style>

</head>

<body>

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
                        <li><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
                        <li class="active"><a href="demo.php">Demo <span class="sr-only">(current)</span></a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </div> 
    </nav>
    
    <div class="container">
      
        
      
        <div class="rows">
        
            
            <div class="col-md-12"> 
            
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                          <h2 class="panel-title">
                            <!--<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Demo</a>-->
                            Demo
                            
                          </h2>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                The following should be taking into consideration when running this application.
                                
                                <ul>
                                    <li>The document must have an empty line break between each sections.</li>
                                    <li>A line break must be added between topic and text</li>
                                
                                </ul>
                                
                                <p>
                                    To see it in action, click on "Load a sample document"
                                </p>
                                
                                <form method="post" action="presentation.php">
                                
                                    
                                        
                                    <!--<a id='textload' class='btn btn-info btn-large' href="#">Load a sample document </a>-->
                                    <button type="button" id="textload" class="btn btn-info btn-large">Load a sample document</button>
                                    
                                    
                                    <div class="demo-load-doc-container">
                                        <span>TOS / Privacy Policy</span>
                                        
                                        <textarea id="document" name="document" class="form-control" rows="25" cols="130"></textarea>
                                        
                                        <div class="demo-run-container">
                                        
                                            
                                            <input class='btn btn-danger btn-large' type="submit" name="submit" value="Run Demo" data-toggle="modal" data-target=".bs-example-modal-lg">
                                            
                                        </div>
                                    </div>
                                    
                                    
                                </form>
                    
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
        </div>
       
    </div><!-- End of container -->
    
    <script>
        $(document).ready(function() {
        
            
        	$('#textload').click(function(){
        	
            	$.ajax({
                   url : "tos.txt",
                   dataType: "text",
                   success : function (data) {
                       $("#document").text(data);
                       $(".demo-load-doc-container").fadeIn();
                   },
                   error: function(data){
                   	alert(data);
                   }
                });
            });
            
            
            
        });
    </script>
    
    
    
    <?php
    include("footer.html");
    
    ?>

</body>
</html>