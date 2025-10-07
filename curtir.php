<?php
include 'conexao.php';

// Verifica se o ID da imagem foi enviado
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Atualiza o número de curtidas
    $sql = "UPDATE fotos SET curtidas = curtidas + 1 WHERE id = $id";
    if ($conn->query($sql)) {
        echo "<p>Imagem curtida com sucesso!</p>";
    } else {
        echo "<p>Erro ao curtir a imagem!</p>";
    }

    // Redireciona para a página de imagens
    header('Location: imagens.php');
} else {
    echo "<p>ID da imagem não encontrado!</p>";
}

$conn->close();
?>
