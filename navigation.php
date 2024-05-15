<?php
//static elements never change
echo '<div class="collapse navbar-collapse justify-content-end" id="navbarNav">'; //echo the static elements
echo '<ul class="navbar-nav">';
          
			if(!isset($_GET['page'])){ //check to see if page is set
			$page="home"; //if not set
		}
		else{
			$page=$_GET['page']; //else grab page data and store in $page variable
		}
//HOME		
	if($page=="home"){
		echo '<li class="nav-item"><a class="nav-link active" aria-current="page" href="indexnew.php">Home</a></li>';
	}
	else{
		echo '<li class="nav-item"><a class="nav-link" aria-current="page" href="indexnew.php">Home</a></li>';
	}
//CONTACT	
	if($page=="contact"){
		echo '<li class="nav-item"><a class="nav-link active" href="indexnew.php?page=contact">Contact</a></li>';
	}
	else{
		echo '<li class="nav-item"><a class="nav-link" href="indexnew.php?page=contact">Contact</a></li>';
	}
//CAREER	
	if($page=="career"){
		echo '<li class="nav-item"><a class="nav-link active" href="indexnew.php?page=career">Career</a></li>';
	}
	else{
		echo '<li class="nav-item"><a class="nav-link" href="indexnew.php?page=career">Career</a></li>';
	}
//EDUCATION
	if($page=="education"){
		echo '<li class="nav-item"><a class="nav-link active" href="indexnew.php?page=education">Education</a></li>';
	}
	else{
		echo '<li class="nav-item"><a class="nav-link" href="indexnew.php?page=education">Education</a></li>';
	}
//HOBBIES
	if($page=="hobbies"){
		echo '<li class="nav-item"><a class="nav-link active" href="indexnew.php?page=hobbies">Hobbies</a></li>';
	}
	else{
		echo '<li class="nav-item"><a class="nav-link" href="indexnew.php?page=hobbies">Hobbies</a></li>';
	}
//ABOUT ME
	if($page=="aboutme"){
		echo '<li class="nav-item"><a class="nav-link active" href="indexnew.php?page=aboutme">About Me</a>';
	}
	else{
		echo '<li class="nav-item"><a class="nav-link" href="indexnew.php?page=aboutme">About Me</a>';
	}
// LOGIN
	if($page=="login"){
		echo '<li class="nav-item"><a class="nav-link active" href="indexnew.php?page=login">Login</a>';
	}
	else{
		echo '<li class="nav-item"><a class="nav-link" href="indexnew.php?page=login">Login</a>';
	}
          
echo '</li>';
echo '</ul>';
echo '</div>';
?>