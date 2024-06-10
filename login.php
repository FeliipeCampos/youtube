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

    <div class="container mt-4">
        <form action="assets/actions/login.php" method="post">
            <div>
                <label for="email">email:</label><br>
                <input type="text" id="email" name="email" required>
            </div>

            <div>
                <label for="senha">Senha:</label><br>
                <input type="password" id="senha" name="senha" required>
            </div>

            <div>
                <br><button type="submit" class="btn btn-primary">login</button>
            </div>
        </form>
    </div>
</body>
</html>