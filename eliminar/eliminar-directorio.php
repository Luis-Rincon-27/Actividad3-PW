<?php
if (isset($_GET['dir'])) {

    $dir = $_GET['dir'];

    try {
        $file = "../file/" . $dir;
        $directorio = "file/" . $dir;;
        $js_code = '';
        $files = scandir($file); 
        foreach ($files as $archivo) {
            if ('.' !== $archivo && '..' !== $archivo) {
                $fileB = "../file/" . $dir . '/' . $archivo;
                var_dump($archivo);

                if (is_file($fileB)){

                    unlink($fileB); 
                }


            }
        }

        rmdir($file);
        header('Location: ../index.php');

    } catch (Exception $e) {
        echo 'Se ha relizado ',  $e->getMessage(), "\n\n";
    }
} else {
    header('Location: ../index.php');
}