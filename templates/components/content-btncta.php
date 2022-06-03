<?php 
    $modelo_presell = get_post_meta( $post->ID, '_modelo_presell', true );
    $utm_source = isset($_GET['utm_source']) ? $_GET['utm_source'] : '';
    $link = get_post_meta(get_the_ID(), '_link', true);
    $texto_botao = get_post_meta( $post->ID, '_texto_botao', true );
    $displayNone = $modelo_presell == 'modelo_7' || $modelo_presell == 'modelo_3' ? '' : 'display-none';
?>

<section id="btn-cta" class="btn-cta <?php echo ($utm_source == 'email' || $utm_source == 'email007' || $utm_source == 'email-007' || $utm_source == 'facebook') ? '' : $displayNone ?>">
    <a href="<?php echo $link ?>" titlle="Ver artigo">
        <?php echo $texto_botao ?>
    </a>
</section>