// Executar quando o documento HTML for completamente carregado
document.addEventListener('DOMContentLoaded', function () {
    // Receber o SELETOR calendar do atributo id
    var calendarEl = document.getElementById('calendar');

    // Receber o SELETOR da janela modal cadastrar
    const cadastrarModal = new bootstrap.Modal(document.getElementById("cadastrarModal"));

    // Receber o SELETOR da janela modal visualizar
    const visualizarModal = new bootstrap.Modal(document.getElementById("visualizarModal"));

    // receber seletor da janela modal visualizar
    const msgViewEvento = document.getElementById('msgViewEvento');

    // Instanciar FullCalendar.Calendar e atribuir a variavel calendar
    var calendar = new FullCalendar.Calendar(calendarEl, {
        themeSystem: 'bootstrap5',

        // Criar o cabeçalho 
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },

        locale: 'pt-br',
        initialView: 'dayGridMonth',
        nowIndicator: true,
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        selectable: true,
        selectMirror: true,
        dayMaxEvents: true, // allow "more" link when too many events

        // Chamar o arquivo php para recuperar os eventos 
        events: 'listarEvento.php',

        eventClick: function (info) {
            // apresentar detalhes do evento 
            document.getElementById("visualizarEvento").style.display = "block";
            document.getElementById("visualizarModalLabel").style.display = "block";
            // ocultar o formulario de editar evento
            document.getElementById("editarEvento").style.display = "none";
            document.getElementById("editarModalLabel").style.display = "none";

            // enviar a janela modal os dados do evento
            document.getElementById("visualizar_id").innerText = info.event.id;
            document.getElementById("visualizar_title").innerText = info.event.title;
            document.getElementById("visualizar_start").innerText = info.event.start.toLocaleString();
            document.getElementById("visualizar_end").innerText = info.event.end !== null ? info.event.end.
            toLocaleString() : info.event.start.toLocaleString();

            // enviar os dados do evento para o formulario editar
            document.getElementById("edit_id").value = info.event.id;
            document.getElementById("edit_title").value = info.event.title;
            document.getElementById("edit_start").value = converterData(info.event.start);
            document.getElementById("edit_end").value = info.event.end !== null ? converterData(info.event.end)
            : converterData(info.event.start);

            //abrir a janela de visualizar 
            visualizarModal.show();
        },

        // abrir a janela modal cadastrar quando clicar sobre o dia no calendario
        select: function (info) {
            // chamar a função para converter a data selecionada para ISO8601 e enviar o formulario
            document.getElementById("cad_start").value = converterData(info.start);
            document.getElementById("cad_end").value = converterData(info.start);
            // abrir modal cadastrar
            cadastrarModal.show();
        }

    });

    // renderizar o calendario
    calendar.render();

    // converter data
    function converterData(data) {
        const dataObj = new Date(data);
        const ano = dataObj.getFullYear();
        const mes = String(dataObj.getMonth() + 1).padStart(2, '0');
        const dia = String(dataObj.getDate()).padStart(2, '0');
        const hora = String(dataObj.getHours()).padStart(2, '0');
        const minuto = String(dataObj.getMinutes()).padStart(2, '0');
        return `${ano}-${mes}-${dia} ${hora}:${minuto}`;
    }

    // receber o SELETOR do formulario cadastrar evento
    const formCadEvento = document.getElementById("formCadEvento");

    // receber o SELETOR da mensagem generica
    const msg = document.getElementById("msg");

     // receber o SELETOR da mensagem cadastrar evento
    const msgCadEvento = document.getElementById("msgCadEvento")

     // receber o SELETOR do botao da janela modal cadastrar evento
    const btnCadEvento = document.getElementById("btnCadEvento");

    if (formCadEvento) {

        // Aguardar o usuario clicar no botao cadastrar
        formCadEvento.addEventListener("submit", async (e) => {

            // Não permitir a atualização da pagina
            e.preventDefault();

            // Apresentar no botão o texto salvando
            btnCadEvento.value = "Salvando...";

            // Receber os dados do formulário
            const dadosForm = new FormData(formCadEvento);

            // Chamar o arquivo PHP responsável em salvar o evento
            const dados = await fetch("cadastrarEvento.php", {
                method: "POST",
                body: dadosForm
            });

            // Realizar a leitura dos dados retornados pelo PHP
            const resposta = await dados.json();

            // Acessa o IF quando não cadastrar com sucesso
            if (!resposta['status']) {

                // Enviar a mensagem para o HTML
                msgCadEvento.innerHTML = `<div class="alert alert-danger" role="alert">${resposta['msg']}</div>`;

            } else {

                // Enviar a mensagem para o HTML
                msg.innerHTML = `<div class="alert alert-success" role="alert">${resposta['msg']}</div>`;

                // Enviar a mensagem para o HTML
                msgCadEvento.innerHTML = "";

                // Limpar o formulário
                formCadEvento.reset();

                // Criar o objeto com os dados do evento
                const novoEvento = {
                    id: resposta['id'],
                    title: resposta['title'],
                    color: resposta['color'],
                    start: resposta['start'],
                    end: resposta['end'],
                }

                // Adicionar o evento ao calendário
                calendar.addEvent(novoEvento);

                // Chamar a função para remover a mensagem após 3 segundo
                removerMsg();

                // Fechar a janela modal
                cadastrarModal.hide();
            }

            // Apresentar no botão o texto Cadastrar
            btnCadEvento.value = "Cadastrar";

        });
    }

    function removerMsg(){
        setTimeout(() => {
            document.getElementById('msg').innerHTML = "";
        }, 3000)
    }

    const btnViewEditEvento = document.getElementById("btnViewEditEvento");

    if(btnViewEditEvento){
        btnViewEditEvento.addEventListener("click", () => {
            document.getElementById("visualizarEvento").style.display = "none";
            document.getElementById("visualizarModalLabel").style.display = "none";
            document.getElementById("editarEvento").style.display = "block";
            document.getElementById("editarModalLabel").style.display = "block";
        });
    }

    const btnViewEvento = document.getElementById("btnViewEvento");
    if(btnViewEvento){
        btnViewEvento.addEventListener("click", () => {
            document.getElementById("visualizarEvento").style.display = "block";
            document.getElementById("visualizarModalLabel").style.display = "block";
            document.getElementById("editarEvento").style.display = "none";
            document.getElementById("editarModalLabel").style.display = "none";
        });
    }

    const formEditEvento = document.getElementById("formEditEvento");
    
    const msgEditEvento = document.getElementById("msgEditEvento");

    const btnEditEvento = document.getElementById("btnEditEvento");

    if(formEditEvento){
        formEditEvento.addEventListener("submit", async (e) => {
            e.preventDefault();
            btnEditEvento.value = "Salvando...";
            const dadosForm = new FormData(formEditEvento);
            const dados = await fetch("editarEvento.php", {
                method: "POST",
                body: dadosForm
            });
            const resposta = await dados.json();
            if(!resposta['status']){
                msgEditEvento.innerHTML = `<div class="alert alert-danger" role="alert">${resposta['msg']}</div>`;
            }else{
                msg.innerHTML = `<div class="alert alert-success" role="alert">${resposta['msg']}</div>`;
                msgEditEvento.innerHTML = "";
                formEditEvento.reset();
                const eventoExiste = calendar.getEventById(resposta['id']);

                if(eventoExiste){
                    eventoExiste.setProp('title', resposta['title']);
                    eventoExiste.setStart(resposta['start']);
                    eventoExiste.setEnd(resposta['end']);
                }

                removerMsg();
                visualizarModal.hide();
            }
            btnEditEvento.value = "Salvar";
        });
    }

    const btnApagarEvento = document.getElementById("btnApagarEvento");
    
    if(btnApagarEvento){
        btnApagarEvento.addEventListener("click", async () =>{
            const confirmacao = window.confirm("Tem certeza que deseja apagar o evento?");
            if (confirmacao){
                var idEvento = document.getElementById("visualizar_id").textContent;
                const dados = await fetch("apagarEvento.php?id=" + idEvento);
                const resposta = await dados.json();
                if (!resposta['status']) {
                    msgViewEvento.innerHTML =  `<div class="alert alert-danger" role="alert">${resposta['msg']}</div>`;
                }else{
                    msg.innerHTML =  `<div class="alert alert-success" role="alert">${resposta['msg']}</div>`;
                    msgViewEvento.innerHTML = "";
                    const eventoExisteRemover = calendar.getEventById(idEvento);
                    if(eventoExisteRemover){
                        eventoExisteRemover.remove();
                    }
                    removerMsg();
                    visualizarModal.hide();
                }
            }
        });
    }
});

