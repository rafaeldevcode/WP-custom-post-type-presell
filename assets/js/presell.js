//// PARTE RESPONSAVEL POR OCULTAR E EXIBIR INPUTS NA TELA DE EDICAO DAS PRESEIS
var inputs = document.querySelectorAll('input');
var select = document.getElementById('modelo_presell');

function verificarModeloSelecionado(){
    if(select.value == ''){
        let templateColecao = retornarTemplate('Modelo_1');
            select.value = 'modelo_1';
            select.options[select.selectedIndex].text = 'Modelo 1';
            ocultarInputs(templateColecao);
    }else{
        let pattern = /\s(.*)/;
        template = select.options[select.selectedIndex].text.replace(' ', '_').replace(pattern, '');

            let templateColecao = retornarTemplate(template);
            ocultarInputs(templateColecao);
            alterarLabel(template, templateColecao)
    }
}
verificarModeloSelecionado();

// Verificar qual valor do selecionado
function vericarSelect(){
    let template = 'Nenhum';
    let pattern = /\s(.*)/;

        if(select.value != ''){
            template = select.options[select.selectedIndex].text.replace(' ', '_').replace(pattern, '');
        }

        let templateColecao = retornarTemplate(template);
            ocultarInputs(templateColecao);
            alterarLabel(template, templateColecao);
}

// Ocultar os inputs que nao pertencem ao modelo
function ocultarInputs(templateColecao){
    for (let i = 0; i < inputs.length; i++) {
        let inputName = inputs[i].name;
        let divInputRadio = inputs[i].parentNode.parentNode.parentNode.parentNode;
        let formulario = inputs[i].parentNode.parentNode;

        if(templateColecao[inputName] === false){
            // Ocultar div dos inputs radio caso seja formulario
            divInputRadio.id == 'opcao_apos_envio' ? divInputRadio.style.display = 'none' : ''; 
            divInputRadio.id == 'banners' ? divInputRadio.style.display = 'none' : ''; 
            divInputRadio.id == 'tipo_quiz' ? divInputRadio.style.display = 'none' : ''; 
            formulario.id == 'formulario' ? formulario.style.display = 'none' : '';

            inputs[i].parentNode.style.display = 'none';
        }else if(templateColecao[inputName] === true){
            // Exibir div dos inputs radio caso seja formulario
            divInputRadio.id == 'opcao_apos_envio' ? divInputRadio.style.display = 'block' : ''; 
            divInputRadio.id == 'banners' ? divInputRadio.style.display = 'block' : ''; 
            divInputRadio.id == 'tipo_quiz' ? divInputRadio.style.display = 'block' : ''; 
            formulario.id == 'formulario' ? formulario.style.display = 'flex' : '';
            
            inputs[i].parentNode.style.display = 'block';
        }
    }
}

// Alterar texto da label do modelo 2
function alterarLabel(template, templateColecao){
    let labels = retornarLabel(template);

    for (let i = 0; i < inputs.length; i++) {
        let inputName = inputs[i].name;
        let label = inputs[i].parentNode.querySelector('label');

            if((templateColecao[inputName] === true) && (labels[inputName] != null)){
               label.innerHTML = labels[inputName];
            }
    }
}

