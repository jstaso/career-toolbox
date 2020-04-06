<?php

require_once("../../config.php");

global $SITE;

require_login();

$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_pagetype('site-index');
$PAGE->set_pagelayout('standard');
$PAGE->set_title("Career Toolbox - My Laurus Portal");
$PAGE->navbar->add("<a href='ct-jobs.php'>Find a Job</a>" );
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
		z-index: 100;
	}

	.bg-royal{
		background-color:#092240;
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

<div class="generalbox">

<div class='py-2 mb-4' style='background-color:#0D3C76;'>
	<div class='container'>
		<div class='ct-navbar d-flex justify-content-between'>
			<div class='nav ct-nav' id='js-ct-nav'>		
				<a class='nav-link text-white' href="ct-welcome.php">Welcome</a>
				<a class='nav-link text-white'  href="ct-jobs.php">Jobs</a>
				<div class='dropdown'>
					<span class='nav-link text-white'>Resources <i class="fas fa-caret-down"></i></span>
					<div class='dropdown-wrapper'>
						<a class='nav-link text-white' href="ct-articles.php">Articles</a>
						<a class='nav-link text-white' href="ct-videos.php">Videos</a>
						<a class='nav-link text-white' href="ct-stories.php">Grad Stories</a>
					</div>
				</div>
				<a class='nav-link text-white' href='ct-calendar.php'>Calendar</a>
				<a class='nav-link text-white'  href="ct-contact.php">Contact</a>		
			</div>
			<a href="ct-start.php" class='btn btn-warning btn-sm d-none d-lg-block start-btn'>Start Here</a>
			<button class='btn btn-outline-light d-md-none' id='js-ct-menubtn'>
				X
			</button>
		</div>
	</div>
</div>
