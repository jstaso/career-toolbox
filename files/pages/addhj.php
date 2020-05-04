<div class='container'>
	<h1>Add Hot Jobs</h1>
<div class='row'>


<div class='col'>
    <?php        
        echo get_block([
			'title'=>"Edit Hot Jobs",
			'content'=>get_hotjobs([                
                'num' => 1000,
                'edit' => true
            ])
		]); 
    ?>
</div>

<div class='col'>
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

    <form action='addhj.php'>
        
        <?php foreach ($hjInputs as $hjInput): ?>
            <div class='form-group'>
                <label class='mb-0'><?php echo $hjInput['label']; ?></label>        
                <input class='form-control' type="<?php echo $hjInput['type']; ?>" name="<?php echo $hjInput['name']; ?>">  
            </div>
        <?php endforeach; ?>
        
        <?php foreach ($departments as $department): ?>
            <div class='form-check'>
                <input class='form-check-input' type="checkbox" value="" name="department">
                <label class='form-check-label'><?php echo $department['fullname']; ?></label>
            </div>
        <?php endforeach; ?>
        
        <button type="submit" class='btn btn-primary mt-4'>Add Hot Job</button>    
    </form>
</div>

</div>
