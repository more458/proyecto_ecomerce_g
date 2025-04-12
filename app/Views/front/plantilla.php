<?php
$tituloVar = "titulo";
$$tituloVar = "bienvenidos a mi pagina web";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $$tituloVar; ?></title>
</head>
<body>
    <h1><?php echo $$tituloVar; ?></h1>
</body>
</html>
