<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idUsuario = $_POST["id"];
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];

    $nomeVideo = uniqid() . '.mp4';
    $nomeThumbnail = uniqid() . '.png';

    date_default_timezone_set('America/Sao_Paulo');
    $dataAtual = date("Y-m-d H:i:s");

    $query = "INSERT INTO videos (id_usuario, titulo, descricao, video, thumbnail, data) VALUES ('$idUsuario', '$titulo', '$descricao', '$nomeVideo', '$nomeThumbnail', '$dataAtual')";

    if ($conn->query($query) === TRUE) {
        $destinoVideo = "../../videos/" . $nomeVideo;
        $destinoThumbnail = "../../thumbnails/" . $nomeThumbnail;

        move_uploaded_file($_FILES["video"]["tmp_name"], $destinoVideo);
        move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $destinoThumbnail);

        $imagem = imagecreatefromjpeg($destinoThumbnail);
        imagepng($imagem, $destinoThumbnail);
        imagedestroy($imagem);

        $thumbnail = imagecreatefrompng($destinoThumbnail);
        $thumbnailRedimensionada = imagescale($thumbnail, 500, 300);

        imagepng($thumbnailRedimensionada, $destinoThumbnail);

        imagedestroy($thumbnail);
        imagedestroy($thumbnailRedimensionada);

        header("Location: ../../index.php");
        exit();
    } else {
        echo "Erro ao inserir vídeo: " . $conn->error;
    }
} else {
    echo "Erro: Método de requisição inválido.";
}

$conn->close();
?>
