<?php
get_header();
?>

<div class="container">
    <div class="row">
        <div class="col-md-12 mb-4 text-center">
            <?php if ( have_posts() ) : ?>
                <?php the_post(); ?>
                <?php
                $post_title = get_the_title();
                $post_description = get_the_content();
                $post_image_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
                ?>
                <section class="border-bottom mb-4">
                    
                    <?php if ( ! empty( $post_image_url ) ) : ?>
                        <img src="<?php echo $post_image_url; ?>" class="img-fluid shadow-2-strong rounded mb-4" alt="<?php echo esc_attr( $post_title ); ?>" />
                    <?php endif; ?>
                    <h1><?php echo $post_title; ?></h1>
                </section>
                <section>
                    <?php echo $post_description; ?>
                </section>
            <?php else : ?>
                <p>No post found.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
get_footer();
?>
