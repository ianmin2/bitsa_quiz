<?php

class basics{

public 	$connection;


	
   function __construct(){
   	
   		/* Establishing a database connection */
	   	chdir("../");
	   	
	   	$id = "index.php";
	   	$connect = true;
	   	include("r_main.php");
	   	
	   	chdir("code");
   	
   		/* Allow other functions to make db connections. */
	   	$this->connection = $connection;

	   	/* Main constructor variable declaration */
	   	$qns = array();
	   	$cats = array ();
	   	$teams = array ();
	   	$players = array ();
	   	$teamsList = array ();	   	
	   	
		// The Main Queries
		
		// Get all functional teams
		$tquery = $connection->query ( "SELECT * FROM teams WHERE teams.on=1  ", true );
		
		// get all the players
		$pquery = $connection->query ( "SELECT * FROM players ", true );
		
		//Pick all the questions and categories
		$cquery = $connection->query ( "SELECT * FROM questions", true );
		
		/* Data fetching */
		
		// Get the Team Details and Store them in an associative array.
		while ( $t = mysqli_fetch_array ( $tquery ) ) {
			
			$teams [$t ["id"]] = array (
					"id" => $t ["id"],
					"name" => $t ["name"],
					"slogan" => $t ["slogan"],
					"color" => @$t ["color"] 
			);
			$teamsList [] = $t ["id"];
			
		}
	
		// Store the relevant Player Data in an easy to analyze format
		while ( $p = mysqli_fetch_array ( $pquery ) ) {
			if (isset ( $teams [$p ['team']] )) {
				$players [$p ["id"]] = array (
						"name" => $p ["name"],
						"oteam" => $p ["team"],
						"team" => $teams [$p ["team"]] ["name"],
						"gender" => $p ["gender"] 
				);
			}
		}
		
				
		//Store the given categories and questions in an appropriate associative array
		while ( $c = mysqli_fetch_array ( $cquery ) ) {
			if (! in_array ( strtoupper ( $c ['category'] ), $cats )) {
				$cats [] = strtoupper ( $c ['category'] );
			}
			
			$qns[ $c['id'] ] = array("question" => $c["question"], "category"=> $c["category"], "done"=>$c["done"]);
			
		}
		
		
		
		$_SESSION ['teams'] 		= $teams;
		$_SESSION ['questions'] 	= $qns;
		$_SESSION ['players'] 		= $players;
		$_SESSION ['categories'] 	= $cats;
		$_SESSION ['teamsList'] 	= $teamsList;
		
		//EO Constructor
   	}
   	
/* Generate  a list of the currently participating teams */   	
	function teamsList() {
		$da = "";
		foreach ( $_SESSION['teams'] as $i => $team ) {
			$da .= '<li class="fly-out-sm" onclick="showResults('.$team['id'].')" ><span class="badge btn-info">'.$team['id'].'</span><a href="#">' . $team ['name'] . '</a></li>';
		}
		return $da;
	}

/* Generate a list if the teams current scores */
	function teamScore() {
		$da = "";
		$sumScore = 0;
		foreach ( $_SESSION ['teams'] as $i => $team ) {
			
			$sQuery = $this->connection->query("SELECT sum(score) as points FROM history WHERE team='".$team['id']."' ", true); 
			while($s = mysqli_fetch_array( $sQuery)){
				$sumScore = $s["points"];
			}
			
			( $sumScore == "" )? $sumScore = 0 : $sumScore = $sumScore ; 
			
			$da .= ' <div class="row col-lg-3 center-block">              
	                <div class="thumbnail btn-default" style="margin-top:2px;">                  
	                  <div class="caption">                    
					
	                    <p><a href="#" onclick="addScore('.$team['id'].')" class="btn btn-success fly-out-sm " role="button" style="width:100%; opacity: 1;"><i class="fa fa-dollar fa-2x fa-spin " style="color:white;"></i> &nbsp; <bitsa id="t' . $team ['id'] . 't">'.$sumScore.'</bitsa></a></p>
	                    <p><i class="fa fa-group fa-2x btn " style="color: ' . $team ['color'] . ' !important;"> </i><bitsa style="font-size:18px; color: ' . $team ['color'] . ';">' . $team ['name'] . '</bitsa></p>
	                   
	                  </div>
	                </div>             
	            </div>';
		}
		return $da;
	}
	
/* Generate a list of  the quiz history */
	function showHistory() {
		$da = "";
		$tData = "";
		$history = array ();
		
		foreach ( $_SESSION ['teamsList'] as $team ) {
			
			if ($tData == "") {
				$tData .= "team = '" . $team . "' ";
			} else {
				$tData .= " OR team = '" . $team . "' ";
			}
		}
		
		$hquerys = "SELECT * FROM history WHERE " . $tData;
		$hquery = $connection->query ( $hquerys );
		
		while ( $h = mysqli_fetch_array ( $hquery ) ) {
			$history [] = array (
					"team" => $h ["team"],
					"question" => $h ["question"],
					"score" => $h ["score"] 
			);
		}
		
		// Format the results for proper printing
		
		foreach ( $history as $event ) {
			$da .= '' . json_encode ( $event );
		}
		return $da;
	}
	
	
	function showCategories($isList = false) {
		
		$da = "";		
		
		foreach ( $_SESSION['categories'] as $cat ) {
			$cats = htmlentities("'".$cat."'");
			if ($isList) {
				$da .= '<li class="fly-out-sm"><a onclick="showQuestion('.$cats.')" >' . htmlentities($cat). '</a></li>';
			} else {
				$da .=  $cat;
			}
		}
		return $da;
		
	}
	
	function getCrowdScore(){
		$score = 0;
		$cQuery = $this->connection->query("SELECT sum(score) as score from history WHERE team=0", true);
		
		while($s = mysqli_fetch_array($cQuery)){
			$score = $s['score'];
		}
		
		return $score;
		
	}
	
	

//End of class
}