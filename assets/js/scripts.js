let jogoId; // variavel do id do jogo

// quando abre a modal vai buscar o id que está relacionado e guarda no jogoId
//(pego do projeto Ligas Futebol de TW)
const modalEliminar = document.getElementById('modalEliminar');
if (modalEliminar) {
    modalEliminar.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget; 
        jogoId = button.getAttribute('data-id');
    });
}

function deleteGame() {
    // Existe algum id? Se sim elimina
    if (jogoId) {
    
        // esconder a modal, para melhor estetica
        const modalInstance = bootstrap.Modal.getInstance(modalEliminar);
        modalInstance.hide();

        //toast a dizer que eliminou
        Toastify({
            text: "Jogo eliminado com sucesso",
            duration: 1000,
            close: true,
            gravity: "top",
            backgroundColor: "linear-gradient(to right, #ff0000, #ff0000)"
        }).showToast();

        // Redireciona para a URL de exclusão após 3 segundos
        setTimeout(function() {
            window.location.href = './jogo/delete/' + jogoId;
        }, 1000);
    }
}

