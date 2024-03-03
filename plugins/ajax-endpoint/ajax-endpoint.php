<?php
/*
Plugin Name: AJAX Endpoint
Description: Adds a custom AJAX endpoint fetch project.
Version: 1.0
Author: Mazhar Naseer
*/

add_action('wp_ajax_my_custom_ajax_endpoint', 'my_custom_ajax_callback');
add_action('wp_ajax_nopriv_my_custom_ajax_endpoint', 'my_custom_ajax_callback');

function my_custom_ajax_callback() {
   
    $is_logged_in = is_user_logged_in();

    $count = $is_logged_in ? 6 : 3;
    $args = array(
        'post_type'      => 'projects',
        'posts_per_page' => $count,
        'tax_query'      => array(
            array(
                'taxonomy' => 'project_type',
                'field'    => 'slug',
                'terms'    => 'architecture',
            ),
        ),
    );
    
    $projects_query = new WP_Query( $args );
    $data = array();
    
    if ($projects_query->have_posts()) {
        while ($projects_query->have_posts()) {
            $projects_query->the_post();

            $id    = get_the_ID();
            $title = get_the_title();
            $link  = get_permalink();

          
            $data[] = array(
                'id'    => $id,
                'title' => $title,
                'link'  => $link,
            );
        }
        wp_reset_postdata();
    }

   
    wp_send_json_success($data);
}


function render_projects_shortcode() {
    ob_start();
    
    ?>
   
    <div class="container ">
  
    <div id="project-container" class="d-flex text-center my-5">
        <div id="projects-list"></div>
    </div>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    console.log("yes");
</script>
<script>
    jQuery(document).ready(function($) {
        $.ajax({
            url: '<?php echo admin_url('admin-ajax.php'); ?>',
            type: 'POST',
            data: {
                action: 'my_custom_ajax_endpoint'
            },
            success: function(response) {
                if (response.success) {
                    var container = $('#project-container'); 
                    response.data.forEach(function(project) {
                      
                        var card = $('<div class="card mx-3 px-3"></div>');

                        card.append('<h3>' + project.title + '</h3>');
                        card.append('<p>ID: ' + project.id + '</p>');
                        card.append('<a href="' + project.link + '">Link</a>');
                        card.append('<br><br><br>')
                        container.append(card);
                    });
                } else {
                    console.error("Server returned error: " + response.data);
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
                console.log("Error occurred while fetching data.");
            }
        });
    });
</script>


    <?php
    return ob_get_clean();
}
add_shortcode('display_projects', 'render_projects_shortcode');
