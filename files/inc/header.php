<?php

require_once("../../config.php");

global $SITE;

require_login();

$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_pagetype('site-index');
$PAGE->set_pagelayout('standard');
$PAGE->set_title("Career Toolbox - My Laurus Portal");
$PAGE->navbar->add("" );
$PAGE->set_heading("Career Toolbox");
$PAGE->set_url("/");
echo $OUTPUT->header();
?>

<script src="https://kit.fontawesome.com/f9c8529673.js" crossorigin="anonymous"></script>

<style>
	#region-main{
		padding: 0;
	}

		.ct-navbar{
		position:relative;
	}

	.article p{
		font-size: 1.4rem;
		line-height: 2rem;
		margin-bottom: 1rem;
	}

	.article li{
		font-size: 1.4rem;		
		line-height: 1.5rem;
		margin-bottom: 1rem;
	}

	.article h2{
		margin-top: 2rem;
		line-height: 2rem;
		font-size: 1.8rem;
	}

	.article h3{
		margin-top: 1rem;
		line-height: 2rem;
		font-size: 1.5rem;
	}


	.ct-nav{
		position:static;
		padding:0;
	}

	.dropdown{
		position:relative;
	}

	.dropdown-wrapper{
		display:none;
		position:absolute;
		background-color:black;
		top: 45px;
		z-index: 1000;
	}

	.bg-royal{
		background-color:#092240;
	}

	.text-royal{
		color:#092240;
	}



	@media screen and (max-width:768px){
		.ct-nav{
			background-color:#0D3C76;
			position:absolute;
			left: 0;
			top:45px;
			display:flex;
			flex-direction:column;			
			z-index:100;
			width: 100%;
			padding-top: 20px;
			display:none;
		}

	
		.dropdown-wrapper{
			display:none;
		}

	}

</style>


<?php include('files/ct_files/components/components.php'); ?>


<div class="generalbox">

<div class='py-2 mb-4' style='background-color:#0D3C76;'>
	<div class='container'>
		<div class='ct-navbar d-flex justify-content-between'>
			<div class='nav ct-nav' id='js-ct-nav'>		
				<a class='nav-link text-white' href="career-toolbox.php?view=welcome">Welcome</a>
				<a class='nav-link text-white'  href="career-toolbox.php?view=jobs">Jobs</a>
				<div class='dropdown'>
					<span class='nav-link text-white'>Resources <i class="fas fa-caret-down"></i></span>
					<div class='dropdown-wrapper'>
						<a class='nav-link text-white' href="career-toolbox.php?view=articles">Articles</a>
						<a class='nav-link text-white' href="career-toolbox.php?view=videos">Videos</a>
						<a class='nav-link text-white' href="career-toolbox.php?view=stories">Grad Stories</a>
					</div>
				</div>
				<a class='nav-link text-white' href='career-toolbox.php?view=calendar'>Calendar</a>
				<a class='nav-link text-white'  href="career-toolbox.php?view=contact">Contact</a>		
			</div>
			<a href="ct-start.php" class='btn btn-warning btn-sm d-none d-lg-block start-btn'>Start Here</a>
			<button class='btn btn-outline-light d-md-none' id='js-ct-menubtn'>
				X
			</button>
		</div>
	</div>
</div>
