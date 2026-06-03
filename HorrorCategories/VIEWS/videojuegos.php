<?php

$jsonData = file_get_contents(__DIR__ . '/../BACKEND/JSON/videojuegos.json');

$datos = json_decode($jsonData, true);

if (isset($_GET['id'])) {
    $catID = strtolower($_GET['id']);
} else {
    $catID = 'killer';
}

$actualCat = $datos['categorias'][$catID];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Laura Muñoz Sánchez">

    <link rel="icon" type="image/png" href="../ASSETS/IMG/favicon.png">
    <link rel="stylesheet" href="../ASSETS/CSS/nav.css">
    <link rel="stylesheet" href="../ASSETS/CSS/stay.css">
    <link rel="stylesheet" href="../ASSETS/CSS/footer.css">
    <link rel="stylesheet" href="../ASSETS/CSS/categorias/contenido.css">

    <title>✡ Horror Categories ✡ | <?php echo htmlspecialchars($actualCat['tituloPagina']); ?></title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="./categorias/inicioCat.php" title="Acceder a categorías">CATEGORÍAS</a></li>
                <li><a href="./seccion.php?id=cineYLiteratura" title="Acceder a cine y literatura">CINE Y LITERATURA</a></li>

                <li id="logo"><a id="linkLogo" href="./inicio.php" title="Volver a la portada"><img src="../ASSETS/IMG/logoNav.png" alt="Logo de Horror Categories"></a></li>

                <li><a href="./seccion.php?id=arte" title="Acceder a arte">ARTE</a></li>
                <li><a href="./seccion.php?id=videojuegos" title="Acceder a videojuegos">VIDEOJUEGOS</a></li>

                <li id="search">
                    <form>
                        <input list="busquedas" id="barra" placeholder="Buscar...">
                        <datalist id="busquedas">
                            <option value="categorias">categorias</option>
                            <option value="arte">arte</option>
                            <option value="cine y literatura">cine y literatura</option>
                            <option value="videojuegos">videojuegos</option>
                            <option value="paranormal">paranormal</option>
                            <option value="monster">monster</option>
                            <option value="killer">killer</option>
                            <option value="psychological">psychological</option>
                        </datalist>
                        <button type="submit" id="botonBuscar" title="Buscar"><img src="../ASSETS/IMG/lupaNav.png" alt="Buscar"></button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <h1 class="titulo" id="arriba"><?php echo htmlspecialchars($actualCat['titulo']); ?></h1>

        <p class="LoPar">
            <?php echo htmlspecialchars($actualCat['descripcion']); ?>
        </p>

        <section class="grid">
            <?php foreach ($actualCat['contenido'] as $juego) {
                echo '<a>';
                echo '<div class="card">';
                echo '<iframe width="535" height="251" src="' . htmlspecialchars($juego['video']) . '" title="' . htmlspecialchars($juego['titulo']) . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
                echo '<h2>' . htmlspecialchars($juego['titulo']) . '</h2>';
                echo '<p>' . htmlspecialchars($juego['texto']) . '</p>';
                echo '</div>';
                echo '</a>';
            } ?>
        </section>

        <a id="volverArriba" href="#arriba">VOLVER ARRIBA</a>

        <a id="volverArriba" href="./seccion.php">VOLVER ATRÁS</a>
    </main>

    <?php include '../BACKEND/PHP/footer.php'; ?>
</body>

</html>