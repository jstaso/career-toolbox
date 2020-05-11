
<?php 
    /**
     * This file contains the components for the career services site
     * Each component is listed as a separate function and passes in variables as $vars
    **/
?>

<?php function get_title($vars){ ob_start(); ?>
    <h1><?php echo $vars['title']; ?></h1>
<?php return ob_get_clean(); }; ?>

<?php 
    /** MEDIA COMPONENT 
     * Used in several other components
     * get_media(["image" => "", "title" => "", "titleSize" => "", "text" => "", "url" => "", "linkText" => "" ]);
     * 
    **/
?>

<?php function get_media($vars){ ob_start(); ?>
    <div class='media position-relative py-2'>
        <?php if($vars['image']): ?>
        <img class="mr-3" src="<?php echo $vars['image']; ?>" width="<?php echo $vars['imageSize']; ?>px" alt="<?php echo $vars['title']; ?>">
        <?php endif; ?>

        <?php if($vars['icon']): ?>
            <i class="h3 mr-3 <?php echo $vars['icon']; ?>"></i>
        <?php endif; ?>

        <div class='media-body'>
            <<?php echo $vars['titleSize']; ?> class="m-0"><?php echo $vars['title']; ?></<?php echo $vars['titleSize']; ?>>
            <p class="m-0"><?php echo $vars['text']; ?></p>
            <?php if($vars['url']): ?>
                <a class='stretched-link' href="<?php echo $vars['url'];?>"><?php echo $vars['linkText']; ?></a>
            <?php endif; ?>
        </div>
    </div>
<?php return ob_get_clean(); }; ?>


<?php 
    /** SLAB COMPONENT 
     * Used for slabs on welcome page
     * get_slab(["title" => "", "content" => ""]);
     * 
    **/
?>
<?php function get_slab($vars){ ob_start();?>
    <div class="py-5 my-5 <?php echo $vars['background']; ?>">
        <h2 class='display-4 text-center text-uppercase mb-3'><?php echo $vars['title']; ?></h2>
        <?php echo $vars['content']; ?>
    </div>	
<?php return ob_get_clean(); }; ?>


<?php 
    /** BLOCK COMPONENT 
     * Used for blocks on sub pages
     * get_block(["title" => "", "content" => ""]);
     * 
    **/
?>
<?php function get_block($vars){ ob_start();?>
    <div class="my-3">
        <h2><?php echo $vars['title']; ?></h2>
        <p><?php echo $vars['text']; ?></p>
        <?php echo $vars['content']; ?>
    </div>	
<?php return ob_get_clean(); }; ?>
    
    


<?php 
    /** JUMBOTRON COMPONENT 
     * Used to create jumbotron
     * Won't show button if you don't include url
     * get_jumbotron(["title" => "", "content" => "", "url" => "", "linkText" => ""]);
     * 
    **/
?>

<?php function get_jumbotron($vars){ ob_start();?>

    <div class=' d-md-none text-center mb-4'>
        <img src='<?php echo $vars['bgImage']; ?>' class='img-fluid'>

        <h2 class='text-uppercase'><?php echo $vars['title']; ?></h2>
        <p class=' border-bottom'><?php echo $vars['content']; ?></p>
    </div>
    
    <div class="<?php if(!$vars['mobile']): echo 'd-none d-md-block'; endif; ?>" >
        <div class='jumbotron d-flex align-items-center justify-content-end' style='<?php if ($vars['bgImage']): echo 'background-image:url("'.$vars['bgImage'].'"); background-repeat:no-repeat; background-position:left top; height:469px;'; endif;?>'>
            
            <div class='bg-royal p-3' >     
                <h2 class='h1 text-warning'><?php echo $vars['title']; ?></h2>
                <p class='text-white'><?php echo $vars['content']; ?></p>
                <?php if ($vars['url']): ?>
                <a href='<?php echo $vars['url']; ?>' class='btn btn-outline-warning'><?php echo $vars['linkText']; ?></a>
                <?php endif; ?>                
            </div>
        </div>
    </div>
<?php return ob_get_clean(); }; ?>



<?php 
    /** CAROUSEL COMPONENT 
     * Used to create jumbotron
     * Won't show button if you don't include url
     * get_jumbotron(["title" => "", "content" => "", "url" => "", "linkText" => ""]);
     * 
    **/
?>

<?php function get_carousel($vars){ ob_start();?>

    <div id="main-carousel" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <?php $first = true; ?>
    <?php foreach ($vars['slides'] as $slide): ?>
        <div class="carousel-item <?php echo $first; if($first): echo ' active'; $first=false; endif; ?>">
            <?php echo $slide ?>
        </div>    
    <?php endforeach; ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
   
<?php return ob_get_clean(); }; ?>


