<?php
 echo '<section id="home" class="sectionPadd">';
session_start();
if (!isset($_POST['submit'])){
	echo '<h2>Register: Please fill out the form below to create an account.</h2>';
	echo '<form method="post" action="" id="mainForm" style="padding:20px;margin=20px">';
	
	if(isset($_GET['errMsg'])){
		$errMsg = $_GET['errMsg'];
	if(strstr($errMsg,"usernameNULL")){
		echo '<div class="form-group has-error"  id="username-group">';
		echo '<label class="control-label" for="username">Username: </label>';
		echo '<input type="text" id="username" name="username" class="form-control" onBlur="validateUserPass()"/>';
		echo '<div id="unFeedback">Username cannot be blank or special characters.</div>';
		echo '</div>';
	} 
		elseif (strstr($errMsg,"usernameExist")){
			echo '<div class="form-group has-error"  id="username-group">';
			echo '<label class="control-label" for="username">Username: </label>';
			echo '<input type="text" id="username" name="username" class="form-control" onBlur="validateUserPass()"/>';
			echo '<div id="unFeedback">Username exist please enter a different username.</div>';
			echo '</div>';
		}
	}
	else{
		if(isset($_SESSION['username'])){
			echo '<div class="form-group has-success"  id="username-group">';
			echo '<input type="text" placeholder="username" name="username" id="username" class="form-control" onBlur="validateUserPass()" value="'.$_SESSION['username'].'">'; 
			echo '<div id="unFeedback"></div>';
			echo '</div>'; 	
		}
		else{ //form loaded for the first time
			echo '<div class="form-group" id="username-group">';
			echo '<label class="control-label" for="username">Username: </label>';
			echo '<input type="text" id="username" name="username" class="form-control" onBlur="validateUserPass()"/>';
			echo '<div id="unFeedback"></div>';
			echo '</div>'; 
			}
	}
	
	if(isset($_GET['errMsg']) && strstr($_GET['errMsg'],"passwordNULL"))
	{
		echo '<div class="form-group has-error" id="password-group">';
		echo '<label class="control-label" for="password">Password: </label>';
		echo '<input type="password" id="password" name="password" class="form-control" onblur="validateUserPass()"/>';
		echo '<div id="pwFeedback">Password can not be blank.</div>';
		echo '</div>';
	}
		else{
			if(isset($_SESSION['password'])){
				echo '<div class="form-group has-success" id="password-group">';
				echo '<label class="control-label" for="password">Password: </label>';
				echo '<input type="password" id="password" name="password" class="form-control" onblur="validateUserPass()" value="'.$_SESSION['password'].'"/>';
				echo '<div id="pwFeedback"></div>';
				echo '</div>';
			}
			else{ //form loaded for the first time
				echo '<div class="form-group" id="password-group">';
				echo '<label class="control-label" for="password">Password: </label>';
				echo '<input type="password" id="password" name="password" class="form-control" onblur="validateUserPass()"/>';
				echo '<div id="pwFeedback"></div>';
				echo '</div>';
			}
		}
	echo '<div class="form-group button-pad" style="padding-bottom: 320px;">';
	echo '<button class="btn btn-primary" type="submit" name="submit" value="submit"/>Submit</button>';
	echo '</div>';
	echo '</form>';
}
else{ //post is submit
	$errors="";
	// username validation
	$username=$_POST['username'];
	if($username==NULL || !preg_match("/^[a-zA-Z0-9]+$/", $username)){
		$errors.="usernameNULL";
	}
	else{
		$_SESSION['username']=$username;
	}
	//password validation
	$password=$_POST['password'];
	if($password==NULL){
		$errors.="passwordNULL";
	}
	else{
		$_SESSION['password']=$password;
	}

	
	if($errors!=NULL){
		redirect("indexnew.php?page=register&errMsg=".urlencode($errors));
	} 
			
	$username=addslashes($_POST['username']);
	$passText=$_POST['password'];
	$salt = "CS4413SP24-01";
	$dblink = db_connect("user_data");
	//checks if username is unique
	$check_query = "SELECT * FROM accounts WHERE username='$username'";
	$check_result = $dblink->query($check_query);
	if ($check_result->num_rows > 0) {
		$errors.="usernameExist";
		redirect("indexnew.php?page=register&errMsg=".urlencode($errors));
	} 
	else {	
		$password=hash('sha256',$salt.$passText.$username);
		$sql="Insert into `accounts` (`username`,`auth_hash`) values ('$username','$password')";
		$dblink->query($sql) or
			die("Something went wrong with $sql<br>".$dblink->error);
		$success.="success";
		redirect("indexnew.php?page=login&succMsg=".urlencode($success));
		}
	}
echo '</section>';

?>