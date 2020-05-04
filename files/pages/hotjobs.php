<div class='container'>
	<h1>All Hot Jobs</h1>
	<?php 
		echo get_block([
			'title'=>'', 
			'text'=>'',
			'content'=>get_hotJobs(['num'=>1000])
		]); 
	?>
	
</div>
