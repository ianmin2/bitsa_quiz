<?php  

/*
	if( @$_REQUEST['success'] == 1 ){
		
		echo "<h1> SUCCESSFULLY ADDED! </h2>";
		die;
	}
*/
include "basics.php";
$basics = new basics();

// 

function doInsert($basics, $query){
	 
	if( $basics->connection->query($query, true) ){
		
		echo "<script>console.log('done')</script>";
		
	}else{
		
		echo "<script>console.log('Failed')</script>";
		die;
	}
	 
}


if( @$_REQUEST['table'] != "" ){
	
	switch( $_REQUEST['table'] ):
	
		case "players":
				$query = "INSERT INTO players ( name, team, gender ) VALUES ";
			break;
		
		case "questions":
				$query = "INSERT INTO questions ( question, answer, category, points) VALUES ";
			break;
			
		case "teams":
				$query = "INSERT INTO teams ( name, slogan, teams.on, color ) VALUES ";
			break;
			
		default:
			echo "UNRECOGNIZED!";
			die;
			break;
			
	endswitch;
	
}

if (@$_FILES[csv][size] > 0) { 

    //get the csv file 
    $file = @$_FILES[csv][tmp_name]; 
    
    $handle = fopen(@$file,"r"); 
    
     $da = "";
     
    //loop through the csv file and insert into database 
    do { 
    	
        if ( $data[0]) { 
          	
        	
        	if( @$_REQUEST['table'] != "" ){
        	
        		switch( $_REQUEST['table'] ):
        	
	        		case "players":
        			//name, team, gender
	        			$da = $query. " ( '".addslashes($data[0])."', '".addslashes($data[1])."', '".addslashes($data[2])."'  )";
	        		break;
	        	
	        		case "questions":
	        			//question, answer, category, score
	        			$da = $query. " ( '".addslashes($data[0])."', '".addslashes($data[1])."', '".addslashes($data[2])."', '".addslashes($data[3])."'  )";
	        			break;
	        	
	        		case "teams":
	        			//name, slogan, on, color
	        			$da = $query. " ( '".addslashes($data[0])."', '".addslashes($data[1])."', '".addslashes($data[2])."', '".addslashes($data[3])."'  )";
	        			break;
	        	
	        		default:
	        			echo "UNRECOGNIZED!";
	        			die;
	        			break;
	        			
        		endswitch;        	 
        	      	
        	} 
        	
        	doInsert( $basics, $da );
        	
        }
        
    } while ($data = fgetcsv($handle,1000,",","'")); 
   

   
    
    //redirect 
    header('Location: upload.php?success=1');
    die; 

} 

?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<title>Import a CSV File with PHP & MySQL</title> 
</head> 

<body> 

<?php if (!empty(@$_GET[success])) { echo "<b>Your file has been imported.</b><br><br>"; } //generic success notice ?> 

<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1"> 
  Choose your file: <br /> 
  <input name="csv" type="file" id="csv" /> 
  <select name="table">
  	<option value="players">Players</option>
  	<option value="questions">Questions</option>
  	<option value="teams">Teams</option>
  </select>
  <input type="submit" name="Submit" value="Submit" /> 
</form> 

</body> 
</html> 
