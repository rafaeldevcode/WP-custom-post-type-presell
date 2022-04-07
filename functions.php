<?php

/**
 * Load parent theme style
 */
add_action( 'wp_enqueue_scripts', 'jnews_child_enqueue_parent_style' );
function jnews_child_enqueue_parent_style()
{
    wp_enqueue_style( 'jnews-parent-style', get_parent_theme_file_uri('/style.css'));
}

add_action( 'wp_enqueue_scripts', 'insert_script' );
function insert_script()
{
	wp_enqueue_script( 'custom_js', get_template_directory_uri() . '-child/assets/js/custom.js', array(), false, true );
}

// PLUGIN SHORTCODE PARA INSERIR IFRAME DO VIMEO E YOUTUBE
function register_button( $buttons ) {
	array_push( $buttons, "|", "add_video_button" );
	return $buttons;
 }
 
 function add_plugin( $plugin_array ) {
	$plugin_array['add_video_button'] = 'https://formoney.com.br/wp-content/themes/jnews-child/shortcode/custom-shortcodes-videos.js';
	return $plugin_array;
 }
 
 function my_video_button() {
 
	if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') ) {
	   return;
	}
 
	if ( get_user_option('rich_editing') == 'true' ) {
	   add_filter( 'mce_external_plugins', 'add_plugin' );
	   add_filter( 'mce_buttons', 'register_button' );
	}
 
 }

 // VIMEO
function add_video_vimeo( $atts = array(), $content = null ) {
	extract(shortcode_atts(array(
	 'id' => '#',
	 'lang' => '',
	), $atts));
 
	return '<div></div><div class="stc-video"><div class="top"></div><iframe src="https://player.vimeo.com/video/'. $id . '?badge=0&autopause=0&player_id=0&app_id=58479" 
	frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><div class="botton"></div>
	<span>'. $lang .'<span></div>';
 }
 
 // YOUTUBE
function add_video_youtube($atts, $content = null) {
    extract(shortcode_atts(array(
       'id' => '#',
	   'lang' => '',
    ), $atts));
 
    return '<div></div><div class="stc-video"><div class="top"></div><iframe src="https://www.youtube.com/embed/'. $id . '?autoplay=1" 
    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe><div class="botton"></div>
	<span>'. $lang .'<span></div>';
 }

 add_action('init', 'my_video_button');
 add_shortcode('vimeo', 'add_video_vimeo');
 add_shortcode('youtube', 'add_video_youtube');

