<?php 

include("basics.php");
$basics = new basics();

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="css/custom.css" >
<link rel="stylesheet" href="css/bootstrap.min.css" >
<link rel="stylesheet" href="css/bootstrap-theme.min.css">
<link rel="stylesheet" href="css/fa.min.css">
<title>BITSA Quiz  | Welcome</title>
</head>

<body>


        <nav class="navbar navbar-default  " role="navigation" style="max-height:40px; z-index:10 !important; ">
          <div class="container-fluid" style="max-height:100px; z-index:10 !important;">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed  in" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
             <a class=" focus navbar-brand deepblue bf " href="#">BITSA Quiz Night</a>
            </div>
        
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
              
                <li class="active fly-out" data-toggle="tooltip" data-placement="bottom" title="Tooltip on left"><a href="#" onclick="javascript:location.reload();">Questions</a></li>
                
                <li class="fly-out"><a href="#" onclick="showResults()">Teams</a></li>
                
                <li class="fly-out"><a href="#" onclick="getScore()" >Scores</a></li>
                
                <li class="fly-out"><a href="#">Categories</a></li>
                
              </ul>
              
              <ul class="nav navbar-nav navbar-right ">
              <li class="dropdown fly-out">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">  <span style="color:white; background:red;  border-radius:10% 0 0 10%; padding:1px; padding-left:5px;"> &copy;<?php echo date("Y") ?>&nbsp;<i class="fa fa-compass fa-spin "></i> I&Eg </span> <span style="background:orange; padding:1px; color:white; border-radius:0 10% 10% 0; padding-right:5px;">for BITSA UEAB </span> </span></a>
                  
                </li>
                
                <div class="navbar-form navbar-left " role="search">
                <!--
	               	 <div class="form-group">
		                  <input type="text" class="form-control" placeholder="Search">
		                </div>
                -->
                <div 
                <button type="submit" class="btn btn-success" onclick="addScore(0)"><i class="fa fa-dollar "></i><audience id="t0t"> <?php //echo $basics->getCrowdScore(); ?> </audience>&nbsp; Audience</button>
                
               </div>               
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>


<div class="container col-lg-12">

<!-- sidebar -->   
    <div class="col-lg-2">
    
    	
    
    <div class="panel-group" id="accordion">
  <div class="panel panel-info fly-out ">
    <div class="panel-heading">
    <a data-toggle="collapse" onclick="javascript:location.reload();" data-parent="#accordion" href="#collapseOne">
      <h4 class="panel-title">
         <span class="badge pull-right"></span>
          Questions
       </h4>
    </a>
    </div>
    
  </div>
  
  <div class="panel panel-default fly-out ">
    <div class="panel-heading darker">
    <a data-toggle="collapse" data-parent="#accordion" onclick="showResults()" href="#collapseFour">
      <h4 class="panel-title ">
        
        <span class="badge pull-right"></span>
          Teams
        
      </h4>
    </a>
    </div>
    <div id="collapseFour" class="panel-collapse collapse ">
      <div class="panel-body">
       	<ul class="nav nav-pills nav-stacked list-group" role="menu">
       	<?php       
       		echo $basics->teamsList();       	
       	?>
               
        </ul>
      </div>
    </div>
  </div>
  
  <div class="panel panel-default  fly-out">
    <div class="panel-heading ">
    <a data-toggle="collapse" data-parent="#accordion" onclick="getScore()"  href="#collapseTwo">
      <h4 class="panel-title">
          Scores        
      </h4>
    </a>
    </div>
    
  </div>
  <div class="panel panel-default fly-out">
    <div class="panel-heading success">
    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
      <h4 class="panel-title ">
          Categories
      </h4>
    </a>
    </div>
    <div id="collapseThree" class="panel-collapse collapse in">
      <div class="panel-body">
        <ul class="nav nav-pills nav-stacked">
 		<?php 
 			echo $basics->showCategories(true);
 		?>
		</ul>
      </div>
    </div>
  </div>
</div>
    
    </div>
<!-- eo sidebar>


<!-- main content -->
    <div class="col-lg-10">
    	<div id="chart_container" class="col-md-7">
    		<canvas id='bChart'  class="col-lg-12 container-fluid " style="height: 0px; background:gray;"></canvas> 
    	</div>
    	<div class="col-lg-12 container-fluid" id="quizData" >
        
        <div class="container-fluid" id="hi1">
           
            <div id="content" class="jumbotron darker " >
              <h2><code class="bf" >WELCOME TO THE BITSA QUIZ NIGHT!</code></h2>
              <p><Question>Welcome to the BITSA Quiz </Question></p>
              <p><a class="btn btn-primary btn-sm" role="button" onclick="halveScore()"><i class="fa fa-dollar fa-2x " style="color:red;"></i>&nbsp;
              <points style="color: white; font-weight: bold; font-size: 20px;">10</points> </a></p>
    		</div>
        
        </div>
        
        <div class="container-fluid" >
        
        	<?php 
        	
        		echo $basics->teamScore();
        	
        	?>
        	
        	
        	
            
              
              
            </div>
            
        </div>
       
         
        
            
        </div>
        
    
    </div>
<!--eo main content -->   

    
    
    
</div>


<!-- 
	Scripts to be imported go below here!
-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src = "js/chart.min.js"></script>
<script>
        	
/*  Clear all pre-existing scoring data from the document */
 qdata = JSON.stringify({ qid: 0 , qpoints: 0 });
 localStorage.setItem("qdata", qdata);


        	
	

