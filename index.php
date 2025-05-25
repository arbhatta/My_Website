
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
	//session_start();
	include './function/config.php';
include './includes/details-fetch.php';
	include './includes/header.php';
	include './includes/navbar.php';
?>

<section id="home">
	<div class="image-container" style="background-image: url('uploads/home_page-image/<?php echo htmlentities($homeImage); ?>');">
		<div class="image-overlay"></div>
		 <div class="image-content-container">
			<img src="uploads/home_page-image/<?php echo htmlentities($homeImage); ?>" class="image-small" alt="home-image-small" />
			<div class="image-content">
				<h1 class="text-uppercase font-weight-bold text-light"><?php echo htmlentities($homeName); ?></h1>
				<h3 class="text-light text-capitalize"><?php echo htmlentities($homeSkill); ?></h3>
				<span class="d-inline-block mt-3">
					<a class="btn button btn-cv" href="assets/cv/ankit_cv.pdf" download="ankit_cv">Book Us</a>
					<button class="btn button btn-hireme" onclick="redirectToSelf('/contact')">Contact Us </button>
				</span>
			</div>
		</div> 
	</div>
</section>

<?php 
	include 'about.php';
	include 'portfolio.php';
	include 'skill.php';
	include 'Worked.php';
	include 'hobby.php'; 
	include 'contact.php';
?>
<?php
	include './includes/footer.php';
?>