// Executar quando o documento HTML for completamente carregado
document.addEventListener('DOMContentLoaded', function () {
    // Receber o SELETOR calendar do atributo id
    var calendarEl = document.getElementById('calendar');
    const cadastrarModal = new bootstrap.Modal(document.getElementById("cadastrarModal"));

    // Instanciar FullCalendar.Calendar e atribuir a variavel calendar
    var calendar = new FullCalendar.Calendar(calendarEl, {
        themeSystem: 'bootstrap5',
        locale: 'pt-br',
        initialView: 'timeGridWeek',
        nowIndicator: true,
        // Criar o cabeçalho 
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        selectable: true,
        selectMirror: true,
        dayMaxEvents: true, // allow "more" link when too many events
        events: 'listarEvento.php',
        eventClick: function (info) {
            const visualizarModal = new bootstrap.Modal(document.getElementById("visualizarModal"));
            document.getElementById("visualizar_id").innerText = info.event.id;
            document.getElementById("visualizar_title").innerText = info.event.title;
            document.getElementById("visualizar_start").innerText = info.event.start.toLocaleString();
            document.getElementById("visualizar_end").innerText = info.event.end !== null ? info.event.end.
                toLocaleString() : info.event.start.toLocaleString();
            visualizarModal.show();
        },

        select: function (info) {
            document.getElementById("cad_start").value = converterData(info.start);
            document.getElementById("cad_end").value = converterData(info.start);
            cadastrarModal.show();
        }

    });

    calendar.render();

    function converterData(data) {
        const dataObj = new Date(data);
        const ano = dataObj.getFullYear();
        const mes = String(dataObj.getMonth() + 1).padStart(2, '0');
        const dia = String(dataObj.getDate()).padStart(2, '0');
        const hora = String(dataObj.getHours()).padStart(2, '0');
        const minuto = String(dataObj.getMinutes()).padStart(2, '0');
        return `${ano}-${mes}-${dia} ${hora}:${minuto}`;
    }

    const formCadEvento = document.getElementById("formCadEvento");
    const msg = document.getElementById("msg");
    const msgCadEvento = document.getElementById("msgCadEvento")
    const btnCadEvento = document.getElementById("btnCadEvento");
    if (formCadEvento) {
        formCadEvento.addEventListener("submit", async (e) => {
            e.preventDefaul();
            btnCadEvento.value = "Salvando...";
            const dadosForm = new FormData(formCadEvento);
            const dados = await fetch("cadastrarEvento.php", {
                method: "POST",
                body: dadosForm
            });
            const resposta = await dados.json();
            if (resposta['status']) {
                msgCadEvento.innerHTML = `<div class="alert alert-danger" role="alert">${resposta['msg']}</div>`;

            } else {
                msg.innerHTML = `<div class="alert alert-success" role="alert">${resposta['msg']}</div>`;
                msgCadEvento.innerHTML = "";
                formCadEvento.reset();
                const novoEvento = {
                    id: resposta['id'],
                    title: resposta['title'],
                    color: resposta['color'],
                    start: resposta['start'],
                    end: resposta['end'],
                }
                calendar.addEvent(novoEvento);
                removerMsg();
                cadastrarModal.hide();
            }
            btnCadEvento.value = "Cadastrar"
        });
    }

    function removerMsg(){
        setTimeout(() =>{
            document.getElementById('msg').innerHTML = "";
        }, 3000)
    }
});

