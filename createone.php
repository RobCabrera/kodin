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
    <title>Create Your Own - Interactive TOS Generator</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <link href='css/custom-style.css' rel='stylesheet' /> 
    <link href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css' rel='stylesheet' /> 
    <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js'></script>
    
    <style>
        .panel-heading{
            color: #fff !important;
            background-color: #d9534f !important;
            border-color: #d43f3a !important; 
        }
        
        #create-own-alert-area{
            display:none;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-inverse custom-nav" role="navigation"> 
    
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
                        <li><a href="index.php">Home </a></li>
                        <li><a href="demo.php">Demo </a></li>
                        <li class="active"><a href="createone.php">Create Your Own <span class="sr-only">(current)</span></a></li>
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
                            Create Your Own...
                            
                          </h2>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                                It is very simple create your own animated/interactive fine print document. The following should be taking into consideration when running this application.
                                
                                <ul>
                                    <li>The document must have an empty line break between each sections.</li>
                                    <li>A line break must be added between topic and text</li>
                                
                                </ul>
                                
                                <p>
                                    Copy and Paste your data into the textarea below.
                                </p>
                                
                                <form method="post" action="show.php" id="create-own-form">
                                
                                    <textarea id="document" name="document" class="form-control" rows="25" cols="130"></textarea>
                                    
                                    <div class="demo-run-container">
                                    
                                        
                                        <div class="row">
                                        
                                        
                                        <div class="col-md-4">
                                            <input class='btn btn-danger btn-large' id="create-own-sb-btn" type="submit" name="submit" value="Create It" data-toggle="modal" data-target=".bs-example-modal-lg">
                                        
                                        </div>
                                        
                                        <div class="col-md-8">
                                           <div class="alert alert-danger" id="create-own-alert-area" role="alert">
                                            <span class="glyphicon glyphicon-exclamation-sign" aria-hidden='true'></span><span id="create-own-error-msg"></span>
                                           </div> 
                                        </div>
                                            
                                        </div>
                                    </div>   
                                    <!--<a id='textload' class='btn btn-info btn-large' href="#">Load a sample document </a>
                                    <button type="button" id="textload" class="btn btn-info btn-large">Load a sample document</button>-->
                                </form>
                    
                            </div>
                        </div>
                    </div>
                </div> 
            </div>      
        </div>
       
    </div><!-- End of container -->
    
    <script>
        $(document).ready(function() {
        
            $("#create-own-form").submit(function(e){
               
               var document1 = $("#document").val();
               
               if (document1 === ""){
                   e.preventDefault();
                   $("#create-own-error-msg").html("&nbsp; To continue, please enter some data. If you need to see an example, please click the Demo tab.");
                   $("#create-own-alert-area").fadeIn();
               }
                
            });
            
            
        });
    </script>
    
    
    
    <?php
    include("footer.html");
    
    ?>

</body>
</html>