<?php function get_featured_card($vars){ ob_start();?>

    <div class='col-12 d-md-none py-3 border-top'>
        <?php echo get_media([
            "titleSize" => 'h6',
            "title" => $vars['title'],
            "text" => $vars['excerpt'],
            "url" => $vars['url'],
            "icon" => $vars['icon']
        ]);?>        
    </div>

   
    <div class='d-none col-md-4 d-md-flex mb-5 justify-content-center'>
        <div class='card border position-relative'>
            <img src='<?php echo $vars['image'];?>'' alt='' class='card-img-top'>
            <div class='card-body bg-royal'>
                <p class='text-uppercase text-white text-center'><?php echo $vars['title']; ?></p>					
            </div>
            <a href="<?php echo $vars['url']; ?>" class='stretched-link'></a>
        </div>
    </div>
   
<?php return ob_get_clean(); }; ?>







<?php 
    /** HOT JOBS COMPONENT 
     * Used to create both hot jobs table and hot jobs media list at mobile
     * Loads json file files/ct_files/json/hot-jobs.json
     * Includes function checkForEmpty() which returns - if there is nothing in that field
     * Uses $tableValues to determine which values to show from json in table
     * Media values are hardcoded
     * num parameter decides how many hot jobs to show
     * Use "num"=>"1000" for all hot jobs. That also removes the all hot jobs button
     * get_hotJobs(["num" => ""]);
     * 
    **/
?>

<?php function get_hotJobs($vars){ 
    ob_start();
    
    function checkForEmpty($string){
        if (!$string){
            return "-";
        }else{
            return $string;
        }
    }
    
    /* Gets the JSON file */
    $data = file_get_contents('files/ct_files/json/hot-jobs.json');
    $hotJobsData = json_decode($data, true);

    /* Sets $count so we can limit how many are returned */
    $count = 0;
    
    /* retrieves the $view for the sort redirect link */
    $view = 'welcome';
    if(isset($_GET['view'])){
        $view = $_GET['view'];
    }

    /* Sets url for changing the sort */
    $newURL = "career-toolbox.php?view=$view&hjsort=";

    /* Checks there is an hjsort value otherwise uses date */ 
    $value = "date";
    if (isset($_GET['hjsort'])):
        $value = $_GET['hjsort'];
    endif;

    /* If a department is set, find only hot jobs with that department */
    if ($vars['department']):         
        $hotJobs = [];
        foreach($hotJobsData as $hotJob):
            if(in_array($vars['department'], $hotJob['departments'])):                
                $hotJobs[] = $hotJob;
            endif;
        endforeach;        
    else:
        $hotJobs = $hotJobsData;
    endif;

    /* Sorts array by hjsort value */
    usort($hotJobs, function($a, $b) use(&$value){
        return $a[$value] <=> $b[$value];
    });

    /* Sets values to display and their order in the table */
    $tableValues = ['job', 'company', 'salary', 'location']

    /* Mobile Size Component*/
?>
    <a id="#hotjobs"></a>
    <div class="d-lg-none row justify-content-center">
        <div class='col-md-8'>
        <?php        
            /* Loop through each returned hot job and check if we've hit the limit */    
            /* We only want to show company, location, and salary and 
            if any of those don't exist they are simply not added */
            foreach($hotJobs as $job): if($count < $vars['num']): 
            
            $content = '<div class="small">';

            if($job['company']){
                $content .= $job['company'];
            }
            if($job['location']){
                $content .= "<br><i class='fas fa-map-marker-alt'></i>&nbsp;" . $job['location'];
            }
            if($job['salary']){
                $content .= "<br><span class='bg-secondary font-weight-bold d-inline-block p1'>&nbsp;"  . $job['salary'] . "&nbsp;</span>";
            }        

            $content .= '</div>';
            
            /* Calls get_media() to make media elements for mobile */
            echo get_media([            
                "titleSize" => 'h5',
                "title" => $job['name'],
                "text" => $content,
                "url" => $job['url']
            ]);
            endif; endforeach;
            /* Sets count back to zero for hot job table */
            $count=0;
        ?>
        </div>
    </div>

    <?php
        /* Creates hot job table for desktop */ 
    ?>
    <div class='row justify-content-center d-none d-lg-block'>
        <div class='col'>
            <table class='table table-sm table-hover'>
                <thead>
                    <tr>                      
                        <?php /* Loop through each $tableValue as set above for thead */ ?>
                        <?php foreach ($tableValues as $tableValue): ?>
                        <th scope="col"><a href="<?php echo $newURL.$tableValue; ?>" class='text-capitalize'><?php echo $tableValue; ?></a></th>
                        <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody class=''>
                <?php /* Loop through each $hotJob for <tr> */ ?>
                <?php foreach ($hotJobs as $job): if($count < $vars['num']): ?>						
                    <tr data-link="<?php echo $job['url']; ?>">
                    <?php foreach ($tableValues as $tableValue): if($tableValue == 'job'): ?>                        
                        <td class='btn btn-link text-capitalize btn-block text-left'><?php echo checkForEmpty($job['name']);?></td>
                    <?php else: ?>
                        <td><?php echo checkForEmpty($job[$tableValue]);?></td>
                    <?php endif; endforeach; ?>                    
                    </tr>						
                <?php $count++; endif; endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php if ($vars["num"] != 1000): ?>
    <div class='text-right'><a href="career-toolbox.php?view=hotjobs" class='btn btn-primary'>All Hot Jobs</a></div>
    <?php endif; ?>
<?php return ob_get_clean(); }; ?>





