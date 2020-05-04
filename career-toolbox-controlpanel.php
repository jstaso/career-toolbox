


<?php include('files/ct_files/inc/header.php'); ?>




<?php 
    /** Checks if form was sent */
    if (isset($_POST['sent'])):     

      /** Creates new hot job and fills the things */
      $newHotJob = [
        "url" => strip_tags($_POST['url']),
        "date" => strip_tags($_POST['date']),
        "name" => strip_tags($_POST['title']),
        "company" => strip_tags($_POST['company']),
        "location" => strip_tags($_POST['location']),
        "salary" => strip_tags($_POST['salary']),
        "departments" => $_POST['department']
      ];

      /** retrieves json, decodes it, adds the new job, encodes, and puts it back */
      $data = file_get_contents('files/ct_files/json/hot-jobs.json');
      $hotJobs = json_decode($data, true);
      $hotJobs[] = $newHotJob;
      $data = json_encode($hotJobs);
      file_put_contents('files/ct_files/json/hot-jobs.json', $data);        
  
 endif; 
 ?>

<?php
      /** Checks if deleting a hotjob */
      if (isset($_POST['del'])):
        $key = $_POST['del'];
        $data = file_get_contents('files/ct_files/json/hot-jobs.json');
        $hotJobs = json_decode($data, true);
        $value = 'date';
        usort($hotJobs, function($a, $b) use(&$value){
            return $a[$value] <=> $b[$value];
        });
        unset( $hotJobs[$key] );
        $data = json_encode($hotJobs);
        file_put_contents('files/ct_files/json/hot-jobs.json', $data);         

      endif;
?>


<?php 
    /** Checks if adding an event */
    if(isset($_POST['addEvent'])): 
        $newEvent = [
            "title" => strip_tags($_POST['title']), 
            "startDate" => strip_tags($_POST['startDate']),
            "endDate" => strip_tags($_POST['endDate']),
            "location" => strip_tags($_POST['location']),
            "image" => "https://via.placeholder.com/800x600", 
            "text" => strip_tags($_POST['text']),
            "linkText" => strip_tags($_POST['btn']),
            "url" => strip_tags($_POST['url']),
            "tbd" => strip_tags($_POST['tbd']),
            "excerpt" => strip_tags($_POST['excerpt'])
        ];        
        
        $data = file_get_contents('files/ct_files/json/events.json');
        $events = json_decode($data, true);
        $events[]  = $newEvent;
        $data = json_encode($events);
       file_put_contents('files/ct_files/json/events.json', $data);    

    endif; 
?>

<?php
      /** Checks if deleting an event */
      if (isset($_POST['delEvent'])):
        $key = $_POST['delEvent'];
        $data = file_get_contents('files/ct_files/json/events.json');
        $events = json_decode($data, true);
        $value = 'startDate';
        usort($events, function($a, $b) use(&$value){
            return $a[$value] <=> $b[$value];
        });
        unset( $events[$key] );
        $data = json_encode($events);
        file_put_contents('files/ct_files/json/events.json', $data);         

      endif;
?>


<?php 
    /** Checks if cleanup hotJobs */
    if (isset($_POST['cleanupHotJobs'])):
        
        $data = file_get_contents('files/ct_files/json/hot-jobs.json');
        $hotjobs = json_decode($data, true);
        $time = strtotime("-30 days");

        foreach($hotjobs as $key=>$hotjob):
            if(strtotime($hotjob['date']) <= $time):
                unset( $hotjobs[$key] );
            endif;
        endforeach;

        $data = json_encode($hotjobs);
        file_put_contents('files/ct_files/json/hot-jobs.json', $data);
    endif;
?>


<?php 
    /** Checks if cleanup event */
    if (isset($_POST['cleanupEvents'])):
        
        $data = file_get_contents('files/ct_files/json/events.json');
        $events = json_decode($data, true);
        $now = strtotime("now");
        foreach($events as $key=>$event):
            if(strtotime($event['endDate']) < $now):
                unset( $events[$key] );
            endif;
        endforeach;

        $data = json_encode($events);
        file_put_contents('files/ct_files/json/events.json', $data);
    endif;
?>



<div class='container'>
<h1>Edit Hot Jobs</h1>

<div class='row'>


<div class='col'>
    <h2>Remove Hot Jobs</h2>
    <div class='mb-2'>
            <form action="career-toolbox-controlpanel.php" method="post">
                    <input type="hidden" value='true' name='cleanupHotJobs'>
                    <button type="submit" class='btn btn-sm btn-outline-danger'>Cleanup Hot Jobs</button>
            </form>
        </div>

    <?php
        $data = file_get_contents('files/ct_files/json/hot-jobs.json');
        $hotJobs = json_decode($data, true);
        $value = 'date';
        usort($hotJobs, function($a, $b) use(&$value){
            return $a[$value] <=> $b[$value];
        });
    ?>

    <table class='table table-sm table-hover'>
        <thead>
            <tr>
                <th scope='col'>&nbsp;</th>
                <th scope='col'>Date</th>
                <th scope='col'>Title</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($hotJobs as $key => $hotJob): ?>
            <tr>
                <td>
                    <form action="career-toolbox-controlpanel.php" method="post">
                        <input type="hidden" value="<?php echo $key; ?>" name="del">
                        <button type="submit" class='btn btn-sm btn-danger rounded delbtn'>&times;</button>
                    </form>
                </td>
                <td><?php echo date('m/d/y', strtotime($hotJob['date'])); ?></td>
                <td><?php echo $hotJob['name']; ?><br><span class='small text-muted'><?php echo $hotJob['company']; ?></span></td>
            </tr>
            <?php endforeach; ?>
        </tbody>        

    </table>
