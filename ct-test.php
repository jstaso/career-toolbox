<?php

require_once("../../config.php");

global $SITE;

require_login();

$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_pagetype('site-index');
$PAGE->set_pagelayout('standard');
$PAGE->set_title("Career Toolbox - My Laurus Portal");
$PAGE->navbar->add("<a href='#'>Find a Job</a> / <a href='ct-test.php'>Articles</a>" );
$PAGE->set_heading("Career Toolbox");
$PAGE->set_url("/");
echo $OUTPUT->header();
?>

<style>
	#region-main{
		padding: 0;
	}

	.ct-navbar{
		position:relative;
	}


	.ct-nav{
		position:static;
	}



	@media screen and (max-width:768px){
		.ct-nav{
			background-color:#0D3C76;
			position:absolute;
			left: 0;
			top:50px;
			display:flex;
			flex-direction:column;			
			z-index:100;
			width: 100%;
		}

	}

</style>

<?php 
	$list = true;
	$id = 0;

	if (isset($_GET['id'])){
		$id = $_GET['id'];
		$list = false;
	};
?>




<div class="generalbox">


<div class='py-2' style='background-color:#0D3C76;'>
	<div class='container'>
		<div class='d-flex justify-content-end ct-navbar'>
			<div class='nav ct-nav' id='js-ct-nav'>		
				<a class='nav-link white' href="#">Item 1</a>
				<a class='nav-link active'  href="#">Item 2</a>
				<a class='nav-link white'  href="#">Item 3</a>
				<a class='nav-link white'  href="#">Item 4</a>		
			</div>

			<button class='btn btn-outline-light d-md-none' id='js-ct-menubtn'>
				X3
			</button>
		</div>

	</div>

</div>






<div class='container'>	






		<?php 
			$data = file_get_contents('files/ct_files/json/articles.json');
			$articles = json_decode($data, true);		
		?>


		<?php if ($list): ?>
		<h2 class="h1 mb-5">Career Services Articles</h2>
		<?php foreach($articles as $key=>$article){ ?>
	
			<div class='row mb-5 '>
				<div class='col' style='max-width: 850px'>
					<div class='media'>
						<img src='https://via.placeholder.com/200x200' alt='' class="img-fluid mr-3">
						<div class='media-body'>
							<h2><?php echo $article['title']; ?></h2>
							<div><?php echo $article['excerpt']; ?></div>
						</div>
					</div>
					<a href="ct-test.php?id=<?php echo $key; ?>" class="stretched-link"></a>
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


<script>
	$('#js-ct-menubtn').click(function(){
		$('#js-ct-nav').show();
		
	})



</script>



<?php
echo $OUTPUT->footer();
die();
exit;