<?php
get_header();
?>

<div class="container py-5">
  <div class="row">
    <?php

    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

    $args = array(
        'post_type'      => 'projects',
        'posts_per_page' => 6,
        'paged'          => $paged,
    );
    $query = new WP_Query( $args );

    $count = 0; 

    if ( $query->have_posts() ) :
        while ( $query->have_posts() ) : $query->the_post();
          
            $count++;

        
            ?>
            <div class="col-md-4">
                <div class="card mb-3">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <img src="<?php the_post_thumbnail_url( 'large' ); ?>" class="card-img-top" alt="<?php the_title_attribute(); ?>">
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?php the_title(); ?></h5>
                        <p class="card-text"><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
                    </div>
                </div>
            </div>

            <?php
       
            if ( $count % 3 == 0 ) {
                echo '</div><div class="row">'; 
            }
        endwhile;
        ?>
    </div> 
    <!-- Pagination at the top -->
    <div class="pagination">
        <?php
        previous_posts_link('&laquo; Previous');
        next_posts_link('Next &raquo;', $query->max_num_pages);
        ?>
    </div>
</div> 


<?php

wp_reset_postdata();
else :
    echo 'No projects found.';
endif;

get_footer();
?>
