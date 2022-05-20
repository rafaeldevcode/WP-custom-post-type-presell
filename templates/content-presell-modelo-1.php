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

    $items = [
		get_post_meta( $post->ID, '_item_1', true ),
		get_post_meta( $post->ID, '_item_2', true ),
		get_post_meta( $post->ID, '_item_3', true ),
		get_post_meta( $post->ID, '_item_4', true ),
		get_post_meta( $post->ID, '_item_5', true ),
		get_post_meta( $post->ID, '_item_6', true ),
		get_post_meta( $post->ID, '_item_7', true ),
		get_post_meta( $post->ID, '_item_8', true ),
		get_post_meta( $post->ID, '_item_9', true ),
		get_post_meta( $post->ID, '_item_10', true )
	];

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
            if(!empty($items)): ?>
                <div class="lista-prsell">
                    <h3><?= $titulo_lista ?></h3>

                    <!-- Banner Mobile para um post especifico -->
                    <?php if($exibirAnuncio === true) if (function_exists ('adinserter')) echo adinserter (17); ?>

                    <ul>
                        <?php 
                            foreach($items as $item): 
                                if(!empty($item)): ?>
                                    <li><?php echo $item ?></li>
                                <?php endif; 
                            endforeach;
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

        <!-- //// Botão CTA caso seja utm source = email //// -->
        <?php get_template_part( 'templates/components/content', 'btncta'); ?>

    </article>

    <script type="text/javascript" src="<?php echo get_template_directory_uri() . '-child/assets/js/custom.js' ?>"></script>
    <script type="text/javascript">
        exibirBotaoCta();
    </script>