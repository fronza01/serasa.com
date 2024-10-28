<?php
// Iniciar a sessão
session_start();

// Finalizar a sessão
session_unset();
session_destroy();

// Redirecionar para a página de login
header("Location: index.php");
exit();
?>