<?php 
    /** JOB WEBSITE LIST COMPONENT 
     * Lists job websites as media components
     * Loads json file files/ct_files/json/job-websites.json
     * Does not take $vars as of now
     * 
    **/
?>
<?php function get_jobWebsites(){ ob_start(); ?>
    <div>
    <?php
        /* Loads JSON file */
        $data = file_get_contents('files/ct_files/json/job-websites.json');
        $jobWebsites = json_decode($data, true);    

        /* Sorts JSON alphabetically by name */
        $value = 'name';
        usort($jobWebsites, function($a, $b) use(&$value){
            return $a[$value] <=> $b[$value];
        });
        
        /* Displays each $jobWebsite as a media component */
        foreach ($jobWebsites as $jobWebsite): 
            echo get_media([
                "image" => $jobWebsite['logo'],
                "titleSize" => 'h5',
                "title" => $jobWebsite['name'],
                "text" => $jobWebsite['url'],
                "url" => $jobWebsite['url']            
            ]);
        endforeach; 
    ?>
    </div>
<?php return ob_get_clean(); }; ?>




<?php /* GET FEATURED ARTICLES */ ?>
<?php function get_featuredArticles($vars){ ob_start(); ?>
    <div class='row justify-content-center'>			
    <?php
        $data = file_get_contents('files/ct_files/json/articles.json');
        $articles = json_decode($data, true);	
    ?>
    <?php foreach($articles as $key=>$article): if($article['featured']): ?>		
        <div class='col-md-8 col-lg-4 d-flex mb-5 justify-content-center'>
            <div class='card border'>
                <img src='https://via.placeholder.com/600x400' alt='' class='card-img-top'>
                <div class='card-body bg-royal'>
                <p class='text-uppercase text-white text-center'><?php echo $article['title']; ?></p>
                <a href="ct-articles.php?id=<?php echo $key; ?>" class="stretched-link"></a>
                </div>
            </div>
        </div>
    <?php endif; endforeach; ?>
    </div>	
<?php return ob_get_clean(); }; ?>





<?php /* GET EVENTS */ ?>
<?php 
    function get_events($vars){ ob_start();    
        $data = file_get_contents('files/ct_files/json/events.json');
        $events = json_decode($data, true);
        $currMonth = '';
        $count = 0;
        $maxCount = 1000;
        if($vars['num']):
            $maxCount = $vars['num'];
        endif;
?>
    <div class='row justify-content-center'>
    <div class='col col-xl-8'>
<?php
    
    
    foreach($events as $event):        
        if ($count < $maxCount):
            $timeString = strtotime($event['startDate']);
            $month = date('F', $timeString);             
            $year = date('Y', $timeString); 
            $day = date('j', $timeString);

            $timeString = strtotime($event['endDate']);
            $endMonth = date('F', $timeString);
            $endDay = date('j', $timeString);
            
            if ($month != $currMonth):
                echo "<h2 class='h3 mt-5 text-uppercase'>$month $year</h2>";
                $currMonth = $month;
            endif;

            $text = "<p class='small mb-1'>$month $day - $endMonth $endDay</p><p>".$event['text']."</p>";
            echo get_media([
                "icon" => "far fa-calendar-alt", 
                "title" => $event['title'],  
                "titleSize" => "h5",               
                "text" => $text,
                "url" => $event['url'], 
                "linkText" => $event['linkText'] 
            ]);   
            $count++;    
        endif;         
    endforeach;
?>
    </div>
    </div>
<?php  return ob_get_clean(); }; ?>







<?php 
    /** 
     * DEPARTMENT LIST COMPONENT
     * Displays each department as a list item
     * width sets the width at lg size, needed for welcome page
     * get_departments();
     **/
    

?>
<?php function get_departments($vars){ ob_start();
    $data = file_get_contents('files/ct_files/json/departments.json');
    $departments = json_decode($data, true);	
?>


<div class='row'>
    <?php foreach($departments as $department): ?>

    <?php if ($vars['size']=='wide'): ?>
        <div class='col-md-6 mb-2'>     
    <?php else: ?>
        <div class='col-12 mb-2'>
    <?php endif; ?>
    
        <div class="btn btn-outline-light border text-left d-flex align-items-center rounded">
            <div class='d-inline-block bg-warning rounded mr-3 p-3 d-flex justify-content-center align-items-center'>
                <span class="<?php echo $department['icon']; ?> text-white h3"></span>
            </div>  
            <div>
                <p class='m-0 font-weight-bold h5 text-royal'><?php echo $department['name']; ?></p>
                <p class='m-0 small text-muted'><?php echo $department['fullname']; ?></p>
            </div>
            <a href="career-toolbox.php?view=department&id=<?php echo $department['id']; ?>" class="stretched-link"></a>
        </div>
    </div>
    <?php endforeach; ?>
</div>

<?php return ob_get_clean(); }; ?>





