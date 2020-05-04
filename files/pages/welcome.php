<div class='container'>	

	<?php
		echo get_jumbotron([
			"title"=>"Start Here", 
			"content"=>"Not sure where to go first? Check out our article on how to get started!",
			"linkText"=>"Start here",
			"url"=>"career-toolbox.com?view=articles&title=get-started"
		]);
	?>

	<?php 
		echo get_slab([
			'title'=>'<i class="fas fa-fire-alt text-danger"></i> Hot Jobs <i class="fas fa-fire-alt text-danger"></i>', 
			'content'=>get_hotJobs(['num'=>10])
		]); 
	?>


	<?php 
		echo get_slab([
			'title'=>'Jobs by Department', 
			'content'=>get_departments(false)
		]); 
	?>

	<?php 
		echo get_slab([
			'title'=>'Featured Articles', 
			'content'=>get_featuredArticles(false)
		]); 
	?>

	<?php 
		echo get_slab([
			'title'=>'Career Events', 
			'content'=>get_events(false)
		]); 
	?>

	
</div>
