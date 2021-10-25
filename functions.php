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
			'menu_position'       => 2,
			'menu_icon'           => 'dashicons-welcome-widgets-menus',
			'supports'            => array('title', 'thumbnail')
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
	$titulo = get_post_meta( $post->ID, '_titulo', true );
	$titulo_lista = get_post_meta( $post->ID, '_titulo_lista', true );
	$link = get_post_meta( $post->ID, '_link', true );
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
		<input value="<?= $idioma ?>" name="idioma" placeholder="Selecione um idioma" list="idioma" type="text" style="width: 200px; cursor: pointer">
			<datalist id="idioma">
				<option value="Português"/>
				<option value="Espanhol"/>
			</datalist>

			<input value="<?= $tipo_post ?>" name="tipo_post" placeholder="selecione o tipo de post" list="tipo-post" type="text" style="width: 200px; cursor: pointer">
			<datalist id="tipo-post">
				<option value="Cartão"/>
				<option value="Empréstimo"/>
			</datalist>

	</div>

	<label for="titulo">Título</label>
	<input name="titulo" type="text" value="<?= $titulo; ?>">
	<br>
    <br>
	<label for="link">Link do artigo</label>
	<input name="link" type="text" value="<?= $link; ?>">
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

	<div id="lista">

	</div>

	<br>
    <br>
	<img class="modelo-presell" src="http://localhost:8888/formoney/wp-content/uploads/2021/10/modeloPresell.png" alt="Modelo Presell">

	<?php
}
////////////// SALVAR DADOS DA METABOX //////////////
function formoney_salvar_dados_meta_box($post_id)
{
	foreach($_POST as $key=>$value){
		if($key !== 'tipo_post'
		&& $key !== 'idioma'
		&& $key !== 'titulo'
		&& $key !== 'titulo_lista' 
		&& $key !== 'link' 
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