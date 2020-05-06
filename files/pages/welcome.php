<div class='container'>	


	<?php 
		echo get_carousel([
			"slides"=>[
				get_jumbotron([
					"title"=>"Start Here", 
					"content"=>"Not sure where to go first? Check out our article on how to get started!",
					"linkText"=>"Start here",
					"url"=>"career-toolbox.com?view=articles",
					"bgImage"=> "files/ct_files/images/banners/where-to-start-banner.jpg"
				]),
				get_jumbotron([
					"title"=>"Featured Article", 
					"content"=>"This is the featured article we're focusing on right now!",
					"linkText"=>"Read Article",
					"url"=>"career-toolbox.com?view=articles",
					"bgImage"=> "files/ct_files/images/webinars/customizing-your-resume-banner.jpg"
				]),
				get_jumbotron([
					"title"=>"Customizing Your Resume", 
					"content"=>"How to make necessary adjustments to your resume to land an interview.",
					"linkText"=>"Watch Video",
					"url"=>"https://laurus.adobeconnect.com/pkl0iuq7877f/?OWASP_CSRFTOKEN=bd6e2b0c322002fc5cf98d66cbc62b4a89a7edf94576de002691b65cb84294f6&proto=true",
					"bgImage"=> "files/ct_files/images/webinars/customizing-your-resume-banner.jpg"
				])
			]
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
			'content'=>get_departments(['size'=>'wide'])
		]); 
	?>

	<?php 
		echo get_slab([
			'title'=>'Recent Articles', 
			'content'=>get_featuredArticles(false)
		]); 
	?>

	<?php 
		echo get_slab([
			'title'=>'Career Events', 
			'content'=>get_events(['num'=>3])
		]); 
	?>

	
</div>
