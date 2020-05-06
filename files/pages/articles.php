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
			<h2 class="sr-only">Career Services Articles</h2>	
		<?php echo get_jumbotron([
					"title"=>"Featured Article", 
					"content"=>"This is the featured article we're focusing on right now!",
					"linkText"=>"Read Article",
					"url"=>"career-toolbox.com?view=articles"
				]);			
			$count = 0;
			foreach($articles as $key=>$article): 
				if ($count==0): 	?>
					<h2 class='h1 text-center sr-only'>Featured Articles</h2>
					<div class='row'>
				<?php endif; ?>

			<?php if ($count<3): ?>
				<div class='col-md d-flex mb-5 justify-content-center'>
					<div class='card border'>
						<img src='https://via.placeholder.com/600x400' alt='' class='card-img-top'>
						<div class='card-body bg-royal'>
						<p class='text-uppercase text-white text-center'><?php echo $article['title'] ?></p>
						<a href="career-toolbox.php?view=articles&id=<?php echo $key; ?>" class="stretched-link"></a>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<?php if ($count==3): ?>
				</div>
				<div class="row">
				
			<?php endif; ?>
			
			<?php if ($count >=3): ?>
				
				<div class='row mt-5 '>
					<div class='col'>
						<div class='media'>
							<img src='https://via.placeholder.com/200x200' alt='' class="img-fluid mr-3 d-none d-md-block">
							<div class='media-body'>
								<img src="https://via.placeholder.com/1024x512" alt='' class='img-fluid mb-2 d-md-none'>
								<h2><?php echo $article['title']; ?></h2>
								<div><?php echo $article['excerpt']; ?></div>
								<div class='text-right'><button class='btn btn-link'>Read more -></button></div>
							</div>
						</div>

						<a href="career-toolbox.php?view=articles&id=<?php echo $key; ?>" class="stretched-link"></a>
					</div>			
				</div>

		<?php endif; $count++; endforeach; endif; ?>

		<?php if (!$list): $article = $articles[$id]; ?>
			<div class='row justify-content-center'>
			<div class='col col-xl-10 article'>
				<img src='<?php echo $article['banner']; ?>' alt='' class="img-fluid">			
				<?php echo file_get_contents("files/ct_files/articles/".$article['filename'].".html"); ?>
			</div>
			</div>
		<?php endif; ?>

</div>


