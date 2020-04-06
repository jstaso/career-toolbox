

<?php include('files/ct_files/inc/header.php'); ?>


<div class='container'>	

		<?php 
			$data = file_get_contents('files/ct_files/json/articles.json');
			$articles = json_decode($data, true);		
		?>


		<?php if ($list): ?>
		<h2 class="h1">Career Services Articles</h2>
		<?php foreach($articles as $key=>$article){ ?>
	
			<div class='row mt-5 '>
				<div class='col' style='max-width: 850px'>

					<div class='media'>
						<img src='https://via.placeholder.com/200x200' alt='' class="img-fluid mr-3 d-none d-md-block">
						<div class='media-body'>
							<img src="https://via.placeholder.com/1024x512" alt='' class='img-fluid mb-2 d-md-none'>
							<h2><?php echo $article['title']; ?></h2>
							<div><?php echo $article['excerpt']; ?></div>
							<div class='text-right'><button class='btn btn-link'>Read more -></button></div>
						</div>
					</div>

					<a href="ct-articles.php?id=<?php echo $key; ?>" class="stretched-link"></a>
				</div>			
			</div>

		<?php }; endif; ?>

		<?php if (!$list): $article = $articles[$id]; ?>
			<div class='row justify-content-center'>
			<div class='col col-xl-10'>
				<img src='<?php echo $article['banner']; ?>' alt='' class="img-fluid">			
				<h2 class="h1 mt-2 mb-3 text-center"><?php echo $article['title']; ?></h2>
				<?php echo $article['text']; ?>
			</div>
			</div>
		<?php endif; ?>



</div>


<?php include('files/ct_files/inc/footer.php'); ?>