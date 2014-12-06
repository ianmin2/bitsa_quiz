<pre>
<?php

include "basics.php";
$basics = new basics();


 function getScore($basics){ 
 
	$teams = $_SESSION['teams'];
	$data  = '';
	$int   = '';
	
	$sQuery = $basics->connection->query("SELECT sum(score) as score FROM history WHERE team='0' ", true );
	
	while( $s = mysqli_fetch_array( $sQuery) ){
		$data .= '{	value: '.$s['score'].', label: "Audience", color:"black" }';
		$int  .= '<div class="alert alert-warning center-box fly-out-sm col-lg-6 b-slogan  center-block" style="min-width: 10px; min-height:10px; text-transform: uppercase; font-weight: bold; font-size: 30px; " >Audience  <span class="pull-right" style=" color:red; " > ['.$s['score'].']</span> </div>';
	}
	
	
	foreach ($teams as $id=>$team):
	
		$sQuery = $basics->connection->query("SELECT sum(score) as score FROM history WHERE team='".$id."' ", true );
		
		while( $s = mysqli_fetch_array($sQuery)){			
			$data .= ',{ value: '.$s['score'].', label: "'.$team['name'].'", color:"'.$team['color'].'" }';	
			$int  .= '<div class="alert alert-warning center-box fly-out-sm col-lg-6 b-slogan center-block"  style="background-color: '.$team['color'].' !important; text-transform: uppercase; font-weight: bold; font-size: 30px; " style="min-width: 10px; min-height:10px;">'.$team['name'].' <span class="pull-right" style=" color:red; "> ['.$s['score'].'] </span>  </div>';
					
		}
	
	endforeach;
	
 	$data 	= 	"<script>$(function(){ score(".'['.$data.']'."); }); </script>"; 
 	$data .=  $data."<br>".$int;	 	
 	echo 	$data;
 
 }
 

 
 getScore($basics);
 
 ?>
 

