<?php
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
	$opcao_apos_envio = get_post_meta( $post->ID, '_opcao_apos_envio', true );
	$tipo_quiz = get_post_meta( $post->ID, '_tipo_quiz', true );
	$tipo_post = get_post_meta( $post->ID, '_tipo_post', true );
	$modelo_presell = get_post_meta( $post->ID, '_modelo_presell', true );
	$form_id = get_post_meta( $post->ID, '_form_id', true );
	$iframe = get_post_meta( $post->ID, '_iframe', true );
	$text_top = get_post_meta( $post->ID, '_text_top', true );
	$titulo = get_post_meta( $post->ID, '_titulo', true );
	$subtitulo = get_post_meta( $post->ID, '_subtitulo', true );
	$headline = get_post_meta( $post->ID, '_headline', true );
	$headline_2 = get_post_meta( $post->ID, '_headline_2', true );
	$titulo_lista = get_post_meta( $post->ID, '_titulo_lista', true );
	$headline_form = get_post_meta( $post->ID, '_headline_form', true );
	$botao_form = get_post_meta( $post->ID, '_botao_form', true );
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

	$modelos = [
		'modelo_1' => 'Modelo 1',
		'modelo_2' => 'Modelo 2',
		'modelo_3' => 'Modelo 3 / 2 Banners',
		'modelo_4' => 'Modelo 4 / Captura',
		'modelo_5' => 'Modelo 5 / Quiz + Captura',
		'modelo_6' => 'Modelo 6 / Iframe',
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
					<option value="<?= $modelo_presell ?>"><?= $modelos[$modelo_presell] ?></option>
					<option value="modelo_1">Modelo 1</option>
					<option value="modelo_2">Modelo 2</option>
					<option value="modelo_3">Modelo 3 / 2 Banners</option>
					<option value="modelo_4">Modelo 4 / Captura</option>
					<option value="modelo_5">Modelo 5 / Quiz + Captura</option>
					<option value="modelo_6">Modelo 6 / Iframe</option>
				</select>
			</div>
		</div>

		<div class="inputs-radios" id="opcao_apos_envio">
			<h4>Opções após envio do formulário</h4>
			<div>
				<div>
					<label>
						Escrolar ao topo & exibir botões
						<input type="radio" name="opcao_apos_envio" <?= $opcao_apos_envio == 'scrool_top' ? 'checked' : '' ?> value="scrool_top">
					</label>
				</div>

				<div>
					<label>
						Redirecionar usuário
						<input type="radio" name="opcao_apos_envio" <?= $opcao_apos_envio == 'redirecionar' ? 'checked' : '' ?> value="redirecionar">
					</label>
				</div>

				<div>
					<label>
						Exibir botões
						<input type="radio" name="opcao_apos_envio" <?= ($opcao_apos_envio == 'exibir_botoes')  || (empty($opcao_apos_envio)) ? 'checked' : '' ?> value="exibir_botoes">
					</label>
				</div>
			</div>
		</div>

		<div class="inputs-radios" id="tipo_quiz">
			<h4>Opções de perguntas do quiz</h4>
			<div>
				<div>
					<label>
						Cartão
						<input type="radio" name="tipo_quiz" <?= ($tipo_quiz == 'cartao')  || (empty($tipo_quiz)) ? 'checked' : '' ?> value="cartao">
					</label>
				</div>

				<div>
					<label>
						Empréstimo
						<input type="radio" name="tipo_quiz" <?= $tipo_quiz == 'emprestimo' ? 'checked' : '' ?> value="emprestimo">
					</label>
				</div>
			</div>
		</div>

		<div class="content-presell-titulos">
			<div>
				<label for="text_top">Texto do topo</label>
				<input class="input-presell" name="text_top" type="text" value="<?= $text_top; ?>">
			</div>
			
			<div>
				<label for="titulo">Título</label>
				<input class="input-presell" name="titulo" type="text" value="<?= $titulo; ?>">
			</div>

			<div style="margin-top: 10px;">
				<label for="headline_1">Subtitulo</label>
				<input class="input-presell" name="subtitulo" type="text" value="<?= $subtitulo; ?>">
			</div>

			<div style="margin-top: 10px;">
				<label for="iframe">Link do vídeo</label>
				<input class="input-presell" name="iframe" type="text" value="<?= $iframe; ?>">
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

		<div class="content-presell-headlines" id="formulario">
			<div class="content-presell-headline">
				<label for="headline_form">Headline do formulário</label>
				<input class="input-presell" name="headline_form" type="text" value="<?= $headline_form; ?>">
			</div>

			<div class="content-presell-headline">
				<label for="botao_form">Botão do formulário</label>
				<input class="input-presell" name="botao_form" type="text" value="<?= $botao_form; ?>">
			</div>

			<div class="content-presell-headline">
				<label for="form_id">ID de formulário do Mautic</label>
				<input class="input-presell" name="form_id" type="text" value="<?= $form_id; ?>">
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
		&&$key !== 'tipo_quiz'
		&& $key !== 'opcao_apos_envio'
		&& $key !== 'idioma'
		&& $key !== 'iframe'
		&& $key !== 'form_id'
		&& $key !== 'titulo'
		&& $key !== 'headline'
		&& $key !== 'text_top'
		&& $key !== 'subtitulo'
		&& $key !== 'headline_2'
		&& $key !== 'titulo_lista' 
		&& $key !== 'headline_form'
		&& $key !== 'botao_form' 
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