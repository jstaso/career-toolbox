
<div class='container'>	
    <h1 class='sr-only'>Events Page</h1>

    <?php
		echo get_jumbotron([
			"title"=>"Career Events", 
			"content"=>"Upcoming events"			
		]);
	?>

    <?php 
		echo get_events(null); 
	?>

</div>

