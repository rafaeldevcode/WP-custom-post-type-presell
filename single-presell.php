<?php
    get_header();

    $args = array(
        'post_type'      => 'presell',
        'post_status'    => 'publish',
        'posts_per_page' => 1,
        'tax_query' => 'categorias'
    );

    $query = new WP_Query( $args );
    
        the_post();
        $modelo_presell = get_post_meta( $post->ID, '_modelo_presell', true );
        $modelo_presell = str_replace('_', '-', $modelo_presell);
        $modelo_presell = empty($modelo_presell) ? 'modelo-1' : $modelo_presell;

        get_template_part('template/content', 'presell-'.$modelo_presell);
                

    get_footer();
?>