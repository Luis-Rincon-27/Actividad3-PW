<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">    <link rel="icon" href="logo.png" type="image/x-icon"/>
    <link rel="stylesheet" href="Styles-bstrp.css">
    <title>Notes</title>
</head>

<?php

    if (isset($_GET['dir']) && isset($_GET['note'])) {
        $dir = $_GET['dir'];
        $note = $_GET['note'];
    } else {
        header("Location: index.php");
    }

?>

<body>
    <div class="container-directorio">
        <div class="image-2">
            <img src="logo.png">
        </div>
        <div class="text">
            <h1>Archivo  <?php echo rtrim($note, '(.html)') ?></h1>
        </div>
    </div>

    <?php

    try {

        $file = "file/" . $dir . '/' . $note;
        $tam = filesize($file);
        if ($tam > 0) {
            $con = file_get_contents($file, FILE_USE_INCLUDE_PATH);
        } else {
            $con = '';
        }
    } catch (Exception $e) {
        echo '',  $e->getMessage(), "\n\n";
        $con = "";
    }
    ?>

    <div class="area">
        <form action="directorio.php?dir=<?php echo $dir ?>&note=<?php echo $note ?>" method="post">
            <textarea  name="valor-nota" style="height: 500px;" class="valor-nota w-75 d-block mx-auto" id="" cols="30" rows="10"><?php echo $con; ?></textarea>
            
            <button type="submit" class="btn-2">Guardar</button>
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>