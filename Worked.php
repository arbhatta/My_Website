<?php 
	session_start();
	error_reporting(0);
	include './function/config.php';
?>
<section id="work">
	<div class="Worked-wrapper container">
		<span class="section-title">
			<h3>
				Worked With
			</h3>
			<small>Worked I have.....</small>
			<hr />
		</span>
		<div class="row work-container">
			<?php
			    $query=mysqli_query($conn, "select title,image from Worked order by creationDate desc limit 5");
			    while ($row=mysqli_fetch_array($query)) {
			?>
				<div class="col-md-3 col-6">
					<div class="work-content">
						<span class="work-image-wrapper">
							<span class="work-image-container">
								<img src="uploads/Worked-image/<?php echo htmlentities($row['image']); ?>" />
							</span>
						</span>
					</div>
					<p>
						<?php echo htmlentities($row['title']); ?>
						<?php echo htmlentities($row['date']); ?>
					</p>
				</div>
			    <?php }
			?>
		</div>
	</div>
</section>