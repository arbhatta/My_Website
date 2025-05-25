<section id="team">
	<?php
	    $query=mysqli_query($conn, "select * from team order by creationDate desc limit 1");
	    while ($row=mysqli_fetch_array($query)) {
	?>
		<div class="team-wrapper" style="background-image: url('uploads/team-image/<?php echo htmlentities($row['image']); ?>');">
			<div class="team-overlay"></div>
			<div class="container team-content-container">
				<span class="section-title">
					<h3>
						<a href="/team" title="More team Me">team</a>
					</h3>
					<small>Few things team me....</small>
					<hr />
				</span>
				<div class="row team-container">
					<div class="col-md-4 team-image-container">
						<img src="uploads/team-image/<?php echo htmlentities($row['image']); ?>" alt="team-image" />
					</div>
					<div class="col-md-8">
						<div class="team-detail-container">
							<p class="team-detail-content">
								<?php echo $row['description']; ?>
							</p>
							
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php } 
    ?>
</section>