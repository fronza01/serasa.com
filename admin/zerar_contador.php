<?php
$contador_file = '../viu.txt';
if (file_exists($contador_file)) {
    // Escreve "0" no arquivo e fecha o arquivo
    file_put_contents($contador_file, '0');
    echo 'Contador zerado com sucesso.';
} else {
    echo 'Erro: arquivo de contador não encontrado.';
}
?>

