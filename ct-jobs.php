<?php include('files/ct_files/inc/header.php'); ?>


<?php 
	$data = file_get_contents('files/ct_files/json/jobs.json');
	$departments = json_decode($data, true);		
?>

<div class='container'>
	<div class='jumbotron'>
		<div class='col-lg-6 offset-lg-6 col-md-8 offset-md-4'>
			<div class='jumbotron-text'>
				<h2>Find a Job</h2>
				<p>Ready to search for a job? Search directly at job websites or see a collection of jobs hand-picked for your department</p>				
			</div>
		</div>
	</div>


	<div class='row justify-content-center'>	
		
		<div class='col'>
			<h3>Jobs by Department</h3>
			<ul>
				<?php 
					foreach ($departments as $department){ 
						echo "<li><a href='#'>".$department['name']."</a></li>"; 
					} 
				?>
			</ul>
		</div>

		<div class='col'>
			<h3>Search for Jobs</h3>
			<ul>
				<li><a href="#"> Job Website</a></li>
				<li><a href="#"> Job Website</a></li>
				<li><a href="#"> Job Website</a></li>
				<li><a href="#"> Job Website</a></li>
				<li><a href="#"> Job Website</a></li>
				<li><a href="#"> Job Website</a></li>
				<li><a href="#"> Job Website</a></li>
			</ul>
		</div>
	</div>

</div>

<?php include('files/ct_files/inc/footer.php'); ?>