// Retornar os inputs que o modelo selecionado tem
function retornarTemplate(templateParam){


    const template = {
        Modelo_1: {
            opcao_banners: true,
            tipo_quiz: false,
            opcao_apos_envio: false,
            text_top: false,
            text_bottom: false,
            headline: true,
            iframe: false,
            form_id: false,
            titulo: true,
            subtitulo: true,
            headline_2: true,
            titulo_lista: true,
            headline_form: false,
            botao_form: false,
            link: true,
            texto_botao: true,
            link_adicional: false,
            texto_link_adicional: false,
            item_1: true,
            item_2: true,
            item_3: true,
            item_4: true,
            item_5: true,
            item_6: true,
            item_7: true,
            item_8: true,
            item_9: true,
            item_10: true,
        },
        Modelo_2: {
            opcao_banners: true,
            tipo_quiz: false,
            opcao_apos_envio: false,
            text_top: true,
            text_bottom: false,
            headline: true,
            iframe: false,
            form_id: false,
            titulo: true,
            subtitulo: true,
            headline_2: true,
            titulo_lista: false,
            headline_form: false,
            botao_form: false,
            link: true,
            texto_botao: true,
            link_adicional: true,
            texto_link_adicional: true,
            item_1: true,
            item_2: true,
            item_3: true,
            item_4: true,
            item_5: true,
            item_6: true,
            item_7: true,
            item_8: true,
            item_9: true,
            item_10: true,
        },
        Modelo_3: {
            opcao_banners: false,
            tipo_quiz: false,
            opcao_apos_envio: false,
            text_top: true,
            text_bottom: true,
            headline: true,
            iframe: false,
            form_id: false,
            titulo: true,
            subtitulo: true,
            headline_2: true,
            titulo_lista: false,
            headline_form: false,
            botao_form: false,
            link: true,
            texto_botao: true,
            link_adicional: true,
            texto_link_adicional: true,
            item_1: true,
            item_2: true,
            item_3: true,
            item_4: true,
            item_5: true,
            item_6: true,
            item_7: true,
            item_8: true,
            item_9: true,
            item_10: true,
        },
        Modelo_4: {
            opcao_banners: true,
            tipo_quiz: false,
            opcao_apos_envio: true,
            text_top: true,
            text_bottom: false,
            headline: true,
            iframe: false,
            form_id: true,
            titulo: true,
            subtitulo: true,
            headline_2: true,
            titulo_lista: false,
            headline_form: true,
            botao_form: true,
            link: true,
            texto_botao: true,
            link_adicional: true,
            texto_link_adicional: true,
            item_1: true,
            item_2: true,
            item_3: true,
            item_4: true,
            item_5: true,
            item_6: true,
            item_7: true,
            item_8: true,
            item_9: true,
            item_10: true,
        },
        Modelo_5: {
            opcao_banners: true,
            tipo_quiz: true,
            opcao_apos_envio: true,
            text_top: true,
            text_bottom: false,
            headline: true,
            form_id: true,
            iframe: false,
            titulo: true,
            subtitulo: true,
            headline_2: true,
            titulo_lista: false,
            headline_form: true,
            botao_form: true,
            link: true,
            texto_botao: true,
            link_adicional: true,
            texto_link_adicional: true,
            item_1: true,
            item_2: true,
            item_3: true,
            item_4: true,
            item_5: true,
            item_6: true,
            item_7: true,
            item_8: true,
            item_9: true,
            item_10: true,
        },
        Modelo_6: {
            opcao_banners: true,
            tipo_quiz: false,
            opcao_apos_envio: false,
            text_top: false,
            text_bottom: false,
            headline: true,
            iframe: true,
            form_id: false,
            titulo: true,
            subtitulo: true,
            headline_2: true,
            titulo_lista: false,
            headline_form: false,
            botao_form: false,
            link: true,
            texto_botao: true,
            link_adicional: true,
            texto_link_adicional: true,
            item_1: true,
            item_2: true,
            item_3: true,
            item_4: true,
            item_5: true,
            item_6: true,
            item_7: true,
            item_8: true,
            item_9: true,
            item_10: true,
        },
        Modelo_7: {
            opcao_banners: false,
            tipo_quiz: false,
            opcao_apos_envio: false,
            text_top: true,
            text_bottom: false,
            headline: true,
            iframe: false,
            form_id: false,
            titulo: true,
            subtitulo: true,
            headline_2: true,
            titulo_lista: false,
            headline_form: false,
            botao_form: false,
            link: true,
            texto_botao: true,
            link_adicional: true,
            texto_link_adicional: true,
            item_1: true,
            item_2: true,
            item_3: true,
            item_4: true,
            item_5: true,
            item_6: true,
            item_7: true,
            item_8: true,
            item_9: true,
            item_10: true,
        },
        Modelo_8: {
            opcao_banners: true,
            tipo_quiz: true,
            opcao_apos_envio: true,
            text_top: false,
            text_bottom: false,
            headline: true,
            form_id: true,
            iframe: false,
            titulo: false,
            subtitulo: true,
            headline_2: true,
            titulo_lista: false,
            headline_form: true,
            botao_form: true,
            link: true,
            texto_botao: true,
            link_adicional: true,
            texto_link_adicional: true,
            item_1: true,
            item_2: true,
            item_3: true,
            item_4: true,
            item_5: true,
            item_6: true,
            item_7: true,
            item_8: true,
            item_9: true,
            item_10: true,
        },
        Modelo_9: {
            opcao_banners: true,
            tipo_quiz: false,
            opcao_apos_envio: true,
            text_top: true,
            text_bottom: false,
            headline: true,
            iframe: false,
            form_id: true,
            titulo: true,
            subtitulo: true,
            headline_2: true,
            titulo_lista: false,
            headline_form: true,
            botao_form: true,
            link: true,
            texto_botao: true,
            link_adicional: true,
            texto_link_adicional: true,
            item_1: true,
            item_2: true,
            item_3: true,
            item_4: true,
            item_5: true,
            item_6: true,
            item_7: true,
            item_8: true,
            item_9: true,
            item_10: true,
        },
        Nenhum: {
            opcao_banners: false,
            tipo_quiz: false,
            opcao_apos_envio: false,
            text_top: false,
            text_bottom: false,
            iframe: false,
            headline: false,
            form_id: false,
            titulo: false,
            subtitulo: false,
            headline_2: false,
            titulo_lista: false,
            headline_form: false,
            botao_form: false,
            link: false,
            texto_botao: false,
            link_adicional: false,
            texto_link_adicional: false,
            item_1: false,
            item_2: false,
            item_3: false,
            item_4: false,
            item_5: false,
            item_6: false,
            item_7: false,
            item_8: false,
            item_9: false,
            item_10: false,
        }
    } 

    return template[templateParam];
}

function retornarLabel(modelo)
{
    const label  = {
        Modelo_1: {
            headline: 'Headline',
            headline_2: 'Headline 2 [Atenção]',
        },
        Modelo_2: {
            headline: 'Texto 1',
            headline_2: 'Texto 2',
        },
        Modelo_3: {
            headline: 'Texto 1',
            headline_2: 'Texto 2',
        },
        Modelo_4: {
            headline: 'Texto 1',
            headline_2: 'Texto 2',
        },
        Modelo_5: {
            headline: 'Texto 1',
            headline_2: 'Texto 2',
        },
        Modelo_6: {
            headline: 'Texto 1',
            headline_2: 'Texto 2',
        },
        Modelo_7: {
            headline: 'Texto 1',
            headline_2: 'Texto 2',
        },
        Modelo_8: {
            headline: 'Texto 1',
            headline_2: 'Texto 2',
        },
        Modelo_9: {
            headline: 'Texto 1',
            headline_2: 'Texto 2',
        }
    };

    return label[modelo];
}

// Verificar se uma variavel esta em uma array
function inArray(array, string){
    for (let i = 0; i < array.length; i++) {
        if(array[i] == string) return true;
    }

    return false;
}