<?php
 echo '<section id="home" class="sectionPadd">';

if(isset($_GET['errMsg']) && strstr($_GET['errMsg'],"invalidAuth")){
	echo '<h2>Login: Please log in below.</h2>';
	echo '<form method="post" action="" style="padding:20px;margin=20px">';
	echo '<div class="form-group has-error">';
	echo '<label class="control-label" for="username">Username: </label>';
	echo '<input type="text" id="username" name="username" class="form-control"/>';
	echo '<div id="unFeedback"></div>';
	echo '</div>';
	echo '<div class="form-group has-error">';
	echo '<label class="control-label" for="password">Password: </label>';
	echo '<input type="password" id="password" name="password" class="form-control"/>';
	echo '<div id="unFeedback">Invalid username or password</div>';
	echo '</div>';
	echo '<div class="form-group button-pad">';
	echo '<button class="btn btn-primary" name="submit" value="submit"/>Login</button>';
	echo '</div>';
	echo '<div class="form-group button-pad" style="padding-bottom: 270px;">';
	echo '<a href="indexnew.php?page=register" class="btn btn-primary">Register</a>'; 
	echo '</div>';
	echo '</form>';
}
elseif(isset($_GET['errMsg']) && (strstr($_GET['errMsg'],"NullSid") || strstr($_GET['errMsg'],"InvalidSid"))){
	echo '<h2>Login: Please log in below.</h2>';
	echo '<form method="post" action="" style="padding:20px;margin=20px">';
	echo '<div class="form-group has-error">';
	echo '<label class="control-label" for="username">Username: </label>';
	echo '<input type="text" id="username" name="username" class="form-control"/>';
	echo '<div id="unFeedback"></div>';
	echo '</div>';
	echo '<div class="form-group has-error">';
	echo '<label class="control-label" for="password">Password: </label>';
	echo '<input type="password" id="password" name="password" class="form-control"/>';
	echo '<div id="unFeedback">Please log in using a valid account to enter results page.</div>';
	echo '</div>';
	echo '<div class="form-group button-pad">';
	echo '<button class="btn btn-primary" name="submit" value="submit"/>Login</button>';
	echo '</div>';
	echo '<div class="form-group button-pad" style="padding-bottom: 270px;">';
	echo '<a href="indexnew.php?page=register" class="btn btn-primary">Register</a>'; 
	echo '</div>';
	echo '</form>';
}
else{
	$succMsg = $_GET['succMsg'];
	if(strstr($succMsg,"success")){
		echo '<h2>Account was created successfully!</h2>';
	}
	echo '<h2>Login: Please log in below.</h2>';
	echo '<form method="post" action="" style="padding:20px;margin=20px">';
	echo '<div class="form-group">';
	echo '<label class="control-label" for="username">Username: </label>';
	echo '<input type="text" id="username" name="username" class="form-control"/>';
	echo '<div id="unFeedback"></div>';
	echo '</div>';
	echo '<div class="form-group">';
	echo '<label class="control-label" for="password">Password: </label>';
	echo '<input type="password" id="password" name="password" class="form-control"/>';
	echo '<div id="unFeedback"></div>';
	echo '</div>';
	echo '<div class="form-group button-pad">';
	echo '<button class="btn btn-primary" name="submit" value="submit"/>Login</button>';
	echo '</div>';
	echo '<div class="form-group button-pad" style="padding-bottom: 270px;">';
	echo '<a href="indexnew.php?page=register" class="btn btn-primary">Register</a>'; 
	echo '</div>';
	echo '</form>';
}
if(isset($_POST['submit'])){
	$username=addslashes($_POST['username']);
	$passText=$_POST['password'];
	$salt="CS4413SP24-01";
	$password=hash('sha256',$salt.$passText.$username);
	$dblink=db_connect("user_data");
	$sql="Select `auto_id` from `accounts` where `auth_hash`='$password'"; //authetication 
	$result=$dblink->query($sql) or
		die("<p>Something went wrong with $sql<br>".$dblink->error);
	if($result->num_rows<=0) //we dont have a result
		redirect("indexnew.php?page=login&errMsg=invalidAuth"); //display error message here
	else
	{
		$salt=microtime();
		$sid=hash('sha256',$salt.$password); //session id
		//check if we are inserting or updating 
		$sql="Update `accounts` set `session_id`='$sid' where `auth_hash`='$password'";
		$dblink->query($sql) or
			die("<p>Something went wrong with $sql<br>".$dblink->error);
		redirect("indexnew.php?page=results&sid=$sid"); //if it works
	}		
}

echo '</section>';
?>