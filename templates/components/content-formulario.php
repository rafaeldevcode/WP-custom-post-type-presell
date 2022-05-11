<?php 
	$tipo_quiz = get_post_meta( $post->ID, '_tipo_quiz', true );
	$link = get_post_meta( $post->ID, '_link', true );
	$opcao_apos_envio = get_post_meta( $post->ID, '_opcao_apos_envio', true );
    $form_id = get_post_meta( $post->ID, '_form_id', true ); 
    $idioma = get_post_meta( $post->ID, '_idioma', true );
    $headline_form = get_post_meta( $post->ID, '_headline_form', true );
	$botao_form = get_post_meta( $post->ID, '_botao_form', true );
    $modelo_presell = get_post_meta( $post->ID, '_modelo_presell', true );

    $colecao_idiomas = [
        'Português' => [
            'nome_form'      => 'Nome',
            'email_form'     => 'E-mail',
            'telefone_form'  => 'Telefone'
        ],

        'Espanhol' => [
            'nome_form'      => 'Nombre',
            'email_form'     => 'E-mail',
            'telefone_form'  => 'Teléfono'
        ],

        'Inglês' => [
            'nome_form'      => 'Name',
            'email_form'     => 'E-mail',
            'telefone_form'  => 'Telephone'
        ]
    ];
?>

<section class="formulario-presell" id="formulario-presell">
    <div class="loading" id="loading"><div></div></div>

    <div <?php echo $modelo_presell == 'modelo_5' ? 'class="display-none"' : '' ?> id="form">
        <h4><?php echo $headline_form ?></h4>
        <form action="?" method="POST" id="formulario">
            <input type="hidden" id="url" name="url" value="<?php echo get_site_url() . '/api_mautic/send_api.php' ?>">
            <input type="hidden" id="form_id" name="form_id" value="<?php echo $form_id ?>">
            <input type="hidden" id="idioma" name="idioma" value="<?php echo $idioma ?>">
            <input type="hidden" id="artigo" name="artigo" value="<?php echo $link ?>">
            <input type="hidden" id="tipo_quiz" name="tipo_quiz" value="<?php echo $tipo_quiz ?>">
            <input type="hidden" id="opcao_apos_envio" name="opcao_apos_envio" value="<?php echo $opcao_apos_envio ?>">

            <div class="inputs">
                <div class="input">
                    <input required type="text" id="nome" name="nome">
                    <label for="nome"><?php echo $colecao_idiomas[$idioma]['nome_form'] ?></label>
                    <span class="error"></span>
                </div>

                <div class="input">
                    <input required type="email" id="email" name="email">
                    <label for="email"><?php echo $colecao_idiomas[$idioma]['email_form'] ?></label>
                    <span class="error"></span>
                </div>

                <div class="input">
                    <input type="text" id="telefone" name="telefone" class="telefone">
                    <label for="telefone"><?php echo $colecao_idiomas[$idioma]['telefone_form'] ?></label>
                    <span class="error"></span>
                </div>

                <div class="input">
                    <input type="submit" class="input-form" value="<?php echo $botao_form ?>">
                </div>
            </div>
        </form>
    </div>

    <div class="quiz <?php echo $modelo_presell == 'modelo_5' ? '' : 'display-none' ?>" id="quiz" data-pergunta="pergunta_1">
        <div class="pergunta">
            <h2></h2>
        </div>

        <div class="respostas">
            <ul></ul>
        </div>
    </div>
</section>