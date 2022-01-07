'use strict';

function enviaEmail(endpoint) {
    Swal.fire({
        html: `<div class="d-flex justify-content-center align-items-center">
               <div class="spinner-grow text-dark" role="status">
                    <span class="sr-only">Loading...</span>
               </div>
               <span class="ml-1">Enviando e-mail...</span>
            </div>`,
        showConfirmButton: false,
    });

    fetch(endpoint).then(function(response) {
        return response.json();
    }).then(function(data) {
        if (data.code === 0) {
            Swal.fire({
                icon: 'success',
                title: 'Sucesso',
                text: data.message,
                showConfirmButton: true,
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops algo deu errado',
                text: data.message,
                showConfirmButton: true,
            });
        }
    });
}