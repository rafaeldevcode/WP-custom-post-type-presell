document.getElementById('telefone').addEventListener('input', ()=>{
    let telefone = document.getElementById('telefone');

    if(telefone.value == ''){
        telefone.required = false;
        telefone.classList.add('telefone');
    }else{
        telefone.required = true;
        telefone.classList.remove('telefone');
    }
})

function getFields(){
    let fields = document.querySelectorAll('[required]');

    for(let field of fields){
        field.addEventListener('invalid', event => {
            // Eliminar bubble
            event.preventDefault();
            customValidation(event);
        });
        field.addEventListener('blur', customValidation);
    }
}

function validateField(field){
    function verifyError(){
        let foundError = false;

        for(let error in field.validity){
            if(field.validity[error] && !field.validity.valid){
                foundError = error;
            }
        }

        return foundError;
    }

    function setCustomMessage(message){
        let spanError = field.parentNode.querySelector('span.error');

        if(message){
            spanError.classList.add('invalid');
            spanError.innerHTML = message;
        }else{
            spanError.classList.remove('invalid');
            spanError.innerHTML = '';
        }
    }

    function customMessage(typeError){
        let idioma = document.getElementById('idioma').value;
        let valueMissing = returnMessageTranslated(idioma, 'valueMissing');

        const message = {
            text: {
                valueMissing: valueMissing
            },
            email: {
                valueMissing: valueMissing,
                typeMismatch: returnMessageTranslated(idioma, 'typeMismatch')
            }
        }

        if(message[field.type]){
            return message[field.type][typeError];
        }else{
            return valueMissing;
        }
    }

    return function(){
        let error = verifyError();

        if(error){
            let message = customMessage(error);

            setCustomMessage(message);
        }else{
            setCustomMessage();
        }
    };
}

function customValidation(event){
    let field = event.target;
    let validation = validateField(field);

    validation();
}

function sendForm(){
    let formularioPresell = document.getElementById('formulario-presell');

    document.getElementById('formulario').addEventListener('submit', event => {
        event.preventDefault();
        document.getElementById('loading').classList.add('loading-flex');

        try {
            let url = document.getElementById('url').value;
            let nome = document.getElementById('nome').value;
            let email = document.getElementById('email').value;
            let telefone = document.getElementById('telefone').value;
            let formId = document.getElementById('form_id').value;
            let idioma = document.getElementById('idioma').value;
            let artigo = document.getElementById('artigo').value;
            let opcaoAposEnvio = document.getElementById('opcao_apos_envio').value;
            let formData = new FormData();

			formData.append('nome', nome);
			formData.append('email', email);
			formData.append('telefone', telefone);
			formData.append('formId', formId);

            fetch(url, {
                method: 'POST',
                body: formData
            }).then((response) => {
                document.querySelector('html').style.scrollBehavior = 'smooth';
                console.log(response);
                
                if(response.status === 200){
                    let h4 = document.createElement('h4');
                        h4.innerHTML = returnMessageTranslated(idioma, 'formularioEnviado');
                        formularioPresell.innerHTML = '';
                        formularioPresell.appendChild(h4);

                        let ocultarBotao = document.querySelectorAll('.btn-presell');
                            if(opcaoAposEnvio == 'exibir_botoes'){
                                for (let i = 0; i < ocultarBotao.length; i++) {
                                    ocultarBotao[i].classList.remove('ocultar-botao');
                                }
                            }else if(opcaoAposEnvio == 'scrool_top'){
                                for (let i = 0; i < ocultarBotao.length; i++) {
                                    ocultarBotao[i].classList.remove('ocultar-botao');
                                    window.scrollTo(0, 0);
                                }
                            }else if(opcaoAposEnvio == 'redirecionar'){
                                let querys = window.location.search;
                                let url = querys == '' ? `${artigo}?lead=1` : `${artigo}${querys}&lead=1`;
                                    window.location.href = url;
                            }
                }
            })
        } catch (error) {
            console.error(error);
        }
    });
}

function returnMessageTranslated(idioma, typeMessage){
    const message = {
        Português: {
            formularioEnviado: 'Pronto! Enviaremos no seu e-mail em alguns minutos o link do cartão.',
            valueMissing: 'Por favor, preencha este campo!',
            typeMismatch: 'Por favor, digite um email válido!'
        },
        Espanhol: {
            formularioEnviado: '¡Em breve! Le enviaremos el enlace de la tarjeta a su correo electrónico en unos minutos.',
            valueMissing: '¡Por favor complete este campo!',
            typeMismatch: 'Por favor, escriba un correo electrónico válido.'
        },
        Inglês: {
            formularioEnviado: 'Ready! We will send the card link to your email in a few minutes.',
            valueMissing: 'Please fill in this field!',
            typeMismatch: 'Please, type a valid email.'
        }
    }

    return message[idioma][typeMessage];
}

getFields();
sendForm();