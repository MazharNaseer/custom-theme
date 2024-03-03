<?php

/*
Template Name: Coffee Template
*/
?>
   <?php
get_header();
?>
<div class="container">
<div class="row">
    <div class="col-12 text-center mt-5">
        <div class="btn btn-primary">
<?php

echo do_shortcode('[random_coffee_button]');
?>
</div>
</div>
</div>

<?php
get_footer();
?>
