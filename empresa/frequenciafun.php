<?php
include '../include/headerfuncionario.php';
include_once '../include/conexao.php'; 

$id_funcionario = $_GET['id'] ?? null;

if (!$id_funcionario) {
    echo "<p>Funcionário não encontrado.</p>";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frequência JobFlow</title>
    <link rel="stylesheet" href="frequenciafun.css">
</head>
<body>

<div class="container">
    <div class="calendar">
        <div class="calendar-controls">
            <button id="prev-month">Anterior</button>
            <h3 id="current-month"></h3>
            <button id="next-month">Próximo</button>
        </div>
        <table id="calendar-table"></table>
    </div>

    <div class="data-preview">
    <?php
        $sql = "SELECT cadastro_fun.nome
                FROM cadastro_fun 
                INNER JOIN usuarios ON (empresa = id_usuario) 
                WHERE id_funcionario = ?";
        $comando = $banco->prepare($sql);
        $comando->execute(array($_REQUEST["id"]));
    ?>
        <h3>Visualização de Dados</h3>
        <h4>Funcionario(a): <?php echo $_REQUEST['nome']?></h4>

        <input type="hidden" name="id" value="<?php echo $_REQUEST['id'] ?>">
        <input type="hidden" name="nome" value="<?php echo $_REQUEST['nome'] ?>">
        <div id="data-content">Selecione uma data para ver os dados.</div>
    </div>
    


<script>
    document.addEventListener("DOMContentLoaded", function() {
        let currentDate = new Date();
        let selectedDate = ""; 
        let selectedEmpresa = ""; 

        // Função para renderizar o calendário
        function renderCalendar(year, month) {
            const daysInMonth = new Date(year, month + 1, 0).getDate();
            const firstDayOfWeek = new Date(year, month, 1).getDay();
            const table = document.getElementById('calendar-table');
            table.innerHTML = '';

            const monthNames = ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'];
            document.getElementById('current-month').textContent = `${monthNames[month]} ${year}`;

            const headerRow = document.createElement('tr');
            const daysOfWeek = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'];
            daysOfWeek.forEach(day => {
                const th = document.createElement('th');
                th.textContent = day;
                headerRow.appendChild(th);
            });
            table.appendChild(headerRow);

            let day = 1;
            for (let i = 0; i < 6; i++) {
                const row = document.createElement('tr');
                for (let j = 0; j < 7; j++) {
                    const cell = document.createElement('td');
                    if (i === 0 && j < firstDayOfWeek || day > daysInMonth) {
                        cell.textContent = '';
                    } else {
                        cell.textContent = day;
                        const dateString = `${year}-${(month + 1).toString().padStart(2, '0')}-${day.toString().padStart(2, '0')}`;
                        cell.dataset.date = dateString;

                        cell.addEventListener('click', function() {
                            selectedDate = dateString;
                            checkAndFetchData();
                        });
                        day++;
                    }
                    row.appendChild(cell);
                }
                table.appendChild(row);
            }
        }

        // Função para buscar dados do banco de dados via PHP
        function fetchDataFromDatabase(date) {
            var idUsuario = <?php echo $id_funcionario;?>;

    const xhr = new XMLHttpRequest();
    xhr.open('GET', `fetch_datafun.php?date=${date}&idUsuario=${idUsuario}`, true);
    xhr.onload = function() {
        if (this.status === 200) {
            const dataContent = document.getElementById('data-content');
            dataContent.innerHTML = this.responseText || `<p>Nenhum dado disponível para ${date}</p>`;
        }
    };
    xhr.send();
}


        // Função para verificar se a data e a empresa foram selecionadas antes de buscar dados
        function checkAndFetchData() {
            selectedEmpresa = <?php echo $_REQUEST["id"]; ?>;
            if (selectedDate && selectedEmpresa) { 
                fetchDataFromDatabase(selectedDate, selectedEmpresa); 
            } else {
                document.getElementById('data-content').innerHTML = "<p>Por favor, selecione uma data.</p>";
            }
        }


        document.getElementById('prev-month').addEventListener('click', function() {
            currentDate.setMonth(currentDate.getMonth() - 1);
            renderCalendar(currentDate.getFullYear(), currentDate.getMonth());
        });

        document.getElementById('next-month').addEventListener('click', function() {
            currentDate.setMonth(currentDate.getMonth() + 1);
            renderCalendar(currentDate.getFullYear(), currentDate.getMonth());
        });

        renderCalendar(currentDate.getFullYear(), currentDate.getMonth());
    });
</script>

</body>
</html>
