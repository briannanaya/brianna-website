<?php
include("functions.php");
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Brianna's Website</title>
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
</head>

<body>
<!-- ////////////////////////////////////////////////////////////////////////////////////////
                               START SECTION 1 - THE NAVBAR SECTION  
/////////////////////////////////////////////////////////////////////////////////////////////-->
<nav class="navbar navbar-expand-lg navbar-dark menu shadow fixed-top">
    <div class="container">
      <a class="navbar-brand navbar-padding" href=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    		<?php
			include("navigation.php");
		?>
    </div>
  </nav>

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////
                            START SECTION 2 - THE INTRO SECTION  
/////////////////////////////////////////////////////////////////////////////////////////////////////-->

	<?php
	
		if(!isset($_GET['page'])){ //check to see if page is set
			$page="home"; //if not set
		}
		else{
			$page=$_GET['page']; //else grab page data and store in $page variable
		}
	
		switch($page){
			case "contact":
				include("contact.php");
				break;
			case "career":
				include("career.php");
				break;
			case "education":
				include("education.php");
				break;
			case "hobbies":
				include("hobbies.php");
				break;
			case "aboutme":
				include("aboutme.php");
				break;
			case "results";
				include("results.php");
				break;
			case "login":
				include("login.php");
				break;
			case "register":
				include("register.php");
				break;
			default:
				include("home.php");
				break;
		};
	
	?>

 <!-- START THE COPYRIGHT INFO  -->
  <div class="footer footer-bottom pt-5 pb-5">
    <div class="container">
      <div class=" row text-center text-white">
        <div class="col-12">
          <div class="footer-bottom__copyright">
            &COPY; Copyright 2021 <a href="#">Company</a> | Created by <a href="http://codewithpatrick.com" target="_blank">Muriungi</a><br><br>

            Distributed by <a href="http://themewagon.com" target="_blank">ThemeWagon</a>
          </div>
        </div>
      </div>
    </div>
  </div>

<!-- BACK TO TOP BUTTON  -->
<a href="#" class="shadow btn-primary rounded-circle back-to-top">
  <i class="fas fa-chevron-up"></i>
</a>

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
</body>
</html>

<script src="assets/js/add-content.js"></script>
