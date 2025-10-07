<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recebe imagem</title>
</head>
<body>
    <?php
    include 'conexao.php';

    // Recebe o arquivo da imagem
    $nome_arquivo = $_FILES['figura']['name'];
    $atual = $_FILES['figura']["tmp_name"];
    $destino = 'imagens/' . $nome_arquivo;

    // Move o arquivo para o diretório "imagens"
    if (move_uploaded_file($atual, $destino)) {
        echo "<p>Arquivo recebido com sucesso!</p>";

        // Insere no banco de dados a imagem e o número inicial de curtidas (0)
        $sql = "INSERT INTO fotos (nome_arquivo, curtidas) VALUES ('$nome_arquivo', 0)";
        $conn->query($sql);

        echo "<img src='$destino' width='150px'><br><br>";
        echo "<a href='imagens.php'>Ver todas as imagens</a>";
    } else {
        echo "Erro ao enviar o arquivo!";
    }

    $conn->close();
    ?>
</body>
</html>
