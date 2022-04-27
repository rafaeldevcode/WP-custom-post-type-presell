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
<<<<<<< HEAD:assets/js/custom.js
            spanError.classList.add('invalid');
            spanError.innerHTML = message;
        }else{
            spanError.classList.remove('invalid');
=======
            spanError.classList.add('alert-message');
            spanError.innerHTML = message;
        }else{
            spanError.classList.remove('alert-message');
>>>>>>> 3ccf7420d85d97a8bfcc8a4697c44fb1064d607a:assets/js/main.js
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

            let formData = {
                'nome'   : nome,
                'email'  : email,
                'celular': telefone,
                'formId' : formId,
            }

            fetch(url, {
                method: 'POST',
                body: formData
            }).then((response) => {
                if(response.status === 200){
                    fbq('track', 'lead');
                    
                    let h4 = document.createElement('h4');
                        h4.innerHTML = returnMessageTranslated(idioma, 'formularioEnviado');
                        formularioPresell.innerHTML = '';
                        formularioPresell.appendChild(h4);

                        let ocultarBotao = document.querySelectorAll('.btn-presell');
                            for (let i = 0; i < ocultarBotao.length; i++) {
                                ocultarBotao[i].classList.remove('ocultar-botao');
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