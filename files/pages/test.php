<?php include('files/ct_files/inc/header.php'); ?>


<div class='container'>	

<?php

function findElement($delimter, $articleString){
    $array = explode("<$delimter>", $articleString);
    return $array[1];

}

 $articleLinks = glob('files/ct_files/articles/*.html');

 foreach ($articleLinks as $articleLink){
    $articleString = file_get_contents($articleLink);
    echo "<h2>".findElement('title', $articleString)."</h2>";
    echo "<div>".findElement('excerpt', $articleString)."</div>";
 }




?>


</div>


<?php include('files/ct_files/inc/footer.php'); ?>
