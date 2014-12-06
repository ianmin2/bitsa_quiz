<?php

/* SET UP BACKGROUND SESSION SERVICES */
	include "basics.php";
	$basics = new basics();

	
/* ORDER THE QUESTIONS BY CATEGORY */
	$quiz = array();
	
	foreach( $_SESSION['categories'] as $category ){
		$qns  = array();
		$cQuery = $basics->connection->query("SELECT * FROM questions WHERE category='".$category."' ");
		
		//Do the iteration over the db table while setting the quiz array quetions to the specified category.
		while($d = mysqli_fetch_array($cQuery)):
			$qns[] = array( "id"=> $d["id"], "question" => $d["question"], "answer" => $d["answer"] , "done" => $d["done"], "points"=>$d["points"] );
		endwhile;
		$quiz[$category] = array( "data" => $qns);
	}
	
	$_SESSION['quiz'] = $quiz;

/* Get the next unanswered question in a category */
	function nextQuestion( $category ){
		$da = "";
		
		$questions = $_SESSION['quiz'][$category]['data'];
		
		
			foreach( $questions as $id=>$question ){
				
				//Check if the question has been answered and display it if so otherwise continue with iteration
				if( $question['done'] == 0 ) {
					echo json_encode($question);
					die;
				}
			
			}
			
		echo json_encode( array("id" => "EOC") );	
		die;
		
	}

	
/* Handle the correct answering of a question */
	function handleAnswer( $id, $team, $points, $basics ){
		
		/* UPDATE THE QUESTIONS TABLE BY LISTING THE QUESTION AS ANSWERED */
		$qQuery = $basics->connection->query("UPDATE questions SET done=1 WHERE id='".htmlspecialchars($id)."' ");
		if($qQuery){
			
			/* UPDATE THE HISTORY TABLE WITH THE NEW DEVELOPMENT */
			$qQuery = $basics->connection->query("INSERT INTO history ( team, question, score ) VALUES ( '".@htmlspecialchars($team)."', '".@htmlspecialchars($id)."', '".@htmlspecialchars($points)."' )");
			
			if($qQuery){
				echo 1;
				exit;
			}else{
				echo 2;
				exit;
			}
			
			
		}else{
			
			echo 0;
			die;
			
		}
		
	}
	
	if( @$_REQUEST['id'] != "" && @$_REQUEST['team'] != "" && @$_REQUEST['points'] != "" ):
		/* Update the relevant tables and give a go ahead for the answering of the next question */
		handleAnswer($_REQUEST['id'], $_REQUEST['team'], $_REQUEST['points'], $basics);
		exit;
	elseif(@$_REQUEST['category'] != ""):
		/* Display the next question in the category */
		nextQuestion($_REQUEST['category']);
		exit;
	else:
		echo "No condition was met";	
	endif;
/*
	echo "<pre>";
	print_r($_SESSION['categories']);
	echo "<br><br><br>";
	print_r($quiz);
*/
	
	
	


