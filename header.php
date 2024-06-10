<?php
session_start();
?>

<header class="py-3">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <a href="index.php">
                <img src="assets/logo/logo.png" alt="Logo">
            </a>
            <div class="flex-grow-1 mx-3 d-flex align-items-center">
                <form class="d-flex justify-content-center text-center flex-grow-1">
                    <input class="form-control rounded-pill rounded-end w-50" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                    <button class="btn btn-light rounded-pill rounded-start border" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="dropdown">
                <button class="btn btn-light" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="img-fluid rounded-circle" src="fotos/foto1.jpeg" alt="Foto do usuário" style="width: 40px;">
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <?php
                    if (isset($_SESSION['id'])) {
                        // Sessão existe, mostrar opção "Sair"
                        echo '<li><a class="dropdown-item" href="assets/actions/logout.php"><i class="fas fa-sign-out-alt"></i> Sair</a></li>';
                        // Adicionar opção de upload
                        echo '<li><a class="dropdown-item" href="upload.php"><i class="fas fa-cloud-upload-alt"></i> Upload</a></li>';
                    } else {
                        // Sessão não existe, mostrar opção "Entrar"
                        echo '<li><a class="dropdown-item" href="login.php"><i class="fas fa-sign-in-alt"></i> Entrar</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</header>
