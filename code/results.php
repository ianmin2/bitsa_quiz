<?php

class results{
	
	public $basics;
	
	public function __construct(){
		/* Create an instance of the basics class */
		include "basics.php";
		$this->basics = new basics();
		
	}
	
/* The Team Display Function */	
	function teamData( $specific = 0 ){
		
		$tData = array();
		
		if($specific == 0 || $specific == "" || $specific == "undefined" ){
							
			/* 
			 * GET THE RELEVANT TEAM DATA FROM THE SESSION AND ITERATE THROUGH EACH TO CREATE A TEAM VIEW PAGE 
			 */		
			$teams =	$_SESSION ['teamsList'];
		 	foreach( $teams as $team ) {
				
				$tData[$team] = $this->getMembers($team);
				
			}
			
			return $tData;
			
		}else{
			
			/* GET THE INFORMATION FOR THE SPECIFIED TEAM  */
			
			$tData[$specific] = $this->getMembers($specific);
			return $tData;
			
		}
	
	}
	
	
/* The friendly team member fetcher */
	function getMembers( $team ){
		
		$members = array();
		/* Iterate through the team array while searching and keeping team data in an array */
		
		foreach($_SESSION ['players'] as $member ){
			
			if( $member['oteam'] == $team ){
				$members[] = $member;
			}
			
		}
		return $members;
		
	}

/* The team display function */
	function showTeam ( $team = 0 ){
		$da= '<div class=" col-lg-12 container-fluid center-block">';
		@$color = $_SESSION['teams'][$team]['color'];
		/* FETCH A LIST OF THE RELEVANT TEAM[s] */
		$teamData = $this->teamData($team);
		echo "<pre>";
		/* Use the fetched list to draw a team[s] layout */
		//IF THE REQUEST REQUIRES MULTIPLE TEAM DISPLAY ..
		if( count($teamData) != 1 ){
			
			//Draw the official multiple team layout
			foreach($teamData as $team=>$members){
				
				/* Display minimal Teams Data and offer the user a chance to load Team Data onclick */
				$color = $_SESSION['teams'][$team]['color'];
				( strtolower($color) == "white" ) ? $color = "black" : $color = $color ;
				//@print_r($_SESSION ['teams'][$team]['name']);
				$da .= '<div class="alert alert-warning center-box fly-out-sm col-lg-6 b-title  center-block" style="color:'.@$color.' !important; font-size:18px; font-weight:bold;  "  role="alert" onclick="showResults('.$team.')"><span class="badge btn darker " style="color: white !important;"> '.$team.' </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$_SESSION ['teams'][$team]['name'].' </div>';
				
			}
			
		}else{
			//Draw the official single team layout
			foreach($teamData as $members){
				
				( strtolower($color) == "white" ) ? $color = "black" : $color = $color ;
				//Display the member Names
				$da .= '<div class="jumbotron darker">
						 <div class="alert-warning" style="border-radius:20% 5% 20% 5%; max-height: 100px !important; padding: 0 !important; color:'.$color.';">
							 <span class="b-title" style="font-weight:bold; font-size: 42px !important; "> '.$_SESSION['teams'][$team]['name'].'</span> ~ <span class="b-slogan" style="font-size:28px !important; ">'.$_SESSION['teams'][$team]['slogan'].' </span>
									';
																
								$da	 .=' </div>';
				
								$i = 1;
								foreach ($members as $member){
									( strtolower($member['gender']) == "m" ) ?  $gender = '<i class="fa fa-male fa-lg "></i>' :  $gender = '<i class="fa fa-female fa-lg"></i>' ;
								
									$da .= '<div style="" class=" b-name " style="font-family: names !important; ">
												'. $gender.' &nbsp; &nbsp;'. $member['name'] .' &nbsp;
												</div>';
								
									/*
									 $da .= '
									 <div class="container-fluid col-lg-5">
									 <table class="col-lg-12">
									 <tr>
									 <td><div class="" >'. $i .'</div></td>
									 <td> <div class="" >'. $member['name'] .'</div></td>
									 <td><div class="" > '. $gender.' </div></td>
									 </tr>
									 </table>
									 </div>
									 ';
									 */
									$i++;
								}
				
				
			}
			
		}
		
	$da .= '</div>';
	
	print $da;
		
	}
	
//END OF CLASS
}


$result = new results();
$result->showTeam(@$_REQUEST['team']);
?>