


<?php 
	session_start();
	error_reporting(0);
	include './function/config.php';
	
	if(basename($_SERVER['PHP_SELF']) == 'about.php') { 
		include './includes/header.php';
		include './includes/navbar.php';
	} 
?>
<section id="about">
<?php
                        $query=mysqli_query($conn, "select * from social_media order by name asc");
                        while ($row=mysqli_fetch_array($query)) {
                    ?>
                        <li class="social-media-link">
                            <a href="<?php echo htmlentities($row['url']); ?>" 
                                title="<?php echo htmlentities($row['name']); ?>" target="_blank">
                                <img src="<?php echo $logoDir; ?>/social_media-image/<?php echo htmlentities($row['image']); ?>" /> 
                                <?php echo htmlentities($row['name']); ?>
                            </a>
                        </li>
                    <?php } ?>



