<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imagens mais curtidas</title>
</head>
<body>
    <?php
    include 'conexao.php';

    $sql = "SELECT * FROM fotos ORDER BY curtidas DESC";
    $result = $conn->query($sql);

    // Exibe as imagens com os botões de curtir
    while ($row = $result->fetch_assoc()) {
        $imagem = $row['nome_arquivo'];
        $curtidas = $row['curtidas'];
        $id = $row['id'];

        echo "<div>";
        echo "<img src='imagens/$imagem' width='150px'><br>";
        echo "<p>Curtidas: $curtidas</p>";
        echo "<form action='curtir.php' method='post'>";
        echo "<input type='hidden' name='id' value='$id'>";
        echo "<input type='submit' value='Curtir'>";
        echo "</form><br>";
        echo "</div>";
    }

    $conn->close();
    ?>
</body>
</html>
