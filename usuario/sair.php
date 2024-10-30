<?php


session_destroy();

?>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <p><i class="fa-solid fa-spinner fa-spin fa-3x"></i> Encerrando a sessão...</p>

    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            setTimeout(() => {
                window.location = "index.php"
            }, "5000");

        });
    </script>
</body>

</html>