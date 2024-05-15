
<!-- /////////////////////////////////////////////////////////////////////////////////////////////////
                            START SECTION 2 - THE INTRO SECTION  
/////////////////////////////////////////////////////////////////////////////////////////////////////-->

<section id="top" class="intro-section">
  <div class="container">
    <div class="row align-items-center text-white">
      <!-- START THE CONTENT FOR THE INTRO  -->
      <div class="col-md-6 intros text-start">
        <h1 class="display-2">
          <span class="display-2--intro">Contact Information</span>
        </h1>
      </div>
    </div>
  </div>
	 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,160L48,176C96,192,192,224,288,208C384,192,480,128,576,133.3C672,139,768,213,864,202.7C960,192,1056,96,1152,74.7C1248,53,1344,107,1392,133.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
</section>


	
<!-- ///////////////////////////////////////////////////////////////////////////////////////////
                           START SECTION 9 - CONTACT FORM
///////////////////////////////////////////////////////////////////////////////////////////////-->	

<section id="contact" >
  <div class="container">
    <div class="row text-center">
      <h1 class="display-3 fw-bold text-capitalize">Contact Form</h1>
      <div class="heading-line"></div>
      <p class="lh-lg">
        Get in contact with me by filling out this form.
      </p>
    </div>

    <!-- START THE CTA CONTENT  -->
    <div class="row text-white">
      <div class="col-12 gradient shadow p-3">
        <div class="form w-100 pb-2">
			
			<?php
			session_start();
			if(!isset($_POST['submit']))
			{
				
				echo '<form action="" class="row" method="post" id="mainForm">';
			//FIRST NAME 
				if(isset($_GET['errMsg']) && strstr($_GET['errMsg'],"firstNameNULL"))
				{
					echo '<div class="col-lg-6 col-md mb-3 form-group has-error" id="firstname-group">';
					echo '<input type="text" placeholder="First Name" name="firstname" id="firstname" class="shadow form-control form-control-lg"  onblur="validateFirstLast()">';
					echo '<div id="fnFeedback">First name cannot be blank or have numbers/special characters.</div>';
					echo '</div>';
				}
				else{ //no error
					if(isset($_SESSION['firstname']) && $_SESSION['firstname']!=''){ //form loaded w previous data
						
						echo '<div class="col-lg-6 col-md mb-3 form-group has-success" id="firstname-group">';
						echo '<input type="text" placeholder="First Name" name="firstname" id="firstname" class="shadow form-control form-control-lg" onblur="validateFirstLast()" value="'.$_SESSION['firstname'].'">';
						echo '<div id="fnFeedback"></div>';
						echo '</div>';
					}
					else{ //form loaded for first time
						echo '<div class="col-lg-6 col-md mb-3 form-group" id="firstname-group">';
						echo '<input type="text" placeholder="First Name" name="firstname" id="firstname" class="shadow form-control form-control-lg" onblur="validateFirstLast()">';
						echo '<div id="fnFeedback"></div>';
						echo '</div>';
					}
					
				}
			  
			//LAST NAME
				if(isset($_GET['errMsg']) && strstr($_GET['errMsg'],"lastNameNULL"))
				{
					echo '<div class="col-lg-6 col-md mb-3 form-group has-error" id="lastname-group">';
					echo '<input type="text" placeholder="Last Name" name="lastname" id="lastname" class="shadow form-control form-control-lg" onblur="validateFirstLast()">';
					echo '<div id="lnFeedback">Last name cannot be blank or have numbers/special characters.</div>';
					echo '</div>';
				}
				else{
					if(isset($_SESSION['lastname'])){
						echo '<div class="col-lg-6 col-md mb-3 form-group has-success" id="lastname-group">';
						echo '<input type="text" placeholder="Last Name" name="lastname" id="lastname" class="shadow form-control form-control-lg" onblur="validateFirstLast()" value="'.$_SESSION['lastname'].'">';
						echo '<div id="lnFeedback"></div>';
						echo '</div>';
					}
					else{
						echo '<div class="col-lg-6 col-md mb-3 form-group" id="lastname-group">';
						echo '<input type="text" placeholder="Last Name" name="lastname" id="lastname" class="shadow form-control form-control-lg" onblur="validateFirstLast()">';
						echo '<div id="lnFeedback"></div>';
						echo '</div>';
					}
				}
					
			  	  
			 //EMAIL
			  if(isset($_GET['errMsg']) && strstr($_GET['errMsg'],"emailNULL"))
				{
					echo '<div class="col-lg-12 mb-3 form-group has-error" id="email-group">';
					echo '<input type="email" placeholder="email address" name="email" id="email" class="shadow form-control form-control-lg" onblur="validateEmail()">';
					echo '<div id="emFeedback">Email cannot be blank or must be in correct email format.</div>';
					echo '</div>';
			  	}
				else{
					if(isset($_SESSION['email'])){
						echo '<div class="col-lg-12 mb-3 form-group has-success" id="email-group">';
						echo '<input type="email" placeholder="email address" name="email" id="email" class="shadow form-control form-control-lg" onblur="validateEmail()" value="'.$_SESSION['email'].'">';
						echo '<div id="emFeedback"></div>';
						echo '</div>';
					}
					else{
						echo '<div class="col-lg-12 mb-3 form-group" id="email-group">';
						echo '<input type="email" placeholder="email address" name="email" id="email" class="shadow form-control form-control-lg" onblur="validateEmail()">';
						echo '<div id="emFeedback"></div>';
						echo '</div>';
					}
				}
				
			//PHONE
				if(isset($_GET['errMsg']) && strstr($_GET['errMsg'],"phoneNULL"))
				{
					echo '<div class="col-lg-12 mb-3 form-group has-error" id="phone-group">';
					echo '<input type="tel" placeholder="phone number" name="phone" id="phone" class="shadow form-control form-control-lg" onblur="validatePhone()">';
					echo '<div id="pFeedback">Phone cannot be blank or have special characters.</div>';
					echo '</div>';
				}
				else{
					if(isset($_SESSION['phone'])){
						echo '<div class="col-lg-12 mb-3 form-group has-success" id="phone-group">';
						echo '<input type="tel" placeholder="phone number" name="phone" id="phone" class="shadow form-control form-control-lg" onblur="validatePhone()" value="'.$_SESSION['phone'].'">';
						echo '<div id="pFeedback"></div>';
						echo '</div>';
					}
					else{
						echo '<div class="col-lg-12 mb-3 form-group" id="phone-group">';
						echo '<input type="tel" placeholder="phone number" name="phone" id="phone" class="shadow form-control form-control-lg" onblur="validatePhone()">';
						echo '<div id="pFeedback"></div>';
						echo '</div>';
					}
				}
				
			//USERNAME
				if(isset($_GET['errMsg']) && strstr($_GET['errMsg'],"usernameNULL"))
				{
					echo '<div class="col-lg-12 mb-3 form-group has-error" id="username-group">';
					echo '<input type="text" placeholder="username" name="username" id="username" class="shadow form-control form-control-lg" onBlur="validateUserPass()">';
					echo '<div id="unFeedback">Username cannot be blank or special characters.</div>';
					echo '</div>';  
				}
				else{
					if(isset($_SESSION['username'])){
						echo '<div class="col-lg-12 mb-3 form-group has-success" id="username-group">';
						echo '<input type="text" placeholder="username" name="username" id="username" class="shadow form-control form-control-lg" onBlur="validateUserPass()" value="'.$_SESSION['username'].'">';
						echo '<div id="unFeedback"></div>';
						echo '</div>'; 
					}
					else{
						echo '<div class="col-lg-12 mb-3 form-group" id="username-group">';
						echo '<input type="text" placeholder="username" name="username" id="username" class="shadow form-control form-control-lg" onBlur="validateUserPass()">';
						echo '<div id="unFeedback"></div>';
						echo '</div>'; 
					}
				}
			//PASSWORD
				if(isset($_GET['errMsg']) && strstr($_GET['errMsg'],"passwordNULL"))
				{
					echo '<div class="col-lg-12 mb-3 form-group has-error" id="password-group">';
					echo '<input type="password" placeholder="password" name="password" id="password" class="shadow form-control form-control-lg" onblur="validateUserPass()">';
					echo '<div id="pwFeedback">Password cannot be blank!</div>';
					echo '</div>';
				}
				else{
					if(isset($_SESSION['password'])){
						echo '<div class="col-lg-12 mb-3 form-group has-success" id="password-group">';
						echo '<input type="password" placeholder="password" name="password" id="password" class="shadow form-control form-control-lg" onblur="validateUserPass()" value="'.$_SESSION['password'].'">';
						echo '<div id="pwFeedback"></div>';
						echo '</div>';
					}
					else{
						echo '<div class="col-lg-12 mb-3 form-group" id="password-group">';
						echo '<input type="password" placeholder="password" name="password" id="password" class="shadow form-control form-control-lg" onblur="validateUserPass()">';
						echo '<div id="pwFeedback"></div>';
						echo '</div>';
					}
				}
			//COMMENT
				if(isset($_GET['errMsg']) && strstr($_GET['errMsg'],"commentNULL"))
				{
					echo '<div class="col-lg-12 mb-3 form-group has-error" id="comment-group">';
					echo '<textarea name="comment" placeholder="Comment" id="comment" rows="8" class="shadow form-control form-echo control-lg" onblur="validateComment()"></textarea>';
					echo '<div id="cFeedback">Comment can not be blank!</div>';
					echo '</div>';
				}
				else{
					if(isset($_SESSION['comment'])){
						echo '<div class="col-lg-12 mb-3 form-group has-success" id="comment-group">';
						echo '<textarea name="comment" placeholder="Comment" id="comment" rows="8" class="shadow form-control form-control-lg" onblur="validateComment()">' . $_SESSION['comment'] . '</textarea>';
						echo '<div id="cFeedback"></div>';
						echo '</div>';
					}
					else{
						echo '<div class="col-lg-12 mb-3 form-group" id="comment-group">';
						echo '<textarea name="comment" placeholder="Comment" id="comment" rows="8" class="shadow form-control form-echo control-lg" onblur="validateComment()"></textarea>';
						echo '<div id="cFeedback"></div>';
						echo '</div>';
					}
				}
				
				echo '<div class="text-center d-grid mt-1">';
				echo '<button type="submit" name="submit" class="btn btn-primary rounded-pill pt-3 pb-3">';
				echo 'submit';
				echo '<i class="fas fa-paper-plane"></i>';
				echo '</button>';
            	echo '</div>';
          		echo '</form>';
			}
			else{
				
				$errors="";//clears out all previous errors
				$_SESSION=array();//clears out all session data
			//firstname
				$firstName=$_POST['firstname'];
				if($firstName==NULL || !preg_match("/^[a-zA-Z'-]+$/", $firstName)){
					$errors.="firstNameNULL"; //error
				}
				else{
					$_SESSION['firstname']=$firstName; //no error and save info
				}
			//email
				$email=$_POST['email'];
				if($email==NULL || !preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)){
					$errors.="emailNULL";
				}
				else{
					$_SESSION['email']=$email;
				}
			//phone
				$phone=$_POST['phone'];
				if($phone==NULL || !preg_match("/^[0-9]+$/", $phone)){
					$errors.="phoneNULL";
				}
				else{
					$_SESSION['phone']=$phone;
				}
			//username
				$username=$_POST['username'];
				if($username==NULL || !preg_match("/^[a-zA-Z0-9]+$/", $username)){
					$errors.="usernameNULL";
				}
				else{
					$_SESSION['username']=$username;
				}
			//password
				$password=$_POST['password'];
				if($password==NULL){
					$errors.="passwordNULL";
				}
				else{
					$_SESSION['password']=$password;
				}
			
			//comments
				$comments=addslashes($_POST['comment']);
				if($comments==NULL){
					$errors.="commentNULL";
				}
				else{
					$_SESSION['comment']=$comments;
				}
			//lastname
				$lastName=$_POST['lastname'];
				if($lastName==NULL || !preg_match("/^[a-zA-Z'-]+$/", $lastName))
				{
					$errors.="lastNameNULL";
				}
				else{
					$_SESSION['lastname']=$lastName;
				}
				
				if($errors!=NULL){
					redirect("Location: contact.php?errMsg=$errors");
				}
			
				//ODBC string
				$dblink=db_connect("contact_data");
				$sql="Insert into `contact_info` (`first_name`,`last_name`,`email`,`phone`,`user_name`,`password`,`comments`) values ('$firstName','$lastName','$email','$phone','$username','$password','$comments')";
				$dblink->query($sql) or
					die("Something went wrong with: $sql".$dblink->error);
				echo'<h2>Your data was successfully saved. <h2>';
			}

			?>
        </div>
      </div>
    </div>  
  </div>
</section>
	


   
    <script src="assets/vendors/js/glightbox.min.js"></script>

    <script type="text/javascript">
      const lightbox = GLightbox({
        'touchNavigation': true,
        'href': 'https://www.youtube.com/watch?v=J9lS14nM1xg',
        'type': 'video',
        'source': 'youtube', //vimeo, youtube or local
        'width': 900,
        'autoPlayVideos': 'true',
});
    
    </script>
     <script src="assets/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/event-listener.js"></script>
