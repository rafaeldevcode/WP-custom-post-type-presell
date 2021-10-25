<?php

/**
 * Modelo de para post customizado "Presell"
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 */
?>
<?php

    $utm_source = isset($_GET['utm_source']) ? $_GET['utm_source'] : '';
    $utm_campaign = isset($_GET['utm_campaign']) ? $_GET['utm_campaign'] : '';
    $utm_term = isset($_GET['utm_term']) ? $_GET['utm_term'] : '';
    // $utm_content = isset($_GET['utm_content']) ? $_GET['utm_content'] : '';
    $utm_medium = isset($_GET['utm_medium']) ? $_GET['utm_medium'] : '';

    $parametros = "?utm_source={$utm_source}&utm_campaign={$utm_campaign}&utm_term={$utm_term}&utm_medium={$utm_medium}";

    $colecao_idiomas = array(
        'Português' => array(
            'Cartão' => array(
                'subtitulo' => 'aprovado',
                'headline_1' => 'Parabéns, está a um passo de solicitar o cartão que mais aprova, com inúmeras vantagens e fácil aprovação.',
                'atencao' => 'ATENÇÃO:',
                'headline_2' => 'Restam poucas unidades, solicite imediatamente!',
                'texto_botao' => 'ver catão',
            ),
            'Empréstimo' => array(
                'subtitulo' => 'aprovado',
                'headline_1' => 'Vamos te dar várias dicas e orientaçõs de como ser aprovado em um empréstimo, mesmo estando negativado.',
                'atencao' => 'ATENÇÃO:',
                'headline_2' => 'Não perca essa ótima oportunidade!',
                'texto_botao' => 'ver empréstimo',
            )
        ),

        'Espanhol' => array(
            'Cartão' => array(
                'subtitulo' => 'aprobado',
                'headline_1' => 'Enhorabuena, estás a un paso de solicitar la tarjeta que más aprueba, con numerosas ventajas y fácil aprobación.',
                'atencao' => 'ATENCIÓN:',
                'headline_2' => 'Quedan pocas unidades, ¡haga su pedido de inmediato!',
                'texto_botao' => 'ver tarjeta',
            ),
            'Empréstimo' => array(
                'subtitulo' => 'aprobado',
                'headline_1' => 'Le daremos varios consejos y pautas sobre cómo ser aprobado para un préstamo, incluso si es negativo.',
                'atencao' => 'ATENCIÓN:',
                'headline_2' => 'No pierdas esta gran oportunidad',
                'texto_botao' => 'ver préstamo',
            )
        )
    );

	$idioma = get_post_meta( $post->ID, '_idioma', true );
	$tipo_post = get_post_meta( $post->ID, '_tipo_post', true );
    $titulo = get_post_meta( $post->ID, '_titulo', true );
	$titulo_lista = get_post_meta( $post->ID, '_titulo_lista', true );
    $link = get_post_meta(get_the_ID(), '_link', true);
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

?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/presell.css">
    
    <article id="post-<?php the_ID(); ?>" class="conteudo-presell">
        <div class="titulo">
            <h2> <?= $titulo ?> </h2>
            <a><?php echo $colecao_idiomas[$idioma][$tipo_post]['subtitulo']; ?></a>
        </div>

        <div class="headline-1">
            <p><?php echo $colecao_idiomas[$idioma][$tipo_post]['headline_1']; ?></p>
        </div>

        <div class="image-presell">
            <?php the_post_thumbnail(); ?>
        </div>

        <div class="headline-2">
            <p><strong><?php echo $colecao_idiomas[$idioma][$tipo_post]['atencao']; ?></strong> <?php echo $colecao_idiomas[$idioma][$tipo_post]['headline_2']; ?> </p>
        </div>
        
        <div class="btn-artigo">
            <a href="<?= $link.$parametros ?>"> <?php echo $colecao_idiomas[$idioma][$tipo_post]['texto_botao']; ?> </a>
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

        <div class="btn-artigo">
            <a href="<?= $link.$parametros ?>"> <?php echo $colecao_idiomas[$idioma][$tipo_post]['texto_botao']; ?>  </a>
        </div>

    </article>