<div class='container'>

    <?php
        $id = 'pbs';
        if (isset($_GET['id'])): 
          $id = $_GET['id'];
        endif;

        $data = file_get_contents('files/ct_files/json/departments.json');
        $departments = json_decode($data, true);
        $department = [];

        foreach ($departments as $d): 
            if ($d['id'] == $id):
                $department = $d;
            endif;
        endforeach;
    ?>

    <?php
        echo get_jumbotron([
            'title' => $department['fullname']
        ]);
    ?>


    <?php        
        echo get_block([
			'title'=>'<i class="fas fa-fire-alt text-danger"></i>  Hot Jobs <i class="fas fa-fire-alt text-danger"></i>',
			'content'=>get_hotjobs([
                'department' => $department['id'],
                'num' => 1000
            ])
		]); 
    ?>

</div>
