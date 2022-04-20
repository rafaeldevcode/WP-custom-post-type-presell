<section class="formulario-presell" id="formulario-presell">
    <div class="loading" id="loading"><div></div></div>

    <h4>Receba agora uma indicação de cartão de crédito, com limite pré aprovado!</h4>
    <form action="?" method="POST" id="formulario">
        <input type="hidden" id="form_id" name="form_id" value="<?php echo get_template_directory_uri() . '/template-parts/components/send_api.ph' ?>">
        <input type="hidden" id="form_id" name="form_id" value="1">

        <div class="inputs">
            <div class="input">
                <input required type="text" id="nome" name="nome">
                <label for="nome">Nome</label>
                <span class="error"></span>
            </div>

            <div class="input">
                <input required type="email" id="email" name="email">
                <label for="email">E-mail</label>
                <span class="error"></span>
            </div>

            <div class="input">
                <input required type="text" id="telefone" name="telefone">
                <label for="telefone">Telefone</label>
                <span class="error"></span>
            </div>

            <div class="input">
                <input type="submit" value="Enviar">
            </div>
        </div>
    </form>
</section>