/* Display answer */




/* End of answer display*/

/*
 * Display a question from a given category 
*/
	function showQuestion( $data ){
		
		$.post( "questions.php", { category: $data }, function( data, results ){

			localStorage.setItem("cdata", JSON.stringify( { cname : $data } ) );
			data = JSON.parse(data);
			
			if( data.id != "EOC" ){
			
				//console.log(data);
				$(function(){
					categData = '<h2><code class="bf" id="answer" style="cursor:pointer;" >'+ $data +'</code></h2>';
					categData += '<p><div><h2>' + data.question +'</h2></div></p>';
					categData += '<p><a class="btn btn-success btn-sm fly-out-sm" role="button" onclick="halveScore()" style="border-radius:50%;" ><i class="fa fa-dollar fa-2x " style="color:black;"></i>&nbsp;';
					categData += '<points style="color: white; font-weight: bold; font-size: 20px;">'+ data.points +'</points> </a></p>';

					qdata = JSON.stringify({ qid: data.id , qpoints: data.points , qansw: data.answer });
					localStorage.setItem("qdata", qdata);
					
					$('#content').html(categData);    
					$(function(){
						
						//$('.collapse').collapse();
						$("#answer").dblclick(function(){
							q = JSON.parse( localStorage.getItem("qdata") );
							alert( q.qansw );
						});
						
						
					});
				});
				
			}else{
				
				categData = "<h1><code>End Of Category</code></h1>"
					
				qdata = JSON.stringify({ qid: 0 , qpoints: 0 });
				localStorage.setItem("qdata", qdata);
				
				$('#content').html(categData);
			}
			
		});
		
	}
	
/*   
 *Update the score in favour of the selected team 
*/
function addScore( $team ){

	qdata = JSON.parse( localStorage.getItem("qdata") );

	
	$.post( "questions.php",
			 { id: qdata.qid, points: qdata.qpoints, team: $team },
			 function(data, result){
				 $(function(){
					 
					 tid = $("#t"+$team+"t") ;
					if(data == 1){
						/* Prepare the score */
						v = parseInt(tid.html()) + parseInt(qdata.qpoints);
						
						/* Re-initialize the stored score values */
						qdata = JSON.stringify({ qid: 0 , qpoints: 0 });
						localStorage.setItem("qdata", qdata);

						/* Set the aesthetic value of the scores to the previous plus the current */
						tid.html(v);

						/* Call the next question in the given category */
						$categ = JSON.parse( localStorage.getItem("cdata") )
						showQuestion( $categ.cname );
						
					}else{
						alert("an error occured!" + data);
					}
					
				 });
					
			}
	 );
	
}

/* Display The current team scores */
function showResults( $team ){

	if($team == "" || $team == "undefined"){ $team = ""; }

	$.post('results.php',
			 { team : $team },
			function(data, results){
				$("#quizData").html(data);
			}
		);
	
}


/* Halve the score for an upcoming team */
function halveScore(){

	//Retreive locally stored values and manipulate them accordingly
	qdata = JSON.parse( localStorage.getItem("qdata") );
	
	if( qdata.qpoints > 0 && !isNaN(qdata.qpoints) ){

		newScore = ( parseInt(qdata.qpoints) / 2 );
		
		//Update the locally stored values
		qdat = JSON.stringify({ qid: qdata.qid , qpoints: newScore });
		localStorage.setItem("qdata", qdat);

		//Update the score on the screen
		$(function(){
			$("points").html(newScore);
		});
	}else{	

		
		//Update the locally stored values to a score of zero
		qdata = JSON.stringify({ qid: 0 , qpoints: 0 });
		localStorage.setItem("qdata", qdata);

		//Update the score on the screen
		$(function(){
			$("points").html(0);
		});		
	}
}	


function getScore(){
	$.post(
		"score.php",
		{},
		function( data, results){
			
			$(function(){
				$("#bChart").css({ 'min-height' : '800', 'min-width': '800', 'max-width': '800', 'border-radius' : '100% 50% 100% 50%'});
				$("#quizData").html(data);
				//console.log(data);
			});
		}		
	);
}


/* 
 *
 SCORE CHART SETTINGS
 * 
 */
 function score( data ){

data = data;
	console.log(data);
	//Get the context of the canvas element we want to select
	var ctx = document.getElementById("bChart").getContext("2d");
	new Chart(ctx).Doughnut(data);
	

	ctx.defaults = {
			//Boolean - Whether we should show a stroke on each segment
			segmentShowStroke : true,
			
			//String - The colour of each segment stroke
			segmentStrokeColor : "red",
			
			//Number - The width of each segment stroke
			segmentStrokeWidth : 2,
			
			//Boolean - Whether we should animate the chart	
			animation : true,
			
			//Number - Amount of animation steps
			animationSteps : 100,
			
			//String - Animation easing effect
			animationEasing : "easeOutBounce",
			
			//Boolean - Whether we animate the rotation of the Pie
			animateRotate : true,

			//Boolean - Whether we animate scaling the Pie from the centre
			animateScale : true,
			
			//Function - Will fire on animation completion.
			onAnimationComplete : done()
		}

	
	}
		

	function done(){
		//on Animate Complete handler goes here
		console.log("done!");
	}
 /*
 EO SCORE CHART SETTINGS
 */



</script>
<!--
	End of Script importation
-->
</body>
</html>
