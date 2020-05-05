
<div class='container'>	
    <h1 class='sr-only'>Events Page</h1>

    <?php
		echo get_jumbotron([
			"title"=>"Start Here", 
			"content"=>"Not sure where to go first? Check out our article on how to get started!",
			"linkText"=>"Start here",
			"url"=>"career-toolbox.com?view=articles&title=get-started"
		]);
	?>

    <?php 
		echo get_events(null); 
	?>

</div>

