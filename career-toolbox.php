
<?php include('files/ct_files/inc/header.php'); ?>


<?php 
    $view="welcome";
    if(isset($_GET['view'])):
        $view = $_GET['view'];
    endif;


    $views = ['welcome', 'jobs', 'articles', 'videos', 'calendar', 'contact', 'hotjobs', 'department'];

    if(!in_array($view, $views)){
        $view = 'welcome';
    }
    
    include("files/ct_files/pages/$view.php"); 
?>



<?php include('files/ct_files/inc/footer.php'); ?>
