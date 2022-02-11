<?php

/////////////// REGISTRAR TAXONAMIA INIT ///////////////
function formoney_categoria_customizada()
{
    register_taxonomy( 
        'categorias',
        'presell',
        array(
            'labels'       => array('name' => 'Categorias'),
            'hierarchical' => true,

        )
    );
}
add_action( 'init', 'formoney_categoria_customizada' );

/////////////// ADICIONAR POST CUSTOMIZADO ///////////////
function formoney_adicionar_post_presell()
{
	register_post_type(
		'presell',
		array(
			'labels'              => array(
				'name'            => 'Presell',
				'singular_name'   => 'Presell',
				'edit_item'       => 'Editar Presell',
				'add_new'         => 'Adicionar Nova',
				'add_new_item'    => 'Adicionar Nova Presell',
				'view_item'       => 'Visualizar Presell',
				'view_items'      => 'Visualizar Todas',
			),
			'public'              => true,
			'exclude_from_search' => true,
			'has_archive'         => false,
			'menu_position'       => 5,
			'menu_icon'           => 'dashicons-welcome-widgets-menus',
			'supports'            => array('title', 'thumbnail', 'editor')
		)
	);
}
add_action( 'init', 'formoney_adicionar_post_presell');

////////////// ADICIONAR UMA META BOX PARA PRESELL /////////////
function formoney_adicionar_meta_box()
{
	add_meta_box(
		'formoney_metabox_presell',
		'Configurações para Presell',
		'formoney_metabox_callback',
		'presell'
	);
}
add_action( 'add_meta_boxes', 'formoney_adicionar_meta_box' );

