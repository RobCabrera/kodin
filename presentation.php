<?php
session_start();
//require("datadog-tracker.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Demo - TOS Interactive Generator</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <link href='css/custom-style.css' rel='stylesheet' /> 
    <link href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css' rel='stylesheet' /> 
    <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js'></script>
    <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js?skin=desert"></script>
    
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


<?php 
            
    if(isset($_POST["document"])){
        
        $string = $_POST["document"]; //getting the text
        $data  = preg_split("#\n\s*\n#Uis", $string); //spliting to sections
        //display topic of first section
        $sects = array();
        $tops = array();
        
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
        
        foreach($data as $key1 => $val1) {
         $firstElement2 = true;
          $dataN= preg_split("#\n#Uis", $data[$key1]);
          foreach($dataN as $key => $val) {
             if($firstElement2) {
              array_push($tops, $val);
              $firstElement2 = false;
            } else {
              break;
            }
          }
        }
        
        $topics = implode('_', $tops);
        $sections = implode('_', $sects);
        
    }
    
?>


<div class="container">
    
    <div class="row">
    
        <div class="alert alert-success" role="alert">
           <span class="glyphicon glyphicon-ok" aria-hidden='true'></span> Your file has been proccess. There are a few options available for you.
        
        </div>

    </div>
    
    <div class="row">
    
        <?php
            
            if($_SESSION["color"]=='red'){
                
                echo "
                
                    <div class='panel-group' id='accordion' role='tablist' aria-multiselectable='true'>
                        <div class='panel panel-default'>
                            <div class='panel-heading' role='tab' id='headingOne'>
                              <h2 class='panel-title'>
                                
                                Option 1
                                
                              </h2>
                            </div>
                            <div id='collapseOne' class='panel-collapse collapse in' role='tabpanel' aria-labelledby='headingOne'>
                                <div class='panel-body'>
                                
                                    <div class='col-md-9'>
                    					This button will turn to green when document is fully read
                    				</div>
                    				
                    				<div class='col-md-offset-4'>
                    					<form target='_blank' method='post' action='show_rob.php'><input name='topics' type='hidden' id='topics' value='".$topics."'/>
                    					    <textarea style='display:none;' name='fulltext' id='fulltext'>".$string."</textarea>
                    					    <textarea style='display:none;' name='sections' id='sections'>".$sections."</textarea>
                    					    <!--<input class='btn btn-danger btn-large' type='submit' name='submit' value='Load it in Browser'>-->
                    					    <button class='btn btn-danger btn-large' type='submit' name='submit'>
                    					        <span class='glyphicon glyphicon-fullscreen' aria-hidden='true'></span> Load it in Browser
                    					    </button>
                    				</div>
                                    
                                </div>
                            </div>
                        </div>
                        
                            <div class='panel panel-default'>
                                <div class='panel-heading' role='tab' id='headingTwo'>
                                  <h4 class='panel-title'>
                                   
                                    Option 2
                                    
                                  </h4>
                                </div>
                                <div id='collapseTwo' class='panel-collapse collapse in' role='tabpanel' aria-labelledby='headingTwo'>
                                    <div class='panel-body'>
                                    
                                        <div class='col-md-9'>
                        				    Download the files, and add them to your website.
                        				</div>
                        				
                        				<div class='col-md-offset-4'>
                        				    <!--<input class='btn btn-info btn-large' type='submit' name='submit' value='Download'>-->
                        				    <button class='btn btn-warning btn-large' type='submit' name='submit' value='Download'>
                    					        <span class='glyphicon glyphicon-floppy-save' aria-hidden='true'></span> Download
                    					    </button>
                        				</div>
                                   
                                        
                                    </div>
                                </div>
                            </div> 
                            <div class='panel panel-default'>
                                <div class='panel-heading' role='tab' id='headingTwo'>
                                  <h4 class='panel-title'>
                                   
                                    Option 3
                                    
                                  </h4>
                                </div>
                                <div id='collapseTwo' class='panel-collapse collapse in' role='tabpanel' aria-labelledby='headingThree'>
                                    <div class='panel-body'>
                                    
                        				<span style='display:inline-block; margin: 5px 0;'>    
                            		        Can't download it now, no problem. Just send it to your email.
                                        </span>
                                        <div class='row'>
                                        
                                            <div class='col-md-9'>
                            				    
                            				    <input class='form-control'  placeholder='Your email' name='email' id='email' length='8'/>
                                               
                            				</div>
                            				
                            				<div class='col-md-offset-4'>
                            				   <!--<input class='btn btn-info btn-large' type='submit' name='submit' value='Email'>-->
                            				   <button class='btn btn-info btn-large' type='submit' name='submit' value='Email'>
                        					        <span class='glyphicon glyphicon-envelope' aria-hidden='true'></span> Email
                        					    </button>
                            				</div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                    
                    </form>
                ";
            }else{
                echo "<a id='textload' class='btn btn-success btn-large' href='#''>Terms and agreement </a>";
            }
            
            /*
            echo "<pre class='prettyprint'>";
            show_source("demo.php");
            echo "</pre>";
            */
        ?>

    </div>

</div>

<?php
    include("footer.html");
        
?>

</body>
</html>