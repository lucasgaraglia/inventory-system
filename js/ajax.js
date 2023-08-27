
const ajax_form = document.querySelectorAll(".FormAjax");

function submit_ajax_form(e){
    // esto es para que, al enviar el formulario, no se redirija
    // a la url especificada en action
    e.preventDefault();

    // ventana de confirmacion, aceptar o cancelar
    let submit=confirm("Do you want to send this form?");
    // si le dio aceptar, enviamos. si le dio cancelar, no hacemos nada
    if(submit==true){
        // en la variable data tenemos todos los valores de los campos
        // del formulario
        let data = new FormData(this);
        // variable method guarda el metodo del form. post o get
        let method = this.getAttribute("method");
        // en action se guarda la url de a donde se envia el form
        let action = this.getAttribute("action");

        let headers = new Headers();

        let config = {
            method: method,
            headers: headers,
            mode: 'cors',
            cache: 'no-cache',
            body: data
        };

        // api fetch para enviar formularios
        fetch(action, config)
        // el then es una promesa, es decir, enviamos datos y estamos esperando que,
        // desde la url a donde se enviaron los datos, nos llegue una respuesta.
        // dicha respuesta la formateamos a texto con el .text().
        .then(answer => answer.text())
        .then(answer=>{
            // guardamos en una variable un div en html que esta invisible,
            // y tiene la clase form-rest.
            let container=document.querySelector(".form-rest");
            // dentro de el, escribimos la respuesta
            container.innerHTML = answer;
        })
    }
}

ajax_form.forEach(
    forms => {
        // cuando se submitea el formulario, se ejecuta la funcion submit_ajax_form
        forms.addEventListener("submit", submit_ajax_form);
    }

)