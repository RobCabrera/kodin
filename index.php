
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> <html xmlns="http://www.w3.org/1999/xhtml"> <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<link href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css' rel='stylesheet' /> 
<script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js'></script>
   




<nav class="navbar navbar-default" role="navigation"> <div class="container">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
data-target="#bs-example-navbar-collapse-1">
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
  </div> </nav> <div class="col-md-offset-2 col-md-8"> <div class="panel-group" id="accordion" role="tablist" 
aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" 
aria-controls="collapseOne">
         App information
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        This application simulates an online fine print/legal document presentation. The document you are 
submitting will be made into an interactive, user friendly, appealing presentation. The document submitted below must have an empty line break between each sections and a line break between topic and text. Load the sample file for example.
    </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" 
aria-expanded="false" aria-controls="collapseTwo">
         Use the App to generate presentation
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
       
<form method="post" action="presentation.php">
    <a id='textload' class='btn btn-info btn-large' href="#">Load a sample document </a>
   <input class='btn btn-primary btn-large' type="submit" name="submit" value="Make the interactive 
presentation">
   <br>TOS:<br>
 <textarea id="document" name="document" class="form-control" rows="25" cols="130"></textarea><br>
  
</form>
      </div>
    </div>
  </div> </div> <script>
	$(document).ready(function() {
		$('#textload').click(function(){
		$.ajax({
           url : "tos.txt",
           dataType: "text",
           success : function (data) {
               $("#document").text(data);
           },
           error: function(data){
           	alert(data);
           }
       });
	}); });
</script>
