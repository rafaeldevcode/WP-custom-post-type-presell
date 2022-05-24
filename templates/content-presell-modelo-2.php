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
    $text_top = get_post_meta( $post->ID, '_text_top', true );
    $titulo = get_post_meta( $post->ID, '_titulo', true );
    $subtitulo = get_post_meta( $post->ID, '_subtitulo', true );
    $headline = get_post_meta( $post->ID, '_headline', true );
    $headline_2 = get_post_meta( $post->ID, '_headline_2', true );
    $link = get_post_meta(get_the_ID(), '_link', true);
    $texto_botao = get_post_meta( $post->ID, '_texto_botao', true );
    $link_adicional = get_post_meta(get_the_ID(), '_link_adicional', true);
    $texto_link_adicional = get_post_meta( $post->ID, '_texto_link_adicional', true );

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

    $colecao_idiomas = array(
        'Português' => array(
            'label_progress' => 'Estamos quase lá',
        ),

        'Espanhol' => array(
            'label_progress' => '¡Estamos casi alli!',
        ),

        'Inglês' => array(
            'label_progress' => 'We are almost there!',
        )
    );
?>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '-child/assets/css/presell-m2.css' ?>">
    
    <article id="post-<?php the_ID(); ?>" class="conteudo-presell">
        <div class="titulos titulos-progresso">
            <p><?php echo $text_top ?></p>
            <h1><?php echo $titulo ?></h1>
            <h2><?php echo $subtitulo ?></h2>
            <span><?php echo $colecao_idiomas[$idioma]['label_progress'] ?></span>
        </div>

        <!-- Banner Desktop -->
        <?php if (function_exists ('adinserter')) echo adinserter (6); ?>
        <!-- Banner Mobile -->
        <?php if (function_exists ('adinserter')) echo adinserter (18); ?>

        <div class="card-desc">
            <div class="card">
                <?php the_post_thumbnail() ?>
            </div>

            <div class="desc-btn">
                <div class="desc">
                    <p><?php echo $headline ?></p>
                </div>
                <?php
                    if($tipo_post !== 'Sem Botões'){ ?>
                        <div class="btn-presell ">
                            <a class="link-btn" href="<?php echo $link ?>" title="Link"><?php echo $texto_botao ?></a>
                        </div>
                    <?php } 
                ?>
            </div>
        </div>

        <?php
            if(!empty($item_1)): ?>
                <div class="text">
                    <p><?php echo $headline_2 ?></p>
                </div>
            <?php endif;
        ?>

        <?php
            if(!empty($items)): ?>
                <div class="list-desc">
                    <ul>
                    <?php 
                        foreach($items as $item): 
                            if(!empty($item)): ?>
                                <li><i class='small material-icons'>check_circle</i><?php echo $item ?></li>
                            <?php endif; 
                        endforeach;
                    ?>
                    </ul>
                </div>
            <?php endif;
        ?>

        <?php
            if($tipo_post === 'Dois Botões'){ ?>
                <div class="btn-presell btn-bottom">
                    <a class="link-btn" href="<?php echo $link ?>" title="Link"><?php echo $texto_botao ?></a>
                </div>
            <?php } 
        ?>

		<?php
			if(!empty($link_adicional)): ?>
		        <div class="link">
					<a href="<?php echo $link_adicional ?> "><?php echo $texto_link_adicional ?> →</a>
				</div>
			<?php endif;
		?>
        
        <!-- //// Botão CTA caso seja utm source = email //// -->
        <?php get_template_part( 'templates/components/content', 'btncta'); ?>

    </article>

    <script type="text/javascript" src="<?php echo get_template_directory_uri() . '-child/assets/js/custom.js' ?>"></script>
    <script type="text/javascript">
        exibirBotaoCta();
    </script>