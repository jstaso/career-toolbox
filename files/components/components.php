
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
    <div class='media position-relative border-top py-2'>
        <?php if($vars['image']): ?>
        <img class="mr-3" src="<?php echo $vars['image']; ?>" width="<?php echo $vars['imageSize']; ?>px" alt="<?php echo $vars['title']; ?>">
        <?php endif; ?>

        <?php if($vars['icon']): ?>
            <i class="far fa-calendar-alt mr-3 h1"></i>
        <?php endif; ?>

        <div class='media-body'>
            <<?php echo $vars['titleSize']; ?> class="m-0"><?php echo $vars['title']; ?></<?php echo $vars['titleSize']; ?>>
            <p class="m-0 text-truncate" style='max-width:650px'><?php echo $vars['text']; ?></p>
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
    <div class='jumbotron py-5'>
        <div class='col-lg-6 offset-lg-6 offset-lg-4 py-5'>
            <div class='jumbotron-text'>
                <h2 class='h1'><?php echo $vars['title']; ?></h2>
                <p><?php echo $vars['content']; ?></p>
                <?php if ($vars['url']): ?>
                <a href='<?php echo $vars['url']; ?>' class='btn btn-outline-warning'><?php echo $vars['linkText']; ?></a>
                <?php endif; ?>
            </div>
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





<?php /* GET WELCOME EVENTS */ ?>
<?php 
    function get_events($vars){ ob_start();    
        $data = file_get_contents('files/ct_files/json/events.json');
        $events = json_decode($data, true);
?>
        <div class='row justify-content-center'>
        <div class='col-xl-8'>
<?php
        foreach($events as $event):             
            echo get_media([
                "icon" => "far fa-calendar-alt", 
                "title" => $event['title'],  
                "titleSize" => "h5",               
                "text" => $event['text'], 
                "url" => $event['url'], 
                "linkText" => $event['linkText'] 
            ]);         
        endforeach;     
?>
    </div>
    </div>
<?php
    return ob_get_clean(); }; 
?>


<?php function get_welcomeEvents($vars){ ob_start(); ?> 
    <div class='row justify-content-center'>
    <?php
        $data = file_get_contents('files/ct_files/json/events.json');
        $events = json_decode($data, true);
    ?>
        <div class='col-md-5 order-2 d-none d-lg-block'>		
            <div class='text-center position-relative'>
                <img src='<?php echo $events[0]['image']; ?>' class='img-fluid'>
                <div>
                    <h3 class="h5 m-0"><?php echo $events[0]['title']; ?></h3>
                    <p class='m-0'><?php echo $events[0]['date']; ?></p>
                    <p class='mt-2'><?php echo $events[0]['excerpt']; ?></p>					
                    <a href="articles.php?id=0" class='btn btn-primary stretched-link'>Read More</a>					
                </div>
            </div>
        </div>
        <div class='col-xl-4 col-lg-5 col-md-8 mr-3 order-1'>	
        <?php	
            for($i=0; $i<=4; $i++): 
            $event = $events[$i];
            if($i==0):
                echo "<div class='d-block d-lg-none'>";
                echo get_media([
                    "image" => $event['image'],
                    "title" => $event['title'],
                    "titleSize" => "h5",
                    "imageSize" => "75",
                    "text" => $event['date']."<br>".$event['text'],
                    "url" => 'career-toolbox.php?view=calendar',
                ]);
                echo "</div>";
            
            elseif($event):
               echo get_media([
                    "image" => $event['image'],
                    "title" => $event['title'],
                    "titleSize" => "h5",
                    "imageSize" => "75",
                    "text" => $event['date']."<br>".$event['text'],
                    "url" => 'career-toolbox.php?view=calendar',
                ]);
                endif; endfor; 
        ?>
        </div>	
        
    </div>	
<?php return ob_get_clean(); }; ?>






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
    <div class='col-6 mb-2'>       
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