////////////// REGISTRAR TAXONAMIA INIT ///////////////
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
	$modelo_presell = get_post_meta( $post->ID, '_modelo_presell', true );
	$titulo = get_post_meta( $post->ID, '_titulo', true );
	$subtitulo = get_post_meta( $post->ID, '_subtitulo', true );
	$headline = get_post_meta( $post->ID, '_headline', true );
	$headline_2 = get_post_meta( $post->ID, '_headline_2', true );
	$titulo_lista = get_post_meta( $post->ID, '_titulo_lista', true );
	$link = get_post_meta( $post->ID, '_link', true );
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
	?>

	<link rel="stylesheet" href="<?php echo get_template_directory_uri() . '-child/assets/css/presell.css' ?>">

	<section class="content-presell">
		<div class="select-group">
			<div class="select-opt">
				<label for="idioma">Selecione um idioma:</label>
				<select name="idioma" id="idioma" style="width: 150px">
					<option value="<?= $idioma ?>"><?= $idioma ?></option>
					<option value="Português">Português</option>
					<option value="Espanhol">Espanhol</option>
					<option value="Inglês">Inglês</option>
				</select>
			</div>

			<div class="select-opt">
				<label for="tipo_post">Selecione o tipo de post:</label>
				<select name="tipo_post" id="tipo_post" style="width: 150px">
					<option value="<?= $tipo_post ?>"><?= $tipo_post ?></option>
					<option value="BlackFriday">BlackFriday</option>
					<option value="Um Botão">Um Botão</option>
					<option value="Dois Botões">Dois Botões</option>
					<option value="Sem Botões">Sem Botões</option>
				</select>
			</div>

			<div class="select-opt">
				<label for="modelo_presell">Selecione um modelo:</label>
				<select name="modelo_presell" id="modelo_presell" style="width: 150px" onChange="javascript:vericarSelect()">
					<option value="<?= $modelo_presell ?>"><?= ucfirst(str_replace('_', ' ', $modelo_presell)) ?></option>
					<option value="modelo_1">Modelo 1</option>
					<option value="modelo_2">Modelo 2</option>
				</select>
			</div>
		</div>

		<div class="content-presell-titulos">
			<div>
				<label for="titulo">Título</label>
				<input class="input-presell" name="titulo" type="text" value="<?= $titulo; ?>">
			</div>

			<div style="margin-top: 10px;">
				<label for="headline_1">Subtitulo</label>
				<input class="input-presell" name="subtitulo" type="text" value="<?= $subtitulo; ?>">
			</div>
		</div>

		<div class="content-presell-headlines">
			<div class="content-presell-headline">
				<label for="headline">Headline</label>
				<input class="input-presell" name="headline" type="text" value="<?= $headline; ?>">
			</div>

			<div class="content-presell-headline">
				<label for="headline_2">Headline 2 [Atenção]</label>
				<input class="input-presell" name="headline_2" type="text" value="<?= $headline_2; ?>">
			</div>
		</div>

		<div class="content-presell-links">
			<div class="presell-inputs-group-link">
				<label for="link">Link do artigo</label>
				<input class="input-presell" name="link" type="text" value="<?= $link; ?>">
			</div>

			<div class="presell-inputs-group-link">
				<label for="texto_botao">Texto do botão</label>
				<input class="input-presell" name="texto_botao" type="text" value="<?= $texto_botao; ?>">
			</div>

			<div class="presell-inputs-group-link">
				<label for="link">Link adicional no final da presell</label>
				<input class="input-presell" name="link_adicional" type="text" value="<?= $link_adicional; ?>">
			</div>

			<div class="presell-inputs-group-link">
				<label for="texto_botao">Texto do do link adicional</label>
				<input class="input-presell" name="texto_link_adicional" type="text" value="<?= $texto_link_adicional; ?>">
			</div>
		</div>

		<div class="presell-inputs-group-list-title">
			<label for="titulo_lista">Título da lista</label>
			<input class="input-presell" name="titulo_lista" type="text" value="<?= $titulo_lista; ?>">
		</div>
		
		<div class="content-presell-list">
			<div style="width: 100%; padding-left: 10px; color: #2271B1;">
				<p>Itens da lista</p>
			</div>
			<?php
				for ($i = 1; $i <11 ; $i++): ?>
					<div class="presell-inputs-group-list">
						<label for="item_<?php echo $i ?>">Item <?php echo $i ?></label>
						<input class="input-presell" name="item_<?php echo $i ?>" type="text" value="<?= $items[$i-1]; ?>">
					</div>
				<?php endfor;
			?>
		</div>
	</section>

	<script type="text/javascript" src="<?php echo get_template_directory_uri() . '-child/assets/js/presell.js' ?>"></script>
	<?php
}
////////////// SALVAR DADOS DA METABOX //////////////
function formoney_salvar_dados_meta_box($post_id)
{
	foreach($_POST as $key=>$value){
		if($key !== 'tipo_post'
		&& $key !== 'idioma'
		&& $key !== 'titulo'
		&& $key !== 'headline'
		&& $key !== 'subtitulo'
		&& $key !== 'headline_2'
		&& $key !== 'titulo_lista' 
		&& $key !== 'link' 
		&& $key !== 'texto_botao'
		&& $key !== 'link_adicional' 
		&& $key !== 'texto_link_adicional'
		&& $key !== 'item_1' 
		&& $key !== 'item_2' 
		&& $key !== 'item_3' 
		&& $key !== 'item_4' 
		&& $key !== 'item_5' 
		&& $key !== 'item_6' 
		&& $key !== 'item_7' 
		&& $key !== 'item_8' 
		&& $key !== 'item_9' 
		&& $key !== 'item_10'
		&& $key !== 'modelo_presell'){
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