<?php 
    $utm_source = isset($_GET['utm_source']) ? $_GET['utm_source'] : '';
    $link = get_post_meta(get_the_ID(), '_link', true);
    $texto_botao = get_post_meta( $post->ID, '_texto_botao', true );
?>

<section id="btn-cta" class="btn-cta <?php echo ($utm_source == 'email' || $utm_source == 'email007' || $utm_source == 'email-007' || $utm_source == 'facebook') ? '' : 'display-none' ?>">
    <a href="<?php echo $link ?>" titlle="Ver artigo">
        <?php echo $texto_botao ?>
    </a>
</section>