<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="Styles-bstrp.css">
    <link rel="icon" href="logo.png"/>
    <title> ~ Your notes ~</title>
</head>

<body>
    <div class="container">
        <div class="image">
            <img src="logo.png">
        </div>
        <div class="text">
            <h1>Your notes</h1>
        </div>
    </div>

<div>    
    <div class="create" id="create">
        <div class="image">
            <img id="img-folder" src="folder.png">
        </div>
        <form action="index.php" method="post">
            <input type="text" name="nombre" required="required" styles="padding: 2px 4px 2px 4px">
            <button type="submit" class="btn" name="crear" value="crear" styles="margin-left: 20px;">Crear</button>
        </form>
        <br>
    </div>

</div>

<?php

    $error = '';


    if (isset($_POST['crear']) &&  isset($_POST['nombre'])) {

        $nombre = $_POST['nombre'];
        $nombredir = "file/$nombre";

    try {

        if (!(is_dir($nombredir))) {

            mkdir($nombredir);
            $error = 'Directorio creado';
        } else {
            $error = '';
        }
    }   catch (Exception $e) {
         echo 'Error: ',  $e->getMessage(), "\n\n";
        }
    }

    unset($_POST['crear']);
    unset($_POST['nombre']);

?>

<div class="row">
    <?php
    try {
        $directorio = 'file';
        $directorios  = scandir($directorio);

        foreach ($directorios as $directorioec) {
            if ('.' !== $directorioec && '..' !== $directorioec) {

    ?>

    <div class="col">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
            <img id="img-folder-1" src="folder.png">
                <h2 class="card-title"> <b><?php echo  $directorioec ?>  </b> </h2>
                <a href="directorio.php?dir=<?php echo $directorioec ?>" class="card-link">Abrir</a>
                <a href="eliminar/eliminar-directorio.php?dir=<?php echo $directorioec ?>" class="card-link text-danger">Eliminar</a>
            </div>
        </div>
    </div>

    <?php
            }
        }
    } catch (Exception $e) {
        echo 'error: ',  $e->getMessage(), "\n\n";
    }
    ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>