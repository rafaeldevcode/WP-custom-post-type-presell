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
    $exibirAnuncio = $_SERVER['REDIRECT_URL'] === '/presell/oportunidade-antes-de-ver-o-beneficio-liberado-nao-deixe-de-ver-esse-cartao-de-credito-inclusive-para-negativados-iti-itau/' ? true : false;

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
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '-child/assets/css/presell-m1.css' ?>">
    
    <article id="post-<?php the_ID(); ?>" class="conteudo-presell">
        <div class="titulo">
        
            <!-- Banner Desktop -->
            <?php if (function_exists ('adinserter')) echo adinserter (6); ?>

            <h2> <?= $titulo ?> </h2>
            <a <?= $background ?>> <?php echo $subtitulo; ?></a>
        </div>

        <div class="headline-1">
            <p><?php echo $headline; ?></p>
            <!-- Banner Mobile -->
            <?php if (function_exists ('adinserter')) echo adinserter (18); ?>
        </div>

        <div class="image-presell">
            <?php the_post_thumbnail(); ?>
        </div>

        <!-- Banner Desktop para um post especifico -->
        <?php if($exibirAnuncio === true) if (function_exists ('adinserter')) echo adinserter (6); ?>

        <div class="headline-2">
            <p><strong><?php echo $colecao_idiomas[$idioma]['atencao']; ?></strong> <?php echo $headline_2; ?> </p>
        </div>

        <?php
            if($tipo_post !== 'Sem Botões'){ ?>
                <div class="btn-artigo">
                    <a <?= $background ?> href="<?= $link ?>"> <?php echo $texto_botao; ?> </a>
                </div>
        <?php } ?>

        <?php
            if(!empty($item_1)): ?>
                <div class="lista-prsell">
                    <h3><?= $titulo_lista ?></h3>

                    <!-- Banner Mobile para um post especifico -->
                    <?php if($exibirAnuncio === true) if (function_exists ('adinserter')) echo adinserter (17); ?>

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
            <?php endif;
        ?>

        <?php
            if($tipo_post === 'Dois Botões'){ ?>
                <div class="btn-artigo">
                    <a <?= $background ?> href="<?= $link ?>"> <?php echo $texto_botao; ?>  </a>
                </div>
        <?php } ?>

        <div class="texto-presell">
            <?php the_content(); ?>
        </div>

    </article>