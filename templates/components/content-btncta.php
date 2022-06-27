<?php 
    $modelo_presell = get_post_meta( $post->ID, '_modelo_presell', true );
    $utm_source = isset($_GET['utm_source']) ? $_GET['utm_source'] : '';
    $link = get_post_meta(get_the_ID(), '_link', true);
    $texto_botao = get_post_meta( $post->ID, '_texto_botao', true );
    $btn_animation = get_post_meta( $post->ID, '_btn_animation', true );
?>

<section id="btn-cta" class="btn-cta">
    <a class="<?php echo $btn_animation === 'yes' ? 'animationCta' : '' ?>" href="<?php echo $link ?>" titlle="Ver artigo">
        <?php echo $texto_botao ?>
    </a>
</section>