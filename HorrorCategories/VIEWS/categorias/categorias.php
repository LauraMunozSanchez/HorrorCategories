<?php
$jsonData = file_get_contents(__DIR__ . '/../../BACKEND/JSON/categorias.json');

$allCat = json_decode($jsonData, true);

// Coge el id de la URL, por ejemplo "monster", "killer", etc. Si no hay nada, por defecto es "paranormal".
// isset() es una función que comprueba si una variable está definida y no es null.
if (isset($_GET['id'])) {
    // Si el id existe en la URL, lo asignamos a $catId.
    $catId = $_GET['id'];
} else {
    // si no, se pone el id por defecto.
    $catId = 'paranormal';
}

// Faltan validaciones de seguridad, como comprobar que $catId es un valor permitido, para evitar ataques de inyección o errores al acceder a índices inexistentes.

// $catId tiene el valor del id de la categoría que queremos mostrar
// $allCat es un array con todas las categorías. 
// Para mostrar la categoría actual, accedemos a $allCat[$catId].
$actualCat = $allCat[$catId];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Laura Muñoz Sánchez">

    <link rel="icon" type="image/png" href="../../IMG/favicon.png">
    <link rel="stylesheet" href="../../ASSETS/CSS/nav.css">
    <link rel="stylesheet" href="../../ASSETS/CSS/stay.css">
    <link rel="stylesheet" href="../../ASSETS/CSS/footer.css">
    <link rel="stylesheet" href="../../ASSETS/CSS/categorias/categorias.css">

    <title><?php echo htmlspecialchars($actualCat['tituloPagina']); ?></title>
</head>

<body>

    <!-- volver ATRAS -->
    <a href="./inicioCat.php" title="Volver a la página anterior" id="volverAtras">VOLVER ATRAS</a>

    <section>
        <div>
        <!-- Recorre el array de medios y lo mete en una variable temporal -->
            <?php foreach ($actualCat['medios'] as $medio) {
                // Por cada medio, muestra su nombre, imagen y enlace
                echo '<div>';
                echo '<h2>' . htmlspecialchars($medio['nombre']) . '</h2>';
                echo '<a href="' . htmlspecialchars($medio['enlace']) . '">';
                echo '<img src="' . htmlspecialchars($medio['imagen']) . '" alt="' . htmlspecialchars($medio['nombre']) . '">';
                echo '</a>';
                echo '</div>';
            } ?>
        </div>
    </section>

</body>

</html>