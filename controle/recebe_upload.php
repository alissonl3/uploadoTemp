<?php

$tipoErro = "";

// Pasta onde o arquivo vai ser salvo
$_UP['pasta'] = 'C:\\xampp\\htdocs\\uploadoTemp\\uploads\\';
// Tamanho máximo do arquivo (em Bytes)
$_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
// Array com as extensões permitidas
$_UP['extensoes'] = array('jpg', 'png', 'gif','rar', 'zip', 'txt', 'xlsx', 'apk');
// Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
$_UP['renomeia'] = true;
// Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
if ($_FILES['arquivo']['error'] != 0) {

    if ($_FILES['arquivo']['error'] == 1)
        $tipoErro = "tamanhoPHP";
    
    if ($_FILES['arquivo']['error'] == 2)
        $tipoErro = "tamanhoHTML";
    
    if ($_FILES['arquivo']['error'] == 3)
        $tipoErro = "uploadParcialmente";
    
    if ($_FILES['arquivo']['error'] == 4)
        $tipoErro = "naoUpload";
        
    
    
  //die("Não foi possível fazer o upload, erro:" . $_UP['erros'][$_FILES['arquivo']['error']]);
//  exit; // Para a execução do script
}
// Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
// Faz a verificação da extensão do arquivo
if($tipoErro == ""){
    $arr = explode('.', $_FILES['arquivo']['name']);
    $end = end($arr);
    $extensao = strtolower($end);
    if (array_search($extensao, $_UP['extensoes']) === false) {
       $tipoErro = "extensao";
    //  echo "Por favor, envie arquivos com as seguintes extensões: jpg, png, gif, rar ou zip";
    //  exit;
    }
}
// Faz a verificação do tamanho do arquivo
if($tipoErro == ""){
    $tam = $_FILES['arquivo']['size'];
    if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
      $tipoErro = "tamanho";
    //  echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
    //  exit;
    }
}
// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
// Primeiro verifica se deve trocar o nome do arquivo
if($tipoErro == ""){
    if ($_UP['renomeia'] == true) {
      // Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
      $nome_final = md5(time()).'.'.$extensao;
    } else {
      // Mantém o nome original do arquivo
      $nome_final = $_FILES['arquivo']['name'];
    }
}
  
// Depois verifica se é possível mover o arquivo para a pasta escolhida
if($tipoErro == ""){
    if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final )) {
      // Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
      //echo "Upload efetuado com sucesso!";
      $tipoErro = "semErro";
    //  echo '<a href="' . $_UP['pasta'] . $nome_final . '">Clique aqui para acessar o arquivo</a>';
    } else {
      // Não foi possível fazer o upload, provavelmente a pasta está incorreta
     // echo "Não foi possível enviar o arquivo, tente novamente";
        $tipoErro = "falhaEnviar";
    }
}

