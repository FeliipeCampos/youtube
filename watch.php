<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-... (hash)" crossorigin="anonymous" />
</head>
<body>
<!-- header -->
<?php include('header.php'); ?>
<!-- header -->

<?php
include 'assets/actions/conexao.php';

if (isset($_GET['id'])) {
    $videoId = $_GET['id'];

    $query = "SELECT videos.*, usuarios.nome, usuarios.sobrenome FROM videos 
              JOIN usuarios ON videos.id_usuario = usuarios.id 
              WHERE videos.id = '$videoId'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $videoInfo = $result->fetch_assoc();

        $videoPath = "videos/" . $videoInfo['video'];
        $thumbnailPath = "thumbnails/" . $videoInfo['thumbnail'];
        ?>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <video class="img-fluid" width="1280" height="720" src="<?php echo $videoPath; ?>" autoplay controls style="border-radius: 10px;"></video>
                    <h1 style="font-size: 23px;"><b><?php echo $videoInfo['titulo']; ?></b></h1>
                    <a href="perfil.php?id_usuario=<?php echo $videoInfo['id_usuario']; ?>">
                        <img class="img-fluid rounded-circle" src="fotos/foto1.jpeg" style="width: 50px;">
                    </a>
                    <div class="d-inline-block align-middle mr-2">
                        <a href="perfil.php?id_usuario=<?php echo $videoInfo['id_usuario']; ?>" class="text-decoration-none text-dark"><?php echo $videoInfo['nome'] . ' ' . $videoInfo['sobrenome']; ?></a>
                        <span class="d-block" style="font-size: 13px; color: gray;">00 inscritos</span>
                    </div>
                    <button class="btn btn-outline-dark rounded-pill mr-2" style="margin-left: 20px;">Seja Membro</button>
                    <button class="btn btn-dark rounded-pill">Inscreva-se</button>
                    <div class="mt-2 bg-light p-3 rounded-4">
                        <span><?php echo $videoInfo['data']; ?></span>
                        <p>
                            <?php echo $videoInfo['descricao']; ?>
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php
                    $relatedQuery = "SELECT videos.*, usuarios.nome, usuarios.sobrenome FROM videos 
                                    JOIN usuarios ON videos.id_usuario = usuarios.id 
                                    WHERE videos.id != '$videoId'";
                    $relatedResult = $conn->query($relatedQuery);

                    if ($relatedResult->num_rows > 0) {
                        while ($relatedVideo = $relatedResult->fetch_assoc()) {
                            $relatedVideoPath = "videos/" . $relatedVideo['video'];
                            $relatedThumbnailPath = "thumbnails/" . $relatedVideo['thumbnail'];
                            ?>
                            <div class="d-flex mb-2">
                                <a href="watch.php?id=<?php echo $relatedVideo['id']; ?>">
                                    <img class="rounded" src="<?php echo $relatedThumbnailPath; ?>" style="width: 200px; margin-right: 10px;">
                                </a>
                                <div>
                                    <a href="watch.php?id=<?php echo $relatedVideo['id']; ?>" class="text-decoration-none text-dark">
                                        <div><span><?php echo $relatedVideo['titulo']; ?></span></div>
                                    </a>
                                    <a href="perfil.php?id_usuario=<?php echo $relatedVideo['id_usuario']; ?>" class="text-decoration-none text-dark">
                                        <div><span style="font-size: 13px; color: gray;"><?php echo $relatedVideo['nome'] . ' ' . $relatedVideo['sobrenome']; ?></span></div>
                                    </a>
                                    <div style="font-size: 13px; color: gray;">
                                        <span><?php echo $relatedVideo['data']; ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        echo "Nenhum vídeo relacionado encontrado.";
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    } else {
        echo "Vídeo não encontrado.";
    }
} else {
    echo "ID do vídeo não especificado na URL.";
}

$conn->close();
?>

</body>
</html>