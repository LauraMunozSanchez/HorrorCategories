<?php
// 1. PHP va a buscar tu archivo de medios y lo convierte en un array.
$jsonData = file_get_contents(__DIR__ . '/../../BACKEND/JSON/categorias.json');
$todas_categorias = json_decode($jsonData, true);

// 2. CAPTURA DEL ID: PHP mira la barra de direcciones de tu navegador.
// Si la URL tiene "?id=monster", $_GET['id'] valdrá "monster".
// Si entras a la página directamente sin poner nada, usará 'paranormal' por defecto.
$categoria_id = isset($_GET['id']) ? $_GET['id'] : 'paranormal';

// 3. VALIDACIÓN DE SEGURIDAD: 
// PHP comprueba si la palabra obtenida ("monster", "killer", etc.) existe como clave en tu JSON.
if (!array_key_exists($categoria_id, $todas_categorias)) {
    // Si alguien escribe en la URL ?id=inventado, la página se detiene aquí y no da fallos raros.
    die("Categoría no encontrada.");
}

// 4. ASIGNACIÓN DEL CONTENIDO:
// Como $categoria_id vale "monster", esto equivale a hacer: $todas_categorias['monster']
// Ahora $categoria_actual contiene exclusivamente los datos de los Monstruos.
$categoria_actual = $todas_categorias[$categoria_id];
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

    <title><?php echo htmlspecialchars($categoria_actual['titulo_pagina']); ?></title>
</head>

<body>

    <h1 id="titulo"><?php echo htmlspecialchars($categoria_actual['titulo_pagina']); ?></h1>

    <!-- volver ATRAS -->
    <a href="./inicioCat.php" title="Volver a la página anterior" id="volverAtras">VOLVER ATRAS</a>

    <section>
        <div>
            <?php foreach ($categoria_actual['medios'] as $medio): ?>
                <div>
                    <h2><?php echo htmlspecialchars($medio['nombre']); ?></h2>
                    <a href="<?php echo htmlspecialchars($medio['enlace']); ?>">
                        <img src="<?php echo htmlspecialchars($medio['imagen']); ?>" alt="<?php echo htmlspecialchars($medio['nombre']); ?>">
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>


</body>

</html>