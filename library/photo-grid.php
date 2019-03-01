<?php


// function to display a photo grid
function the_photo_grid( $post_id = 0 ) {

    // get all the footer custom field content
    $title = get_post_meta( ( $post_id > 0 ? $post_id : get_the_ID() ), CMB_PREFIX . "photo_grid_title", 1 );
    $description = get_post_meta( ( $post_id > 0 ? $post_id : get_the_ID() ), CMB_PREFIX . "photo_grid_description", 1 );
    $photos = get_post_meta( ( $post_id > 0 ? $post_id : get_the_ID() ), CMB_PREFIX . "photo_grid", 1 );

    // if we have photos, let's display them.
    if ( !empty( $photos ) ) {
        ?>
        <div class="photo-grid">
            <div class="group">
                <div class="photo-grid-title-icon">
                    <img src="<?php bloginfo( 'template_url' ); ?>/img/icon-photos.png" class="photo-icon">
                </div>
                <div class="photo-grid-title-text">
                    <h2><?php print $title; ?></h2>
                    <div class="description">
                        <?php print $description; ?>
                    </div>
                </div>
            </div>
        <?php
        $num = 1;
        foreach ( $photos as $key => $photo ) {
            /*
            if ( $num == 1 ) {
                $class = "one";
                $height = 608;
                $width = 600;
            } else if ( $num == 2) {
                $class = "two";
                $height = 300;
                $width = 600;                
            } else {
                */
                $class = "generic";
                $height = 300;
                $width = 300;
                /*
            }
            if ( $num == 5 ) {
                $class = "generic fifth";
            }
            */
            ?>
            <div class="photo <?php print $class ?>">
                <?php if ( !empty( $photo["link"] ) ) { ?><a href="<?php print $photo["link"] ?>"><?php } ?>
                    <img src="<?php print p_image_resize( $photo["image"], $width, $height, 1, 1 ); ?>" alt="<?php print $photo["title"] ?>">
                    <h3><?php print $photo["title"] ?></h3>
                <?php if ( !empty( $photo["link"] ) ) { ?></a><?php } ?>
            </div>
            <?php
            $num++;
        }
        ?>
        </div>
        <?php
    }

}




?>