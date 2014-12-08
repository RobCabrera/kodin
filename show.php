<?php 
session_start();
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

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=1024" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<title>Your Own Interactive TOS</title>

	

	<link href="css/impress-demo.css" rel="stylesheet" />
	<link rel="apple-touch-icon" href="apple-touch-icon.png" />
	<script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js?skin=desert"></script>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="js/customjs.js"></script>
	<link href='css/custom-style.css' rel='stylesheet' />
	<link href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css' rel='stylesheet' /> 
	<script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js'></script>


</head>


<body class="impress-not-supported">

    <?php 
    //$topics = $_POST["topics"]; //getting the text
    //$sections = $_POST["sections"]; //getting the text
    $realtopics = explode('_', $topics);
	$realtopicsN = explode('_', $topics);
    $realsections = explode('_', $sections);
    ?>
    
    <!--
    For example this fallback message is only visible when there is `impress-not-supported` class on body.
    -->
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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="demo.php">Demo</a></li>
                        <li><a href="createone.php">Create Your Own </a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </div> 
    </nav>
    
   <div class="custom-wrap">
        <div class="fallback-message" style="visiblity:hidden">
        <p>Your browser <b>doesn't support the features required</b> 
        </div>
        
        <div id="impress">
        
        
        <?php
        
        
        
        $x = -1000;
        $y = -2000;
        $r = 0;
        $s = 1;
        // Pick Random, color from list
        $array = Array('color:white');
        $ColoRrand = array_rand($array);
        
        // Pick Random fonts
        $Farray = Array('font-family:serif', 'font-family:Comic Sans MS', 'font-family:Gadget', 'font-family:Arial ',
                       'font-family:sans-serif', 'font-family:Helvetica');
        $FontRrand = array_rand($Farray);
        
        // Pick Random text blockmovment
             $SectionMovearray = Array('show sliderleft','show sliderup', 'show sliderright','show rotateright','show rotateleft');
             $SectionMove = array_rand($SectionMovearray);
              
            $TopicTextarray = Array('show sliderleft','show sliderup','show sliderright','show rotateright','show rotateleft','show zoomin');
             $TopicText = array_rand($TopicTextarray);
             
        //List of Key words
        $keywords = array('1'=>"do",'2'=>"don't",'3'=>"remains",'4'=>"left",'5'=>"many","6"=>"lost",
                              '7'=>"should",'8'=>"could",'9'=>"not",'10'=>"good",'11'=>"bad","12"=>"isn't",
                              '13'=>"few",'14'=>"enough",'15'=>"shouldn't",'16'=>"couldn'17",'18'=>"less","19"=>"minus",
                              '20'=>"add",'21'=>"is not",'22'=>"diff",'23'=>"sum",'25'=>"less","26"=>"exactly",
                              '27'=>"complete",'28'=>"sometime",'29'=>"just",'30'=>"same",'31'=>"some", '32'=>"law",
                              '33'=>"common",'34'=>"old" ,'35'=>"sub",'36'=>"order");
        

 $newtopic="";
 $newsection="";
        for ($i=0;$i<count($realtopics);$i++)
        {
        $SizeRand = rand(20,60);
        ?>
			
		
			<div class="step" 
                data-x="<?php echo $x;?>" data-y="<?php echo $y; ?>" 
                data-rotate="<?php echo $r; ?>"  data-scale="<?php echo $s; ?>" >
             

    			 <div style="float:Left; padding-right:100px;" >
                	 <h3>Terms Of Service:</h3>
					 <?php 
						 for ($c=0;$c<count($realtopicsN);$c++)
						 {

					   ?> <h4> <?php 

					   if ($realtopicsN[$c]==$realtopics[$i])
					   {
					  ?> <b class=" show zoomin" style="color:darkgreen"> <?php echo $c+1; echo " - "; echo ucwords($realtopicsN[$c]); ?> </b><?php
					   }
					   else {
					  echo $c+1; echo " - "; echo ucwords($realtopicsN[$c]);
					   }


					   ?> </h4> <?php
						 }
						?>
                    
         </div>
              
                
              <b  class="<?php echo $TopicTextarray[$TopicText]?>" style="<?php echo $array[$ColoRrand];?> ; font-size:<?php echo $SizeRand;?>% ;
              <?php echo $Farray[$FontRrand];?>">
              
         <?php 
          $realtopicsU= ucwords($realtopics[$i]);
        foreach($keywords as $wordstatus => $word){
              $word= ucwords($word);

             if(preg_match_all('/'.$word.'/',$realtopicsU))
             {
                 
	        $realtopicsU = str_replace($word,"<b style='font-family:Courier New ;color:red'>$word</b>", $realtopicsU);
	        $newtopic = $realtopicsU;
  
             } 
	else 
	       {	       $newtopic = $realtopicsU;	       }
	       }

    echo  $newtopic;
      
          $ColoRrand = array_rand($array);   
          $FontRrand = array_rand($Farray);
          $TopicText = array_rand($TopicTextarray);
         ?>
         </b>
                <p class="<?php echo $SectionMovearray[$SectionMove]?>" style="<?php echo $array[$ColoRrand];?>;  font-size:<?php echo $SizeRand;?>% ; <?php echo $Farray[$FontRrand];?>" >
            <?php
            $realsectionMix= ucwords($realsections[$i]);
            
             foreach($keywords as $wordstatus => $word){
              $word= ucwords($word);
               
             if(preg_match_all('/'.$word.'/',$realsectionMix))
             {
               $realsectionMix = str_replace($word,"<b style='font-family:Courier New ;color:red'>$word</b>", $realsectionMix);
	       $newsection = $realsectionMix;
	        } 
	else 
	       { $newsection = $realsectionMix;}
	       }
             
              echo  $newsection;   
                ?>
				
                </p>
               
        </div>
        
        
        
        <div class="step" data-x="<?php echo $x; $x+=1000; ?>" data-y="1500">
        <b><?php echo $realtopics[$i] ?></b><p> <?php echo $realsections[$i] ?></p>
        </div>
        
        
        <?php
			$ColoRrand = array_rand($array);
         $SectionMove = array_rand($SectionMovearray);
        $x = $x+ rand(200,1000);
        $y = $y+ rand(150,1500);
        $r = rand(1,180);
        $s = rand(1,2);		
					
					
        }
        
        
        ?>

        <div id="overview" class="step" data-x="3000" data-y="1500" data-scale="10">
        </div>
        </div>
        
        <div class="hint">
        <p>Use a spacebar or arrow keys to navigate</p>
        </div>
    </div>

    <script>
    if ("ontouchstart" in document.documentElement) {
    document.querySelector(".hint").innerHTML = "<p>Tap on the left or right to navigate</p>";
    }
    </script>
	
    
    <script src="js/impress.js"></script>
    <script>impress().init();</script>
   
	
	<?php include("footer.html"); ?>
</body>
</html>

<?php
	$no = mt_rand(100,10000);

	$page = ob_get_contents();


	$from = strpos($page, '<body class="impress-not-supported">');
	$to = strpos($page, '</body>');
	$contents = substr($page, $from, $to - $from);

	ob_end_clean();

	$basename = base_url();

	//file_put_contents('./view/'.$no.'document.html', $page);
	$filename1 =  './view/'.$no.'create_own_int_tos.html';
	$fullpage = './view/'.$no.'create_own_int_tos_fullpage.html';

	$f = fopen($filename1, "w"); 
	fwrite($f, $contents); 
	fclose($f); 

	$f2 = fopen($fullpage, "w"); 
	fwrite($f2, $page); 
	fclose($f2); 
 
	$_SESSION['fullpagename'] = $fullpage;
	$_SESSION['short'] = $filename1;
	header("Location: presentation.php");
	exit();

?>
