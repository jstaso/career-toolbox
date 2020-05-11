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
			$data = 'test';
			$data = file_get_contents('files/ct_files/json/articles.json');
			$articles = json_decode($data, true);			
		?>


		<?php if ($list): 	?>		
		<?php echo get_jumbotron([
					"title"=>"Interview Talking Points", 
					"content"=>"Being given a job offer depends on the mistakes you avoid as much as the things that you do well.",
					"linkText"=>"Read Article",
					'bgImage' => 'files/ct_files/images/banners/article-jumbotron.jpg',
					"url"=>"career-toolbox.com?view=articles"
				]);			
			$count = 0;
		?>


		<h2 class='display-4 my-4 d-none d-md-block '>Career Services Articles</h2>
		<?php foreach($articles as $key=>$article): ?>				
				<div class='row py-3 mx-1 border-top'>
					<div class='col-xl-9 col-lg-11 col-md'>
						<div class='media'>
							<img src='<?php echo $article['image']; ?>' alt='' class="img-fluid mr-4 d-none d-md-block" width="275">
							<div class='media-body'>
								<img src="<?php echo $article['image']; ?>" alt='' class='img-fluid mb-2 d-md-none'>
								<h2 class='h3'><?php echo $article['title']; ?></h2>
								<div><?php echo $article['excerpt']; ?></div>
								<div class='text-right'><button class='btn btn-link'>Read more -></button></div>
							</div>
						</div>
						<a href="career-toolbox.php?view=articles&id=<?php echo $key; ?>" class="stretched-link"></a>
					</div>			
				</div>

		<?php endforeach; endif; ?>

		<?php if (!$list): $article = $articles[$id]; ?>
			<div class='row justify-content-center'>
			<div class='col col-xl-10 article'>
				<img src='<?php echo $article['banner']; ?>' alt='' class="img-fluid mb-4">	
				<h1 class='display-4 text-center text-uppercase'><?php echo $article['title']; ?></h1>
				<?php echo file_get_contents("files/ct_files/articles/".$article['filename'].".html"); ?>
			</div>
			</div>
		<?php endif; ?>

</div>


