
<script>

var menuOpen = false;

$('#js-ct-menubtn').click(function(){
    if(menuOpen){
        $('#js-ct-nav').slideUp();				
    }else{
        $('#js-ct-nav').slideDown();			
    }
    menuOpen = !menuOpen;
    console.log(menuOpen);
})

$('.dropdown').click(function(e){
    e.stopPropagation();

    if ($('.dropdown-wrapper', this).css('display')=='none'){
        $('.dropdown-wrapper', this).slideDown(); 
    }else{
        $('.dropdown-wrapper', this).slideUp(); 
    }
})

$(window).click(function(){
    $('.dropdown-wrapper').slideUp();
})

</script>



<?php
echo $OUTPUT->footer();
die();
exit;