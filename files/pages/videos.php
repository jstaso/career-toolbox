
<?php 
	$list = true;
	$id = 0;

	if (isset($_GET['id'])){
		$id = $_GET['id'];
		$list = false;
	};
?>


<div class='container'>	

<?php
		echo get_jumbotron([
			"title"=>"Video Resources", 
			"content"=>"Webinars and videos from the Career Services department.",
			"bgImage" =>"files/ct_files/images/banners/video-jumbotron.jpg",
			"mobile" => false
		]);
	?>

	
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
