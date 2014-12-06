<?php

/* SAMPLE USAGE */



/*  IN THE ORDER OF 
 jsoncallback,
 to['', 'name'],
 from['email', 'name'],
 headers['subject', 'type'],
 message['hybrid','text','html'['header','body','footer']],
 template['head','bs','bhs','bhe','bms','bme','fms','fme','end'],
 method['type','key'] 
*/

$header = array("first"=>'<li ><a href="#"> <img width="20" height="20" title="company_logo" src="http://www." ></a></li>',
		"second"=>'<li ><a href="#">My Website</a></li>',
		"third"=>'<li ><a href="#">Customer Support</a></li>',
		"fourth"=>'<li ><a href="#">Feedback</a></li>'
	  );

$h1 = 'Dear User_name,';
$f1 = 'Concerning your account.';
$c1 = '<p>Lorem ipsum dolor sit amet, et vitae sapien maecenas, nunc cursus est. Ut etiam enim suspendisse. Et placerat quae justo bibendum lacus, sed praesent hendrerit, amet risctetuer nisl metusnisl metusnisl metus nisl metus. Eget consnisl metusectetuer eget dapibus erat, maecenas minim per.</p>

	<p> Diam eget nulla non libero etiam ut, massa condimentnisl metusum sit, iaculis urnoin vel no viverra sapien auctor sed quis nunc, justo sed in lorem ante expedita vel, cras amet ullamcorper tortor mi. Ligula nec nisl metus pretium, commodo egestas pretium lacinia vulputate, commodo et fusce ante pellentesque.</p>';

/*
$h2 = 'Second post';
$f2 = 'Second sample footer task';
$c2 = '<p>Lorem ipsum dolor sit amet, neque sed hymenaeos a, eros adipiscing libero erat habitant, integer pellentesque pulvinar, sit ante nonummy quis dignissim vel, ac nascetur est amet. Velit praesent volutpat proin et massa dolor, non justo praesent nullam laborum accumsan, adipiscing  aenean diam ut in eros auctor, laoreet auctor consectetuer nisl metus. Eget consectetuer eget dapibus erat, maecenas minim per.</p>

	<p> Diam eget nulla non libero etiam ut, massa condimentum sit, iaculis urna pellentesque at ullamcorper. Magna diam, elit ligula rhoncus mollis. Malesuada accumsan netus ligula tellus sit accumsan. Tempor pellentesque proin vel non massa. Ipsum pede arcu vel pulvinar, sed adipiscing nullam et cras, viverra sapien auctor sed quis nunc, justo sed in lorem ante expedita vel, cras amet ullamcorper tortor mi. Ligula nec pretium, commodo egestas pretium lacinia vulputate, commodo et fusce ante pellentesque.</p>';

$sh1 = 'Top Sidebar';
$sc1 = '<p> Diam eget nulla non libero etiam ut, massa condimentum sit, iaculis urna pellentesque at ullamcorper. Magna diam, elit ligula rhoncus mollis. Malesuada accumsan netus ligula tellus sit accumsan.</p>';
*/
$sh2 = 'Special Offer';
$sc2 = '<p> Diam eget nulla non libero etiam ut, massa condimentum sit, iaculis urna pellentesque at ullamcorper. Magna diam, elit ligula rhoncus mollis. Malesuada accumsan netus ligula tellus sit accumsan.</p>';

/*
$sh3 = 'Bottom Sidebar';
$sc3 = '<p> Diam eget nulla non libero etiam ut, massa condimentum sit, iaculis urna pellentesque at ullamcorper. Magna diam, elit ligula rhoncus mollis. Malesuada accumsan netus ligula tellus sit accumsan.</p>';
*/

$body = array("h1"=>@$h1, "f1"=>@$f1, "c1"=>@$c1, "h2"=>@$h2, "f2"=>@$f2, "c2"=>@$c2, "sh1"=>@$sh1, "sc1"=>@$sc1, "sh2"=>@$sh2, "sc2"=>@$sc2, "sh3"=>@$sh3, "sc3"=>@$sc3);

$footer = '<p>Copyright &copy; '.date('Y').' <a href="http://www.ianmin2.tk" >I&E Global Technologies</a> </p>';

include "r_mailer.php";

$mailit = new mailer(
		/*JSONP*/	"jsoncallback",
		/*TO DATA*/	["email"=>"ianmin2@live.com", "name"=>"IAN INNOCENT"],
		/*FROM DATA*/	["email"=>"ianmin2@yahoo.com", "name"=>"IAN MBAE"],
		/*HEADERS*/	["subject"=>"", "type"=>""],
		/*MESSAGE*/	["hybrid"=>"", "text"=>"", "html"=>["header"=>"$header", "body"=>"$body", "footer"=>"$footer"]],
		/*TEMPLATE*/	["head"=>"", "bs"=>"", "bhs"=>"", "bhe"=>"", "bms"=>"", "bme"=>"", "fms"=>"", "fme"=>"", "end"=>""],
		/*METHOD*/	["type"=>"mandrill", "key"=>"C2JgjLf0pN0os9FMvJrc7Q"] 
	    );

/*END OF MAILER SAMPLE*/


?>