///////////// FUNÇÃO PARA CALLBACK META BOX //////////////
function formoney_metabox_callback($post)
{
	$idioma = get_post_meta( $post->ID, '_idioma', true );
	$tipo_post = get_post_meta( $post->ID, '_tipo_post', true );
	// $quant_banner = get_post_meta( $post->ID, '_quant_banner', true );
	$titulo = get_post_meta( $post->ID, '_titulo', true );
	$subtitulo = get_post_meta( $post->ID, '_headline_1', true );
	$headline = get_post_meta( $post->ID, '_headline', true );
	$headline_2 = get_post_meta( $post->ID, '_headline_2', true );
	$titulo_lista = get_post_meta( $post->ID, '_titulo_lista', true );
	$link = get_post_meta( $post->ID, '_link', true );
	$texto_botao = get_post_meta( $post->ID, '_texto_botao', true );
	$item_1 = get_post_meta( $post->ID, '_item_1', true );
	$item_2 = get_post_meta( $post->ID, '_item_2', true );
	$item_3 = get_post_meta( $post->ID, '_item_3', true );
	$item_4 = get_post_meta( $post->ID, '_item_4', true );
	$item_5 = get_post_meta( $post->ID, '_item_5', true );
	$item_6 = get_post_meta( $post->ID, '_item_6', true );
	$item_7 = get_post_meta( $post->ID, '_item_7', true );
	$item_8 = get_post_meta( $post->ID, '_item_8', true );
	$item_9 = get_post_meta( $post->ID, '_item_9', true );
	$item_10 = get_post_meta( $post->ID, '_item_10', true );
	?>

	<style>
		input{
			width: 100%;
		}

		.modelo-presell{
			width: 100%;
		}
	</style>
	<div style="display: flex; justify-content: center; margin-bottom: 20px;">
		<div style="display: flex; flex-direction: column; margin-right: 3px">
			<label for="idioma">Selecione um idioma:</label>
			<select name="idioma" id="idioma" style="width: 150px">
				<option value="<?= $idioma ?>"><?= $idioma ?></option>
				<option value="Português">Português</option>
				<option value="Espanhol">Espanhol</option>
				<option value="Inglês">Inglês</option>
			</select>
		</div>

		<div style="display: flex; flex-direction: column; margin-left: 3px">
			<label for="tipo_post">Selecione o tipo de post:</label>
			<select name="tipo_post" id="tipo_post" style="width: 150px">
				<option value="<?= $tipo_post ?>"><?= $tipo_post ?></option>
				<option value="BlackFriday">BlackFriday</option>
				<option value="Um Botão">Um Botão</option>
				<option value="Dois Botões">Dois Botões</option>
			</select>
		</div>

		<!-- <div style="display: flex; flex-direction: column; margin-left: 3px">
			<label for="quant_banner">Selecione quantos banner:</label>
			<select name="quant_banner" id="quant_banner" style="width: 150px">
				<option value="<?= $quant_banner ?>"><?= $quant_banner ?></option>
				<option value="1">1</option>
				<option value="3">3</option>
			</select>
		</div> -->
	</div>

	<label for="titulo">Título</label>
	<input name="titulo" type="text" value="<?= $titulo; ?>">
	<br>
    <br>
	<label for="headline_1">Subtitulo</label>
	<input name="subtitulo" type="text" value="<?= $subtitulo; ?>">
	<br>
	<br>
	<label for="headline">Headline</label>
	<input name="headline" type="text" value="<?= $headline; ?>">
	<br>
	<br>
	<label for="headline_2">Headline 2 [Atenção]</label>
	<input name="headline_2" type="text" value="<?= $headline_2; ?>">
	<br>
	<br>
	<label for="link">Link do artigo</label>
	<input name="link" type="text" value="<?= $link; ?>">
	<br>
    <br>
	<label for="texto_botao">Texto do botão</label>
	<input name="texto_botao" type="text" value="<?= $texto_botao; ?>">
	<br>
    <br>
	<label for="titulo_lista">Título da lista</label>
	<input name="titulo_lista" type="text" value="<?= $titulo_lista; ?>">
	<br>
	<br>
	<p>Itens da lista</p>
	<label for="item_1">Item 1</label>
	<input name="item_1" type="text" value="<?= $item_1; ?>">
	<br>
	<br>
	<label for="item_2">Item 2</label>
	<input name="item_2" type="text" value="<?= $item_2; ?>">
	<br>
	<br>
	<label for="item_3">Item 3</label>
	<input name="item_3" type="text" value="<?= $item_3; ?>">
	<br>
	<br>
	<label for="item_4">Item 4</label>
	<input name="item_4" type="text" value="<?= $item_4; ?>">
	<br>
	<br>
	<label for="item_5">Item 5</label>
	<input name="item_5" type="text" value="<?= $item_5; ?>">
	<br>
	<br>
	<label for="item_6">Item 6</label>
	<input name="item_6" type="text" value="<?= $item_6; ?>">
	<br>
	<br>
	<label for="item_7">Item 7</label>
	<input name="item_7" type="text" value="<?= $item_7; ?>">
	<br>
	<br>
	<label for="item_8">Item 8</label>
	<input name="item_8" type="text" value="<?= $item_8; ?>">
	<br>
	<br>
	<label for="item_9">Item 9</label>
	<input name="item_9" type="text" value="<?= $item_9; ?>">
	<br>
	<br>
	<label for="item_10">Item 10</label>
	<input name="item_10" type="text" value="<?= $item_10; ?>">
	<br>
    <br>

	<?php
}
////////////// SALVAR DADOS DA METABOX //////////////
function formoney_salvar_dados_meta_box($post_id)
{
	foreach($_POST as $key=>$value){
		if($key !== 'tipo_post'
		&& $key !== 'idioma'
		// && $key !== 'quant_banner'
		&& $key !== 'titulo'
		&& $key !== 'headline'
		&& $key !== 'headline_1'
		&& $key !== 'headline_2'
		&& $key !== 'titulo_lista' 
		&& $key !== 'link' 
		&& $key !== 'texto_botao'
		&& $key !== 'item_1' 
		&& $key !== 'item_2' 
		&& $key !== 'item_3' 
		&& $key !== 'item_4' 
		&& $key !== 'item_5' 
		&& $key !== 'item_6' 
		&& $key !== 'item_7' 
		&& $key !== 'item_8' 
		&& $key !== 'item_9' 
		&& $key !== 'item_10'){
			continue;
		}

		update_post_meta( 
			$post_id, 
			'_'.$key, 
			$_POST[$key]
		);
	}
}
add_action( 'save_post', 'formoney_salvar_dados_meta_box' );