<?php

/*
Template Name: Kanya Template
*/
?>
   <?php
get_header();
?>
<div class="container">
<div class="row">
    <div class="col-12 text-center mt-5">
        <div class="btn btn-primary text-start">
<?php

echo do_shortcode('[kanye_quotes]');
?>
</div>
</div>
</div>

<?php
get_footer();
?>