</div>

<div class='col'>
    <h2>Add Hot Jobs</h2>
    <?php
        $data = file_get_contents('files/ct_files/json/departments.json');
        $departments = json_decode($data, true);    

        $hjInputs = [
            [
                "label"=> "Job URL",
                "name"=> "url",
                "type"=> "url"
            ],
            [
                "label"=> "Date Added to Job Site",
                "name"=> "date",
                "type"=> "date"
            ],
            [
                "label"=> "Job Title",
                "name"=> "title",
                "type"=> "text"
            ],
            [
                "label"=> "Job Companay",
                "name"=> "company",
                "type"=> "text"
            ],
            [
                "label"=> "Job Location",
                "name"=> "location",
                "type"=> "text"
            ],
            [
                "label"=> "Salary",
                "name"=> "salary",
                "type"=> "text"
            ]
        ];
    ?>

    <form action='career-toolbox-controlpanel.php' method="post">
        
        <?php foreach ($hjInputs as $hjInput): ?>
            <div class='form-group'>
                <label class='mb-0'><?php echo $hjInput['label']; ?></label>        
                <input required class='form-control' type="<?php echo $hjInput['type']; ?>" name="<?php echo $hjInput['name']; ?>">  
            </div>
        <?php endforeach; ?>
        
        <?php foreach ($departments as $department): ?>
            <div class='form-check'>
                <input checked class='form-check-input' type="checkbox" value="<?php echo $department['id']; ?>" name="department[]">
                <label  class='form-check-label'><?php echo $department['fullname']; ?></label>
            </div>
        <?php endforeach; ?>
        <input type="hidden" name="sent" value="true">
        <button type="submit" class='btn btn-primary mt-4'>Add Hot Job</button>    
    </form>
</div>

</div>

<hr>

<div class='continer'>
    <div class='row'>
        <div class='col'>
        <?php
            $data = file_get_contents('files/ct_files/json/events.json');
            $events = json_decode($data, true);    
            $value = 'startDate';
            usort($events, function($a, $b) use(&$value){
                return $a[$value] <=> $b[$value];
            });
        ?>
        
        
        <h2>Remove Events</h2>
        <div class='mb-2'>
            <form action="career-toolbox-controlpanel.php" method="post">
                    <input type="hidden" value='true' name='cleanupEvents'>
                    <button type="submit" class='btn btn-sm btn-outline-danger'>Cleanup Events</button>
            </form>
        </div>
        <table class='table table-sm table-hover'>
            <thead>
                <tr>
                    <th scope='col'>&nbsp;</th>
                    <th scope='col'>Title</th>
                    <th scope='col'>Start</th>
                    <th scope='col'>End</th>
                </tr>
        </thead>


        <?php foreach($events as $key=>$event): ?>
            
            <tr>
            <td><form action="career-toolbox-controlpanel.php" method="post">
                        <input type="hidden" value="<?php echo $key; ?>" name="delEvent">
                        <button type="submit" class='btn btn-sm btn-danger rounded delbtn'>&times;</button>
                    </form></td>
            <td><?php echo $event['title']; ?></td>
            <td><?php echo $event['startDate']; ?></td>
            <td><?php echo $event['endDate']; ?></td>            
            </tr>

        <?php endforeach; ?>

        </table>


        </div>
        <div class='col'>

            



            <h2>Add Events</h2>
            


            <form action="career-toolbox-controlpanel.php" method="post">
            <div class='form-group'>
                <label>
                    Event Title
                </label>
                <input type='text' class='form-control' name='title'>
            </div>

            <div class='form-group'>
                <label>
                    Event Location
                </label>
                <input type='text' class='form-control' name='location'>
            </div>

            <div class="form-check my-3">
                <input class='form-check-input' type='checkbox' value='true' name='tbd'>
                <label class='form-check-label'>Date TBA</label>
             </div>            
            
            <div class='form-group'>
                <label>
                    Start Date:
                </label>
                <input type='date' class='form-control' name='startDate'>
            </div>

            <div class='form-group'>
                <label>
                    End Date:
                </label>
                <input type='date' class='form-control' name='endDate'>
            </div>

            

            <div class='form-group'>
                <label>
                   URL:
                </label>
                <input type='url' class='form-control' name='url'>
            </div>

            <div class='form-group'>
                <label>
                Button Text:
                </label>
                <input type='text' class='form-control' name='btn'>
            </div>

            <div class='form-group'>
                <label>
                Text:
                </label>
                <textarea class='form-control' name='text'></textarea>
            </div>

            <div class='form-group'>
                <label>
                Excerpt:
                </label>
                <textarea class='form-control' name='excerpt'></textarea>
            </div>

            <input type="hidden" value="true" name="addEvent">

            <button type='submit' class='btn btn-primary'>Add Event</button>

            </form>
        </div>
    </div>
</div>


<?php include('files/ct_files/inc/footer.php'); ?>

