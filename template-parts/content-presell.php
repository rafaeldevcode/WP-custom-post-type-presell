<?php

/**
 * Modelo de para post customizado "Presell"
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */
?>
<?php
    
    $idioma = get_post_meta( $post->ID, '_idioma', true );
    $tipo_post = get_post_meta( $post->ID, '_tipo_post', true );
    $titulo = get_post_meta( $post->ID, '_titulo', true );
    $subtitulo = get_post_meta( $post->ID, '_subtitulo', true );
    $headline = get_post_meta( $post->ID, '_headline', true );
    $headline_2 = get_post_meta( $post->ID, '_headline_2', true );
    $titulo_lista = get_post_meta( $post->ID, '_titulo_lista', true );
    $link = get_post_meta(get_the_ID(), '_link', true);
    $texto_botao = get_post_meta( $post->ID, '_texto_botao', true );
    $item_1 = get_post_meta(get_the_ID(), '_item_1', true );
    $item_2 = get_post_meta(get_the_ID(), '_item_2', true );
    $item_3 = get_post_meta(get_the_ID(), '_item_3', true );
    $item_4 = get_post_meta(get_the_ID(), '_item_4', true );
    $item_5 = get_post_meta(get_the_ID(), '_item_5', true );
    $item_6 = get_post_meta(get_the_ID(), '_item_6', true );
    $item_7 = get_post_meta(get_the_ID(), '_item_7', true );
    $item_8 = get_post_meta(get_the_ID(), '_item_8', true );
    $item_9 = get_post_meta(get_the_ID(), '_item_9', true );
    $item_10 = get_post_meta(get_the_ID(), '_item_10', true );

    $utm_source = isset($_GET['utm_source']) ? $_GET['utm_source'] : '';
    $utm_campaign = isset($_GET['utm_campaign']) ? $_GET['utm_campaign'] : '';
    $utm_term = isset($_GET['utm_term']) ? $_GET['utm_term'] : '';
    // $utm_content = isset($_GET['utm_content']) ? $_GET['utm_content'] : '';
    $utm_medium = isset($_GET['utm_medium']) ? $_GET['utm_medium'] : '';
    $fb = isset($_GET['fb']) ? $_GET['fb'] : '';
    $tt = isset($_GET['tt']) ? $_GET['tt'] : '';

    $parametros = "?utm_source={$utm_source}&utm_campaign={$utm_campaign}&utm_term={$utm_term}&utm_medium={$utm_medium}&fb={$fb}&tt={$tt}";

    $background = $tipo_post == 'BlackFriday' ? 'style="background: #000;"' : '';

    $colecao_idiomas = array(
        'Português' => array(
            'atencao' => 'ATENÇÃO:',
        ),

        'Espanhol' => array(
            'atencao' => 'ATENCIÓN:',
        ),

        'Inglês' => array(
            'atencao' => 'ATTENTION:',
        )
    );

?>
    <link rel="stylesheet" href="https://moneynews.com.br/wp-content/themes/jnews-child/assets/css/presell.css">
    
    <article id="post-<?php the_ID(); ?>" class="conteudo-presell">
        <div class="titulo">
        <?php if (function_exists ('adinserter')) echo adinserter (6); ?>
            <h2> <?= $titulo ?> </h2>
            <a <?= $background ?>> <?php echo $subtitulo; ?></a>
        </div>

        <div class="headline-1">
            <p><?php echo $headline; ?></p>
            <?php if (function_exists ('adinserter')) echo adinserter (19); ?>
        </div>

        <div class="image-presell">
            <?php the_post_thumbnail(); ?>
        </div>

        <div class="headline-2">
            <p><strong><?php echo $colecao_idiomas[$idioma]['atencao']; ?></strong> <?php echo $headline_2; ?> </p>
        </div>
        
        <div class="btn-artigo">
            <a <?= $background ?> href="<?= $link.$parametros ?>"> <?php echo $texto_botao; ?> </a>
        </div>

        <div class="texto-presell">
            <?php the_content(); ?>
        </div>

        <div class="lista-prsell">
            <h3><?= $titulo_lista ?></h3>

            <ul>
                <?php 
                    if(!empty($item_1)){echo "<li>{$item_1}</li>";} 
                    if(!empty($item_2)){echo "<li>{$item_2}</li>";} 
                    if(!empty($item_3)){echo "<li>{$item_3}</li>";} 
                    if(!empty($item_4)){echo "<li>{$item_4}</li>";} 
                    if(!empty($item_5)){echo "<li>{$item_5}</li>";} 
                    if(!empty($item_6)){echo "<li>{$item_6}</li>";} 
                    if(!empty($item_7)){echo "<li>{$item_7}</li>";} 
                    if(!empty($item_8)){echo "<li>{$item_8}</li>";} 
                    if(!empty($item_9)){echo "<li>{$item_9}</li>";} 
                    if(!empty($item_10)){echo "<li>{$item_10}</li>";} 
                ?>
            </ul>
        </div>

        <?php
            if($tipo_post !== 'Um Botão'){ ?>
                <div class="btn-artigo">
                    <a <?= $background ?> href="<?= $link.$parametros ?>"> <?php echo $texto_botao; ?>  </a>
                </div>
            <?php } ?>

    </article>