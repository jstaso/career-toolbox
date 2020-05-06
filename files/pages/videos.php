
<?php 
	$list = true;
	$id = 0;

	if (isset($_GET['id'])){
		$id = $_GET['id'];
		$list = false;
	};
?>


<div class='container'>	

		


	<div class='jumbotron'>
		<div class='col-lg-6 offset-lg-6 col-md-8 offset-md-4'>
			<div class='jumbotron-text'>
				<h2>Video Resources</h2>
				<p>We've got videos for all your career services needs.</p>				
			</div>
		</div>
	</div>


	<?php 
		$data = file_get_contents('files/ct_files/json/webinars.json');		
		$webinars = json_decode($data, true);		
	?>
	
	<h2>Career Services Webinars</h2>

	<div class='row flex'>
	<?php 
		foreach($webinars as $webinar): 
			echo get_featured_card([
				'title' => $webinar['title'],
				'url' => $webinar['url'],
				'image' => $webinar['image'],
				'icon' => "fas fa-video",
				'excerpt' => $webinar['excerpt']
			]);
		endforeach; 
	?>
	</div>	
	
		
</div>
