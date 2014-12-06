<?php

class sms{
	
	private  $sender, $client, $message, $action, $gatewayURL, $username, $password, $operator, $messageType, $jsoncallback;
	
		
	public function __construct( $sender, $client, $message, $action=array("type"=>"sms", "response" => "Thank you for your message.", "group"=>"subscribers"), $gatewayURL='http://localhost:9333/ozeki?', $username='admin', $password='abc123', $operator='Safaricom', $messageType='SMS:TEXT', $jsoncallback=''){
		
		/*die($jsoncallback."("."INITIATED SERVICE!".")");*/
		
		if( @!($action) || @!($sender) || @!($message)){
			
			die ($jsoncallback."("."big error!".")");
			
		}else{
			
			/*SETTING THE REQUIRED GLOBAL CLASS VARIABLES */
			
			$this->sender 		= @$sender;
			$this->client 		= @$client;
			$this->message		= @$message;
			$this->action		= @$action;
			$this->gatewayURL	= @$gatewayURL;
			$this->username		= @$username;
			$this->password		= @$password;
			$this->operator		= @$operator;
			$this->messageType 	= @$messageType;
			$this->jsoncallback = @$jsoncallback;
			
			/* CREATE AND/OR NAVIGATE TO THE SMS DIRECTORY */
			@mkdir("sms");
			chdir("sms");
			@file_put_contents(".htaccess", "Options -Indexes");
						
			/* PROCESS THE REQUEST */
			
			if(@$action['type'] == "sms"):
			
				$this->sendText();
				
			elseif(@$action['type'] == "group"):
			
				$this->groupMail();			
				
			elseif(@$action['type'] == "response" ):
			
				$this->respond();
				
			elseif(@$action['type'] == "subscribe"):
			
				$this->subscribe();
			
			elseif(@$action['type'] == "unsubscribe"):
			
				$this->unsubscribe();
				
			else:
				
				echo $this->jsoncallback."(".json_encode("Failed to take apropriate action!<br>//n Please Revise your script action type!").")";
				die;
				
			endif;
			
			
		}
				
	}
	
	
	private function sendText(){
		
		if(	is_array($this->client)	):
		
			foreach($this->client as $recipient){
						
				$gatewayURL 	= $this->gatewayURL;
				$request		= 'login='.$this->username;
				$request		.= '&password='.$this->password;
				$request		.= '&action=sendMessage';
				$request		.= '&messageType='.$this->messageType;
				$request		.= '&recepient='.urlencode($recipient);
				$request		.= '&messageData='.urlencode($this->message);
				
				$url			= $gatewayURL.$request;
				//echo $this->jsoncallback."("."$url".")";
				file($url);
						
			}
			
		else:
		
			$gatewayURL 	= $this->gatewayURL;
			$request		= 'login='.$this->username;
			$request		.= '&password='.$this->password;
			$request		.= '&action=sendMessage';
			$request		.= '&messageType='.$this->messageType;
			$request		.= '&recepient='.urlencode($this->client);
			$request		.= '&messageData'.urlencode($this->message);
			
			$url			= $gatewayURL.$request;
			file($url);
		
		endif;
		
	}	
	
	private function respond(){
		
		$this->sendText();
		
	}
	
	private function groupMail(){
		
		$fn = $this->action['group'].".subl";
		$files = glob("*.subl");
		$K = array_search($fn, $files);	
		
		/* CHECK IF A SUBSCRIBER LIST BY THAT NAME ALREADY EXISTS */
		if(@!$k){			
			/* CREATE A SUBSCRIBER LIST BY THE GIVEN NAME */
			file_put_contents($fn, "", FILE_APPEND | LOCK_EX);		
		}
		
		$subscribers = Array();
		$subscribers = file($fn);
		
		foreach($subscribers as $destnumber) {
			
			$destnumber = trim($destnumber);
			if ($destnumber<>$this->sender):
				echo "{GSMSMS}{}{}{"."$destnumber"."}{".trim($this->message)."}\n";
			endif;
			
		}
		
	}
	
	private function subscribe(){
		
		$fn = $this->action['group'].".subl";
		$files = glob("*.subl");
		$K = array_search($fn, $files);	
		
		/* CHECK IF A SUBSCRIBER LIST BY THAT NAME ALREADY EXISTS */
		if(@!$k){			
			/* CREATE A SUBSCRIBER LIST BY THE GIVEN NAME */
			file_put_contents($fn, "", FILE_APPEND | LOCK_EX);		
		}
		
		$subscribers = Array();
		$subscribers = file($fn);
		 
				
		   if (!in_array($this->client, $subscribers)) {
			   
		     $subscribers[] = $sender;
			 
		     echo "{GSMSMS}{}{}{"."$this->client"."}{".trim($this->message)."}\n";
			 
		     $fp = fopen($fn,"w");
			 
		     fputs($fp,join("\n",$subscribers));
			 
		     fclose($fp);
			 
		   } else {
			   
		     echo "{GSMSMS}{}{}{"."$this->client"."}{You have already signed up for this service}\n";
			 die;
			 
		   }		
		
	}
	
	private function unsubscribe(){
		
		
		
	}
	
	private function toEmail(){
		
	} 
	
}


?>