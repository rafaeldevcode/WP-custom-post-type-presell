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
            spanError.classList.add('alert-message');
            spanError.innerHTML = message;
        }else{
            spanError.classList.remove('alert-message');
            spanError.innerHTML = '';
        }
    }

    function customMessage(typeError){
        let valueMissing = 'Por favor, preencha este campo!'

        const message = {
            text: {
                valueMissing: valueMissing
            },
            email: {
                valueMissing: valueMissing,
                typeMismatch: 'Por favor, digite um email válido!'
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

            let formData = {
                'nome'   : nome,
                'email'  : email,
                'celular': telefone,
                'formId' : 1,
            }

            fetch(url, {
                method: 'POST',
                body: formData
            }).then((response) => {
                if(response.status === 200){
                    let h4 = document.createElement('h4');
                        h4.innerHTML = 'Seu contato foi enviado com sucesso! Aguarde alguns minutos e lhe enviaremos mais informações.'
                        formularioPresell.innerHTML = '';
                        formularioPresell.appendChild(h4);
                }
            })
        } catch (error) {
            console.error(error);
        }
    })
}

getFields();
sendForm();