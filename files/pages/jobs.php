<div class='container'>

	<?php
		echo get_jumbotron([
			"title"=>"Find a Job", 
			"content"=>"Select your department for a list of jobs hand-selected by the career services department",
			"bgImage" =>"files/ct_files/images/banners/start-alt-jumbotron.jpg"
		]);
	?>
	<div class='row justify-content-center'>
		<div class='col-lg-6 col-md-8'>
			<?php 
				echo get_block([
					'title'=>'Find a Job', 
					'text'=>'Popular job search sites',
					'content'=>get_jobWebsites()
				]); 
			?>
		</div>
		<div class='col-lg-6 col-md-8'>
			<?php 
				echo get_block([
					'title'=>'Jobs by Department', 
					'text'=>'See job searches by department',
					'content'=>get_departments(["width"=>"col"])
				]); 
			?>
		</div>
	</div>
	<?php 
		echo get_block([
			'title'=>'<i class="fas fa-fire-alt text-danger"></i> Hot Jobs <i class="fas fa-fire-alt text-danger"></i> ', 
			'text'=>'These jobs are hand-picked by the career services department',
			'content'=>get_hotJobs(['num'=>100])
		]); 
	?>
</div>
