<!Doctype HTML>
<html>
	<head>
	
		<meta charset="utf-8">
		<link rel="stylesheet" href="css/custom.css" >
		<link rel="stylesheet" href="css/bootstrap.min.css" >
		<link rel="stylesheet" href="css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="css/fa.min.css">
		<title> BITSA TESTING PAGE</title>
		
	</head>
	<body>
	
	<canvas id="myChart" width="400" height="400"></canvas>
	
	
	
	
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src = "js/chart.min.js"></script>
	<script>
	function score( data ){

	
	//Get the context of the canvas element we want to select
	var ctx = document.getElementById("myChart").getContext("2d");
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
			animateScale : false,
			
			//Function - Will fire on animation completion.
			onAnimationComplete : done()
		}

	
	
	}
	
	

	function done(){
		//on Animate Complete handler goes here
	}
	</script>
	<script>

	var data = [
	        	{
	        		value: 30,
	        		label: "Audience",
	        		color:"black"
	        	},
	        	{
	        		value : 50,
	        		color : "#E0E4CC"
	        	},
	        	{
	        		value : 100,
	        		color : "#69D2E7"
	        	}			
	        ]
		//score(data);
	da = [
	   	{
		   	value: 131,
		   	label: "Audience",
		   	color:"black" 
		},
	   	{ 
		   	value: 108, 
		   	label: "Hubba", 
		   	color:"red"
},
	   	{ value: 76, label: "Bubba", color:"green" },
	   	{ value: 30, label: "Feni", color:"blue" },
	   	{ value: 50, label: "Moha", color:"purple" },
	   	{ value: 50, label: "Ian", color:"white" },
	   	{ value: 10, label: "Ebby", color:"brown" }
	   	];

   	//score(da)
   	score([{value: 131, label: "Audience", color:"black" },{ value: 108, label: "Hubba", color:"red" },{ value: 76, label: "Bubba", color:"green" },{ value: 30, label: "Feni", color:"blue" },{ value: 50, label: "Moha", color:"purple" },{ value: 50, label: "Ian", color:"white" },{ value: 10, label: "Ebby", color:"brown" }]);

	   	

	</script>
	</body>
</html>