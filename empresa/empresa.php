<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título da Página</title>
    <link rel="stylesheet" href="empresa.css"> 
</head>
<body>

    <div class="container">
        <div class="menu">

            <a href="cadastrarfun.php">
                <button>CADASTRAR FUNCIONARIO</button> 
            </a>

            <a href="gerenciarfun.php">
                <button>GERENCIAR FUNCIONARIO</button> 
            </a>
           
        </div>
    </div>

    <div class="notifications-container">
        <h2>Notificações</h2>
        <ul id="notificationsList">
            <!-- Exemplo de notificações -->
            <li class="notification-item">
                <span class="notification-text">Notificação 1: Revisar documento</span>
                <button class="complete-btn" onclick="markAsComplete(this)">Concluída</button>
            </li>
            <li class="notification-item">
                <span class="notification-text">Notificação 2: Enviar relatório</span>
                <button class="complete-btn" onclick="markAsComplete(this)">Concluída</button>
            </li>
            <li class="notification-item">
                <span class="notification-text">Notificação 3: Participar da reunião</span>
                <button class="complete-btn" onclick="markAsComplete(this)">Concluída</button>
            </li>
        </ul>
    </div>

    <script>
        function markAsComplete(button) {
            const notificationItem = button.parentElement;
            notificationItem.classList.add('completed');
            button.disabled = true;
            button.innerText = "Concluída";

            // Remove a notificação da lista
            setTimeout(() => {
                notificationItem.remove();
            }, 500); // Espera 500ms para dar tempo de ver o efeito visual
        }
    </script>

</body>
</html>
