<?php
$continfo_file = '../continfo.txt';
if (file_exists($continfo_file)) {
    // Abre o arquivo em modo de escrita, apaga todo o conteúdo e fecha o arquivo
    file_put_contents($continfo_file, '0');
    echo 'Contador de infos zerado com sucesso.';
} else {
    echo 'Erro: arquivo de contador de infos não encontrado.';
}
?>
