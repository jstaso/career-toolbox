

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


	<div class='jumbotron'>
		<div class='col-lg-6 offset-lg-6 col-md-8 offset-md-4'>
			<div class='jumbotron-text'>
				<h2>Video Resources</h2>
				<p>We've got videos for all your career services needs.</p>				
			</div>
		</div>
	</div>

	<h2>Video Channels</h2>

	<div class='row flex'>
		
		<div class='col-6 col-md-4 col-lg-3 d-flex mb-5 justify-content-center'>
			<div class='card border'>
				<img src='https://via.placeholder.com/600x400' alt='' class='card-img-top'>
				<div class='card-body bg-royal'>
				<p class='text-uppercase text-white text-center'>Article Title</p>
				</div>
			</div>
		</div>

		<div class='col-6 col-md-4 col-lg-3 d-flex mb-5 justify-content-center'>
			<div class='card border'>
				<img src='https://via.placeholder.com/600x400' alt='' class='card-img-top'>
				<div class='card-body bg-royal'>
				<p class='text-uppercase text-white text-center'>Article Title</p>
				</div>
			</div>
		</div>

		<div class='col-6 col-md-4 col-lg-3 d-flex mb-5 justify-content-center'>
			<div class='card border'>
				<img src='https://via.placeholder.com/600x400' alt='' class='card-img-top'>
				<div class='card-body bg-royal'>
				<p class='text-uppercase text-white text-center'>Article Title</p>
				</div>
			</div>
		</div>

		<div class='col-6 col-md-4 col-lg-3 d-flex mb-5 justify-content-center'>
			<div class='card border'>
				<img src='https://via.placeholder.com/600x400' alt='' class='card-img-top'>
				<div class='card-body bg-royal'>
				<p class='text-uppercase text-white text-center'>Article Title</p>
				</div>
			</div>
		</div>

		<div class='col-6 col-md-4 col-lg-3 d-flex mb-5 justify-content-center'>
			<div class='card border'>
				<img src='https://via.placeholder.com/600x400' alt='' class='card-img-top'>
				<div class='card-body bg-royal'>
				<p class='text-uppercase text-white text-center'>Article Title</p>
				</div>
			</div>
		</div>

		<div class='col-6 col-md-4 col-lg-3 d-flex mb-5 justify-content-center'>
			<div class='card border'>
				<img src='https://via.placeholder.com/600x400' alt='' class='card-img-top'>
				<div class='card-body bg-royal'>
				<p class='text-uppercase text-white text-center'>Article Title</p>
				</div>
			</div>
		</div>

		<div class='col-6 col-md-4 col-lg-3 d-flex mb-5 justify-content-center'>
			<div class='card border'>
				<img src='https://via.placeholder.com/600x400' alt='' class='card-img-top'>
				<div class='card-body bg-royal'>
				<p class='text-uppercase text-white text-center'>Article Title</p>
				</div>
			</div>
		</div>

		<div class='col-6 col-md-4 col-lg-3 d-flex mb-5 justify-content-center'>
			<div class='card border'>
				<img src='https://via.placeholder.com/600x400' alt='' class='card-img-top'>
				<div class='card-body bg-royal'>
				<p class='text-uppercase text-white text-center'>Article Title</p>
				</div>
			</div>
		</div>

		<div class='col-6 col-md-4 col-lg-3 d-flex mb-5 justify-content-center'>
			<div class='card border'>
				<img src='https://via.placeholder.com/600x400' alt='' class='card-img-top'>
				<div class='card-body bg-royal'>
				<p class='text-uppercase text-white text-center'>Article Title</p>
				</div>
			</div>
		</div>

		<div class='col-6 col-md-4 col-lg-3 d-flex mb-5 justify-content-center'>
			<div class='card border'>
				<img src='https://via.placeholder.com/600x400' alt='' class='card-img-top'>
				<div class='card-body bg-royal'>
				<p class='text-uppercase text-white text-center'>Article Title</p>
				</div>
			</div>
		</div>
		
	


</div>


<?php include('files/ct_files/inc/footer.php'); ?>