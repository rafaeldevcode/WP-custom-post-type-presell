<?php

/**
 * Modelo de para post customizado "Presell"
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */
?>
<?php
    
    $modelo_presell = get_post_meta( $post->ID, '_modelo_presell', true );
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
        <div class="titulos">
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

        <!-- Exibir formulario caso seja Modelo 2 + Formulário -->
        <?php
            if($modelo_presell === 'modelo_3'):
                get_template_part( 'templates/components/content', 'formulario');
            endif;
        ?>

        <?php
            if(!empty($item_1)): ?>
                <div class="text">
                    <p><?php echo $headline_2 ?></p>
                </div>
            <?php endif;
        ?>

        <?php
            if(!empty($item_1)): ?>
                <div class="list-desc">
                    <ul>
                    <?php 
                        if(!empty($item_1)){echo "<li><i class='small material-icons'>check_circle</i>{$item_1}</li>";} 
                        if(!empty($item_2)){echo "<li><i class='small material-icons'>check_circle</i>{$item_2}</li>";} 
                        if(!empty($item_3)){echo "<li><i class='small material-icons'>check_circle</i>{$item_3}</li>";} 
                        if(!empty($item_4)){echo "<li><i class='small material-icons'>check_circle</i>{$item_4}</li>";} 
                        if(!empty($item_5)){echo "<li><i class='small material-icons'>check_circle</i>{$item_5}</li>";} 
                        if(!empty($item_6)){echo "<li><i class='small material-icons'>check_circle</i>{$item_6}</li>";} 
                        if(!empty($item_7)){echo "<li><i class='small material-icons'>check_circle</i>{$item_7}</li>";} 
                        if(!empty($item_8)){echo "<li><i class='small material-icons'>check_circle</i>{$item_8}</li>";} 
                        if(!empty($item_9)){echo "<li><i class='small material-icons'>check_circle</i>{$item_9}</li>";} 
                        if(!empty($item_10)){echo "<li><i class='small material-icons'>check_circle</i>{$item_10}</li>";} 
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
    </article>

    <script type="text/javascript" src="<?php echo get_template_directory_uri() . '-child/assets/js/main.js' ?>"></script>