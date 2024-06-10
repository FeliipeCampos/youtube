<!DOCTYPE html>
<html lang="en">
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

<div class="container">
    <div class="row">
    <?php
        include 'assets/actions/conexao.php';

        $query = "SELECT videos.*, usuarios.nome, usuarios.sobrenome FROM videos JOIN usuarios ON videos.id_usuario = usuarios.id";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $videoPath = "videos/" . $row['video'];
                $thumbnailPath = "thumbnails/" . $row['thumbnail'];
                ?>
                <div class="col-md-4">
                    <div class="m-2 image-container">
                        <a href="watch.php?id=<?php echo $row['id']; ?>" class="text-decoration-none text-dark">
                            <img class="rounded mb-2" src="<?php echo $thumbnailPath; ?>" style="width: 350px;">
                        </a>
                        <div class="mb-2">
                            <a href="watch.php?id=<?php echo $row['id']; ?>" class="text-decoration-none text-dark">
                                <div><span><?php echo $row['titulo']; ?></span></div>
                            </a>
                            <?php
                            $nomeCanal = $row['nome'] . ' ' . $row['sobrenome'];
                            ?>
                            <a href="perfil.php?id_usuario=<?php echo $row['id_usuario']; ?>" class="text-decoration-none text-dark">
                                <div><span style="font-size: 13px; color: gray;"><?php echo $nomeCanal; ?></span></div>
                            </a>
                            <div style="font-size: 13px; color: gray;">
                                <span><?php echo $row['data']; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "Nenhum vídeo encontrado.";
        }

        $conn->close();
    ?>


    </div>
</div>


</body>
</html>