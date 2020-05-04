

<?php include('files/ct_files/inc/header.php'); ?>




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
			$data = file_get_contents('files/ct_files/json/articles.json');
			$articles = json_decode($data, true);		
		?>


		<?php if ($list): ?>		
		<div class='jumbotron'>
			<div class='col-lg-6 offset-lg-6 col-md-8 offset-md-4'>
				<div class='jumbotron-text'>
					<h2>Start Here!</h2>
					<p>Not sure where to go first? Check out our article on how to get started!</p>
					<a href='ct-start.php' class='btn btn-outline-warning'>Start Here</a>
				</div>
			</div>
		</div>


		<h2 class='h1 text-center sr-only'>Featured Articles</h2>
		<div class='row'>

		<div class='col-md d-flex mb-5 justify-content-center'>
			<div class='card border'>
				<img src='https://via.placeholder.com/600x400' alt='' class='card-img-top'>
				<div class='card-body bg-royal'>
				<p class='text-uppercase text-white text-center'>Article Title</p>
				</div>
			</div>
		</div>

		<div class='col-md d-flex mb-5 justify-content-center'>
			<div class='card border'>
				<img src='https://via.placeholder.com/600x400' alt='' class='card-img-top'>
				<div class='card-body bg-royal'>
				<p class='text-uppercase text-white text-center'>Article Title</p>
				</div>
			</div>
		</div>
		
		<div class='col-md d-flex mb-5 justify-content-center'>
			<div class='card border'>
				<img src='https://via.placeholder.com/600x400' alt='' class='card-img-top'>
				<div class='card-body bg-royal'>
				<p class='text-uppercase text-white text-center'>Article Title</p>
				</div>
			</div>
		</div>
		</div>
		
		

		<div class="row">


		<h2 class="h1">All Career Services Articles</h2>

		


		<?php foreach($articles as $key=>$article){ ?>	
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