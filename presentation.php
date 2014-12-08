<?php
session_start();

$filelocation = $_SESSION['fullpagename'];
$code = $_SESSION['short'];

<<<<<<< HEAD

=======
//require("datadog-tracker.php");
>>>>>>> upstream/master
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Done - TOS Interactive Generator</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <link href='css/custom-style.css' rel='stylesheet' /> 
    <link href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css' rel='stylesheet' /> 
    <script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js'></script>
    <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js?skin=desert"></script>
    <script>
		$(function(){
			$("#send-email-form").submit(function(e){
				var email = $("#email").val();
				var filename = $("#filename").val();
				
				if (email === ""){
					e.preventDefault();
					$(".email-alert-container").html("<div class='alert alert-danger' role='alert'>Email Address is required in order to deliver your custom TOS Interative to your email inbox.</div>");
					$(".email-alert-container").fadeIn();
				}else{
					e.preventDefault();
					$(".email-salert-container").html("<img src='images/loading_t.gif'>");	
					$(".email-alert-container").fadeOut("",function(){
						$(".email-alert-container").html("");
						
					});
					
					$.ajax({
						url: "sendxemail.php",
						method: "post",
						data: {email:email, filename:filename},
						success: function(res){
							$(".email-salert-container").html(res);
							$(".email-salert-container").fadeIn();
						}
					});
				}
			});
		});
	
	</script>
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
                <a class="navbar-brand" href="index.php">TheCoderMix</a>
            </div>
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Home </a></li>
                    <li><a href="demo.php">Demo </a></li>
					<li><a href="createone.php">Create Your Own </a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </div> 
</nav>


<div class="container">
    
    <div class="row">
    
        <div class="alert alert-success" role="alert">
           <span class="glyphicon glyphicon-ok" aria-hidden='true'></span> Your file has been proccess. There are a few options available for you.
        
        </div>

    </div>
    
    <div class="row">
    
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
										<a href='<?php echo $filelocation; ?>' target='_blank'>
										<button class='btn btn-danger btn-large'>
											
                    					 <span class='glyphicon glyphicon-fullscreen' aria-hidden='true'></span> Load it in Browser
										</button>
                    					</a>
                    					    
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
											<?php 
												//echo $filelocation; 
												$str = explode("/",$filelocation);
												
												$filename = $str[count($str)-1];
												
											
											
											?>
                        				    <form action="downloadxfile.php" method="post">
												<input type="hidden" name="filename" value="<?php echo $filename;  ?>">
												<input type="hidden" name="filelocation" value="<?php echo $filelocation;  ?>">
												<button class='btn btn-warning btn-large' type='submit' name='submit' value='Download'>
													<span class='glyphicon glyphicon-floppy-save' aria-hidden='true'></span> Download
												</button>
											</form>
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
                            		        Can't download it now, no problem. Just send it to your email. We'll zip it for you.
                                        </span>
                                        <div class='row'>
                                        
                                            <div class='col-md-9'>
                            				    <form action="sendxemail.php" method="post" id="send-email-form">
													<input type="hidden" name="filename" id="filename" value="<?php echo $filename;  ?>">
													
                            				    	<input class='form-control'  placeholder='Your email' name='email' id='email' length='8'/>
                            				</div>
                            				
                            				<div class='col-md-offset-4'>
                            				   
												   
													<button class='btn btn-info btn-large' type='submit' name='submit' value='Email'>
                        					        	<span class='glyphicon glyphicon-envelope' aria-hidden='true'></span> Email
													</button>
												</form>
                            				   
                            				</div>
                                        </div>
										<div class="row">
											
											<div class="col-md-10 email-alert-container" style="margin: 5px 0; display:none;">
												
											</div>
											<div class="col-md-10 email-salert-container" style="margin: 5px 0; display:none;">
												
											</div>
										</div>
                                        
                                    </div>
                                </div>
                            </div>
						<div class='panel panel-default'>
                                <div class='panel-heading' role='tab' id='headingTwo'>
                                  <h4 class='panel-title'>
                                   
                                    <span class='glyphicon glyphicon-tasks' aria-hidden='true'></span> Source Code
                                    
                                  </h4>
                                </div>
                                <div id='collapseTwo' class='panel-collapse collapse in' role='tabpanel' aria-labelledby='headingFour'>
                                    <div class='panel-body'>
                                    
                        				
                                        <div class='row'>
											
											<div class='col-md-11'>
													Add the following code to the head section of your page: <br><br>
                            				</div>
											<div class='col-md-11'>
											
<pre class='prettyprint'>
&lt;link href="css/impress-demo.css" rel="stylesheet" /&gt;
&lt;script src="js/impress.js"&gt;&lt;/script&gt; 
</pre>
											</div>
										</div>
										<div class='row'>
											<div class='col-md-11'>
											Next, copy and paste the following code and add it right after the closing head tag.<br><br>	

                            				    
                                               
                            				</div>
                                        
                                            <div class='col-md-11'>
                            				    <pre class='prettyprint'>";
													<?php show_source($code); ?>
												</pre>
                            				    
                                               
                            				</div>
                            				
                            				
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
							
                        
                    </div>              
            
          
            
             </div>

</div>

<?php
    include("footer.html");
        
?>

</body>
</html>
